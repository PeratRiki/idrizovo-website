<?php


namespace App\Http\Controllers\Admin\Admin;
use App\Http\Controllers\Controller;
use App\Models\VisitRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VisitRequestController extends Controller
{
    public const MAX_DAILY_VISITS = 2;
    public const MAX_MONTHLY_VISITS = 2;
    public const CAPACITY_STATUSES = ['pending', 'approved'];

    public function index()
    {
        if (auth()->user()->role === 'vospituvac') {
            abort(403);
        }

        $visitRequests = VisitRequest::latest()->paginate(50);
        $total = VisitRequest::count();
        $pending_count = VisitRequest::where('status', 'pending')->count();
        $approved_count = VisitRequest::where('status', 'approved')->count();
        $rejected_count = VisitRequest::where('status', 'rejected')->count();

        return view('admin.visit-request', compact('visitRequests', 'total', 'pending_count', 'approved_count', 'rejected_count'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'visitor_name'        => 'required|string|max:120',
            'visitor_email'       => 'nullable|email|max:120',
            'phone'               => 'nullable|string|max:30',
            'prisoner_name'       => 'required|string|max:120',
            'requested_date'      => 'required|date',
            'requested_time'      => 'required|string',
            'visit_count'         => 'required|integer|min:1|max:10',
            'notification_method' => 'required|in:sms,email,none',
            'visitor_type'        => 'nullable|in:semejstvo,prijatel',
        ]);

        // Само кога notify е sms или email бараме контакт
        if ($data['notification_method'] !== 'none') {
            if (empty($data['visitor_email']) && empty($data['phone'])) {
                return response()->json([
                    'errors' => ['visitor_contact' => ['Потребно е да внесите телефон или email за потврда.']],
                ], 422);
            }

            if ($data['notification_method'] === 'sms' && empty($data['phone'])) {
                return response()->json([
                    'errors' => ['phone' => ['За SMS потврда мора да внесете мобилен број.']],
                ], 422);
            }

            if ($data['notification_method'] === 'email' && empty($data['visitor_email'])) {
                return response()->json([
                    'errors' => ['visitor_email' => ['За email потврда мора да внесете email адреса.']],
                ], 422);
            }
        }

        $requestedDate = Carbon::parse($data['requested_date'])->startOfDay();
        if ($requestedDate->lt(Carbon::today()->addDays(2))) {
            return response()->json([
                'errors' => ['requested_date' => ['Датумот мора да биде најмалку 2 дена однапред.']],
            ], 422);
        }

        $monthlyVisits = $this->visitorMonthlyCount($data);
        if ($monthlyVisits >= self::MAX_MONTHLY_VISITS) {
            return response()->json([
                'errors' => ['monthly_limit' => ['Можете да закажете најмногу ' . self::MAX_MONTHLY_VISITS . ' посети во месецот.']],
            ], 422);
        }

        // Count reservations for the specific slot (date + time)
        $reservedCount = $this->slotVisitCount($data['requested_date'], $data['requested_time']);
        $status = $reservedCount >= self::MAX_DAILY_VISITS ? 'waiting' : 'pending';

        $visit = VisitRequest::create([
            'visitor_name'        => $data['visitor_name'],
            'visitor_email'       => $data['visitor_email'] ?? null,
            'phone'               => $data['phone'] ?? null,
            'prisoner_name'       => $data['prisoner_name'],
            'request_date'        => now(),
            'requested_date'      => $data['requested_date'],
            'requested_time'      => $data['requested_time'] ?? null,
            'status'              => $status,
            'visit_count'         => $data['visit_count'],
            'notification_method' => $data['notification_method'],
            'visitor_type'        => $data['visitor_type'] ?? null,
        ]);

        return response()->json([
            'id'     => $visit->id,
            'status' => $status,
        ], 201);
    }

    public function show(VisitRequest $visit)
    {
        return response()->json([
            'id'                  => $visit->id,
            'status'              => $visit->status,
            'confirmation_code'   => $visit->confirmation_code,
            'notification_method' => $visit->notification_method,
            'visitor_email'       => $visit->visitor_email,
            'phone'               => $visit->phone,
            'requested_date'      => optional($visit->requested_date)->toDateString(),
            'requested_time'      => $visit->requested_time,
            'visit_count'         => $visit->visit_count,
            'prisoner_name'       => $visit->prisoner_name,
            'visitor_name'        => $visit->visitor_name,
        ], 200);
    }

    public function approve(VisitRequest $visit)
    {
        $updateData = ['status' => 'approved'];
        if (empty($visit->confirmation_code)) {
            $updateData['confirmation_code'] = $this->generateConfirmationCode();
        }
        $visit->update($updateData);
        return back()->with('success', 'Барањето е одобрено!');
    }

    public function reject(VisitRequest $visit)
    {
        $oldStatus = $visit->status;
        $visit->update(['status' => 'rejected']);

        if (in_array($oldStatus, self::CAPACITY_STATUSES, true)) {
            $this->promoteWaitingRequests($this->getVisitDateForPromotion($visit));
        }

        return back()->with('success', 'Барањето е одбиено!');
    }

    public function updateStatus(Request $request, VisitRequest $visit)
    {
        $oldStatus = $visit->status;

        $updateData = [
            'status' => $request->status,
            'reason' => $request->reason,
        ];

        if ($request->status === 'approved' && empty($visit->confirmation_code)) {
            $updateData['confirmation_code'] = $this->generateConfirmationCode();
        }

        $visit->update($updateData);

        if (in_array($oldStatus, self::CAPACITY_STATUSES, true)
            && !in_array($request->status, self::CAPACITY_STATUSES, true)) {
            $this->promoteWaitingRequests($this->getVisitDateForPromotion($visit));
        }

        return back()->with('success', 'Статусот е ажуриран!');
    }

    protected function visitorMonthlyCount(array $data): int
    {
        $query = VisitRequest::query()
            ->whereYear('requested_date', Carbon::parse($data['requested_date'])->year)
            ->whereMonth('requested_date', Carbon::parse($data['requested_date'])->month)
            ->where(function ($query) use ($data) {
                if (!empty($data['visitor_email'])) {
                    $query->orWhere('visitor_email', $data['visitor_email']);
                }
                if (!empty($data['phone'])) {
                    $query->orWhere('phone', $data['phone']);
                }
                if (empty($data['visitor_email']) && empty($data['phone'])) {
                    $query->orWhere('visitor_name', $data['visitor_name']);
                }
            })
            ->whereIn('status', ['pending', 'approved', 'waiting']);

        return $query->count();
    }

    protected function dateVisitCount(string $requestedDate): int
    {
        return VisitRequest::where('requested_date', $requestedDate)
            ->whereIn('status', self::CAPACITY_STATUSES)
            ->count();
    }

    protected function slotVisitCount(string $requestedDate, string $requestedTime): int
    {
        return VisitRequest::where('requested_date', $requestedDate)
            ->where('requested_time', $requestedTime)
            ->whereIn('status', self::CAPACITY_STATUSES)
            ->count();
    }

    /**
     * Return availability counts per slot for a given date.
     */
    public function availability(Request $request)
    {
        $date = $request->query('date');
        $slots = ['08:00','09:00','10:00','11:00','13:00','14:00','15:00','16:00'];
        $res = [];
        foreach ($slots as $s) {
            $res[$s] = $this->slotVisitCount($date, $s);
        }
        return response()->json($res);
    }

    protected function promoteWaitingRequests(string $requestedDate): void
    {
        while ($this->dateVisitCount($requestedDate) < self::MAX_DAILY_VISITS) {
            $next = VisitRequest::where('requested_date', $requestedDate)
                ->where('status', 'waiting')
                ->orderBy('created_at')
                ->first();

            if (! $next) {
                break;
            }

            $next->update(['status' => 'pending']);
        }
    }

    protected function getVisitDateForPromotion(VisitRequest $visit): string
    {
        return $visit->requested_date ?? $visit->request_date;
    }

    protected function generateConfirmationCode(): string
    {
        return str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);
    }
}
?>
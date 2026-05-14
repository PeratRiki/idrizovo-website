<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class VisitRequestController extends Controller
{
    protected function resolveTable(): ?string
    {
        foreach (['visit_requests', 'appointment_requests', 'requests'] as $table) {
            if (Schema::hasTable($table)) {
                return $table;
            }
        }

        return null;
    }

    public function index(Request $request)
    {
        $table = $this->resolveTable();
        $requests = collect();

        if ($table) {
            $requests = DB::table($table)
                ->when($request->filled('search'), function ($query) use ($request, $table) {
                    return $query->where(function ($query) use ($request, $table) {
                        foreach (['name', 'email', 'phone', 'prisoner', 'requested_for'] as $column) {
                            if (Schema::hasColumn($table, $column)) {
                                $query->orWhere($column, 'like', '%'.$request->search.'%');
                            }
                        }
                    });
                })
                ->when(Schema::hasColumn($table, 'created_at'), function ($query) {
                    return $query->orderByDesc('created_at');
                }, function ($query) {
                    return $query->orderByDesc('id');
                })
                ->get();
        }

        return view('admin.visit-requests', compact('requests', 'table'));
    }

    public function approve($id)
    {
        return $this->updateStatus($id, 'approved');
    }

    public function reject($id)
    {
        return $this->updateStatus($id, 'rejected');
    }

    protected function updateStatus($id, $status)
    {
        $table = $this->resolveTable();

        if (!$table || !Schema::hasColumn($table, 'status')) {
            return redirect()->back()->with('error', 'Visit request table or status column is not available.');
        }

        $data = ['status' => ucfirst($status)];
        if (Schema::hasColumn($table, 'updated_at')) {
            $data['updated_at'] = now();
        }

        $updated = DB::table($table)->where('id', $id)->update($data);

        if (!$updated) {
            return redirect()->back()->with('error', 'Unable to update request status.');
        }

        return redirect()->back()->with('success', 'Request has been ' . ucfirst($status) . '.');
    }
}
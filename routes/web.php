<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\Admin\DashboardController;
use App\Http\Controllers\Admin\Admin\AnalyticsController;
use App\Http\Controllers\Admin\Admin\MessagesController;
use App\Http\Controllers\Admin\Admin\LogController;
use App\Http\Controllers\Admin\Admin\VisitRequestController;
use App\Http\Controllers\Admin\Admin\HandmadeController;
use App\Http\Controllers\Admin\Admin\NovostiController;
use App\Http\Controllers\Admin\Admin\AktivnostiController;
use App\Models\HandmadeItem;
use App\Models\HandmadeQuote;
use App\Models\Novost;
use App\Models\Aktivnost;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () { return view('views.Homepage'); })->name('homepage.index');
Route::get('/AboutUs', function () { return view('views.AboutUs'); })->name('about.index');
Route::get('/Contact', function () { return view('views.Contact'); })->name('contact.index');
Route::get('/Article', function () { return view('views.Article'); })->name('article.index');
Route::get('/Activities', function () {
    $aktivnosti = Aktivnost::active()->orderBy('sort_order')->get();
    return view('views.Activities', compact('aktivnosti'));
})->name('activities.index');
Route::get('/Handmade', function () {
    $items  = HandmadeItem::active()->get();
    $quotes = HandmadeQuote::active()->get();
    return view('views.Handmade', compact('items', 'quotes'));
})->name('handmade.index');
Route::get('/Color', function () { return view('views.Color'); })->name('color.index');
Route::get('/Grncarstvo', function () { return view('views.Grncarstvo'); })->name('grncarstvo.index');
Route::get('/Iglaikonec', function () { return view('views.Iglaikonec'); })->name('iglaikonec.index');
Route::get('/Rezba', function () { return view('views.Rezba'); })->name('rezba.index');
Route::get('/Novosti', function () {
    $novosti = Novost::active()->get();
    return view('views.Novosti', compact('novosti'));
})->name('novosti.index');
Route::get('/zakazi-poseta', function () { return view('views.Appointments'); })->name('appointments.index');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/visits', [VisitRequestController::class, 'store'])->name('visits.store');

/*
|--------------------------------------------------------------------------
| Admin Protected Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->group(function () {

    // Главна табла
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Аналитика
    Route::get('/analytics', [AnalyticsController::class, 'index'])->name('admin.analytics');

    // Пораки
    Route::get('/messages', [MessagesController::class, 'index'])->name('admin.messages');

    // Логови
    Route::get('/security-logs', [LogController::class, 'security'])->name('admin.security');
    Route::get('/system-logs', [LogController::class, 'system'])->name('admin.system');

    // Барања за посети
    Route::get('/visits', [VisitRequestController::class, 'index'])->name('admin.visits');
    Route::patch('/visits/{visit}/approve', [VisitRequestController::class, 'approve'])->name('admin.visits.approve');
    Route::patch('/visits/{visit}/reject', [VisitRequestController::class, 'reject'])->name('admin.visits.reject');
    Route::patch('/visits/{visit}/status', [VisitRequestController::class, 'updateStatus'])->name('admin.visits.status');
    Route::patch('/messages/{message}/read', [MessagesController::class, 'markAsRead'])->name('admin.messages.read');

    // Рачни изработки — CRUD
    Route::resource('handmade', HandmadeController::class)
        ->parameters(['handmade' => 'handmadeItem'])
        ->names([
            'index'   => 'admin.handmade.index',
            'create'  => 'admin.handmade.create',
            'store'   => 'admin.handmade.store',
            'edit'    => 'admin.handmade.edit',
            'update'  => 'admin.handmade.update',
            'destroy' => 'admin.handmade.destroy',
        ]);

    // Цитати за рачни изработки
    Route::post('/handmade-quotes', [HandmadeController::class, 'storeQuote'])->name('admin.handmade.storeQuote');
    Route::delete('/handmade-quotes/{handmadeQuote}', [HandmadeController::class, 'destroyQuote'])->name('admin.handmade.destroyQuote');

    // Новости — CRUD
    Route::resource('novosti', NovostiController::class)
        ->names([
            'index'   => 'admin.novosti.index',
            'create'  => 'admin.novosti.create',
            'store'   => 'admin.novosti.store',
            'edit'    => 'admin.novosti.edit',
            'update'  => 'admin.novosti.update',
            'destroy' => 'admin.novosti.destroy',
        ]);

    // Активности — CRUD
    Route::resource('aktivnosti', AktivnostiController::class)
        ->names([
            'index'   => 'admin.aktivnosti.index',
            'create'  => 'admin.aktivnosti.create',
            'store'   => 'admin.aktivnosti.store',
            'edit'    => 'admin.aktivnosti.edit',
            'update'  => 'admin.aktivnosti.update',
            'destroy' => 'admin.aktivnosti.destroy',
        ]);

    // Останати админ страници
    Route::get('/aboutus', function () { return view('AboutUs'); });
    Route::get('/activities', function () { return view('Activities'); })->name('admin.activities');
    Route::get('/article', function () { return view('Article'); })->name('admin.article');
    Route::get('/color', function () { return view('Color'); });
});
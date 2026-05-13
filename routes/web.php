<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\Admin\DashboardController;
use App\Http\Controllers\Admin\Admin\AnalyticsController;
use App\Http\Controllers\Admin\Admin\MessagesController; // Со „s“ како што ти е фајлот
use App\Http\Controllers\Admin\Admin\LogController;
use App\Http\Controllers\Admin\Admin\VisitRequestController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () { return view('views.Homepage'); })->name('homepage.index');
Route::get('/AboutUs', function () { return view('views.AboutUs'); })->name('about.index');
Route::get('/Contact', function () { return view('views.Contact'); })->name('contact.index');
Route::get('/Article', function () { return view('views.Article'); })->name('article.index');
Route::get('/Activities', function () { return view('views.Activities'); })->name('activities.index');
Route::get('/Handmade', function () { return view('views.Handmade'); })->name('handmade.index');
Route::get('/Color', function () { return view('views.Color'); })->name('color.index');
Route::get('/Grncarstvo', function () { return view('views.Grncarstvo'); })->name('grncarstvo.index');
Route::get('/Iglaikonec', function () { return view('views.Iglaikonec'); })->name('iglaikonec.index');
Route::get('/Rezba', function () { return view('views.Rezba'); })->name('rezba.index');
Route::get('/Novosti', function () { return view('views.Novosti'); })->name('novosti.index');
Route::get('/visits', [VisitRequestController::class, 'index'])->name('visits.index');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('logout');

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
    
    // Пораки (Внимавај: MessagesController со „s“)
    Route::get('/messages', [MessagesController::class, 'index'])->name('admin.messages');
    
    // Логови
    Route::get('/security-logs', [LogController::class, 'security'])->name('admin.security');
    Route::get('/system-logs', [LogController::class, 'system'])->name('admin.system');

    // Останати админ страници
    Route::get('/aboutus', function () { return view('AboutUs'); });
    Route::get('/activities', function () { return view('Activities'); });
    Route::get('/article', function () { return view('Article'); });
    Route::get('/color', function () { return view('Color'); });
});
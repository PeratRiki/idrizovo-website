<?php

use Illuminate\Support\Facades\Route;

// Frontend routes
Route::get('/', function () {
    return view('Homepage');
})->name('homepage.index');

Route::get('/AboutUs', function () {
    return view('AboutUs');
})->name('about.index');

Route::get('/Homepage', function () {
    return view('Homepage');
});

Route::get('/Contact', function () {
    return view('Contact');
})->name('contact.index');

Route::get('/Article', function () {
    return view('Article');
})->name('article.index');

Route::get('/Activities', function () {
    return view('Activities');
})->name('activities.index');

Route::get('/Handmade', function () {
    return view('Handmade');
})->name('handmade.index');

Route::get('/Color', function () {
    return view('Color');
})->name('color.index');

Route::get('/Grncarstvo', function () {
    return view('Grncarstvo');
})->name('grncarstvo.index');

Route::get('/Iglaikonec', function () {
    return view('Iglaikonec');
})->name('iglaikonec.index');

Route::get('/Rezba', function () {
    return view('Rezba');
})->name('rezba.index');

Route::get('/Novosti', function () {
    return view('Novosti');
})->name('novosti.index');

// Admin routes
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin/aboutus', function () {
    return view('AboutUs');
});

Route::get('/admin/activities', function () {
    return view('Activities');
});

Route::get('/admin/article', function () {
    return view('Article');
});

Route::get('/admin/contact', function () {
    return view('Contact');
});

Route::get('/admin/color', function () {
    return view('Color');
});

use App\Http\Controllers\Auth\LoginController;

// Login рути
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('logout');

// Заштити ги админ рутите со 'auth' middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });
    // Тука додај ги сите останати админ рути (Articles, Colors итн.)
});
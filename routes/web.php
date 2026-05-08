<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Homepage');
});

Route::get('/AboutUs', function () {
    
    return view('AboutUs');
});

Route::get('/Homepage', function () {
    return view('Homepage');
});

Route::get('/Contact', function () {
    return view('Contact');
});

Route::get('/Article', function () {
    return view('Article');
});

Route::get('/Activities', function () {
    return view('Activities');
});

Route::get('/Handmade', function () {
    return view('Handmade');
});

Route::get('/Color', function () {
    return view('Color');
});

Route::get('/Grncarstvo', function () {
    return view('Grncarstvo');
});

Route::get('/Iglaikonec', function () {
    return view('Iglaikonec');
});

Route::get('/Rezba', function () {
    return view('Rezba');
});

Route::get('/Novosti', function () {
    return view('Novosti');
});
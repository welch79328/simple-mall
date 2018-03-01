<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('about', function () {
    return view('frontend.about');
});

Route::get('contact', function () {
    return view('frontend.contact');
});

Route::get('icons', function () {
    return view('frontend.icons');
});

Route::get('mens', function () {
    return view('frontend.mens');
});

Route::get('single', function () {
    return view('frontend.single');
});

Route::get('typography', function () {
    return view('frontend.typography');
});

Route::get('womens', function () {
    return view('frontend.womens');
});


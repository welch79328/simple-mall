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

Route::group(['namespace' => 'Frontend'], function() {
    Route::get('/', 'IndexController@index');
    Route::get('category/{cate_id}', 'CategoryController@index');
    Route::post('getlimitcommodities', 'IndexController@getLimitCommodities');
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

require __DIR__ . '/web/backstage.php';


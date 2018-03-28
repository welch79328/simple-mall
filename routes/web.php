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

Route::group(['middleware' => 'web', 'namespace' => 'Frontend'], function() {

    //首頁--start
    Route::get('/', 'IndexController@index');
    Route::post('get_limit_commodities', 'IndexController@getLimitCommodities');
    Route::post('get_general_commodities', 'IndexController@getGeneralCommodities');
    //首頁--end
    
    //會員--start
    Route::get('signin', 'MemberController@signIn');
    Route::get('signup', 'MemberController@signUp');
    //會員--end
    
    //商品分類--start
    Route::get('category/{cate_id}', 'CategoryController@index');
    Route::post('get_general_commodities_by_query', 'CategoryController@getGeneralCommoditiesByQuery');
    //商品分類--end

    Route::get('contact', 'ContactController@index');
});

Route::get('about', function () {
    return view('frontend.about');
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


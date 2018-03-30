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

Route::group(['middleware' => 'web', 'namespace' => 'Frontend'], function () {

    //首頁--start
    Route::get('/', 'IndexController@index');
    Route::post('get_limit_commodities', 'IndexController@getLimitCommodities');
    Route::post('get_commodities', 'IndexController@getCommodities');
    //首頁--end

    //會員--start
    Route::get('signin', 'MemberController@signIn');
    Route::get('signup', 'MemberController@signUp');
    //會員--end

    //商品分類--start
    Route::get('category/{cate_id}', 'CategoryController@index');
    Route::post('get_commodities_by_query', 'CategoryController@getCommoditiesByQuery');
    //商品分類--end

    Route::middleware(['check.commodity.deadline'])->group(function () {
        //商品--start
        Route::get('commodity/{commodity_id}', 'CommodityController@index');
        //商品--end
    });

    Route::get('contact', 'ContactController@index');
});

require __DIR__ . '/web/backstage.php';


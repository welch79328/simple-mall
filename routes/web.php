<?php

use App\Http\Controllers\Frontend\CommonController;

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
    Route::get('member_signin', 'MemberController@signIn')->name("member_signin");
    Route::get('member_signup', 'MemberController@signUp');
    Route::post('member_store', 'MemberController@store');
    Route::group(['roles' => ['member'], 'middleware' => ['web', 'login.judgment']], function () {
        Route::get('member_info', 'MemberController@info');
        Route::get('member_password', 'MemberController@infoPassword');
        Route::get('member_order', 'MemberController@order');
        Route::get('member_order_detail/{order_id}', 'MemberController@orderDetail');
        Route::post('member_order_cancel', 'MemberController@cancelOrder');
        Route::post('member_update', 'MemberController@update');
        Route::post('member_update_password', 'MemberController@updatePassword');
    });
    //會員--end

    //商品分類--start
    Route::get('category/{cate_id}', 'CategoryController@index');
    Route::get('limit_commodities_page', 'CategoryController@limitCommoditiesPage');
    Route::post('get_commodities_by_query', 'CategoryController@getCommoditiesByQuery');
    Route::post('get_more_limit_commodities', 'CategoryController@getLimitCommodities');
    //商品分類--end

    Route::middleware(['check.commodity.deadline'])->group(function () {
        //商品--start
        Route::get('commodity/{commodity_id}', 'CommodityController@index');
        //商品--end
    });

    Route::get('search/{keyword}', 'CommodityController@search');

    Route::get('contact', 'ContactController@index');

    Route::get('question', function () {
        new CommonController;
        return view("frontend.question");
    });

    Route::get('about', function () {
        new CommonController;
        return view("frontend.about.about");
    });

    Route::get('privacy', function () {
        new CommonController;
        return view("frontend.about.privacy");
    });
});

require __DIR__ . '/web/backstage.php';


<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Shoppingcart\Http\Controllers'], function () {
//    Route::get('/', 'ShoppingcartController@index');
    //購物車
    Route::get('shoppingcart/show', 'ShoppingcartController@show');

    //加入購物車
    Route::get('shopping/{commodity_id}', 'ShoppingcartController@push');
    Route::get('push_with_spec/{commodity_id}', 'ShoppingcartController@pushWithSpec');
//    //購物車路由
//    Route::resource('shoppingcart', 'ShoppingcartController');
    //SESSION時間顯示
    Route::get('session/time', 'ShoppingcartController@time');

    //刪除項目
    Route::get('shopping/remove/{rowId}', 'ShoppingcartController@remove');

    //修改項目數量
    Route::post('shopping/update_amount', 'ShoppingcartController@updateAmount');
});



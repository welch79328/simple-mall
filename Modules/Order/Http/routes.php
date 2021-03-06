<?php

Route::group(['roles' => ['member'], 'middleware' => ['web', 'login.judgment'], 'namespace' => 'Modules\Order\Http\Controllers'], function () {
    Route::get('order_info', 'OrderController@orderInfo');
    Route::post('order_setup', 'OrderController@orderSetup');
});

Route::group(['roles' => ['member', 'manager', 'admin'], 'middleware' => ['web', 'admin.login.judgment'], 'prefix' => 'admin', 'namespace' => 'Modules\Order\Http\Controllers'], function () {
//    Route::resource('order', 'OrderController');
    Route::any('order', 'OrderController@index');
    Route::get('order/{order_id}', 'OrderController@show');
    Route::get('commodity_show', 'OrderController@commodity_show');
    Route::get('commodity_show_list/{commodity_id}', 'OrderController@commodity_show_list');
    Route::post('commodity_show_list/edit', 'OrderController@commodity_show_list_edit');
    Route::get('commodity_show_list/{commodity_id}/excel', 'OrderController@commodity_show_list_excel');
    Route::get('order/alone/{id}', 'OrderController@order_alone');
    Route::post('order/update/{order_id}', 'OrderController@update');
    Route::post('order/alone/{id}/update', 'OrderController@order_alone_update');

    Route::get('commodity_reached','OrderController@commodity_reached');
});

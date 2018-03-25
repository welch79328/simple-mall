<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Order\Http\Controllers'], function()
{
    Route::post('order_info', 'OrderController@orderInfo');
    Route::post('order_setup', 'OrderController@orderSetup');
});

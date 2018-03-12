<?php

Route::group(['middleware' => 'web', 'prefix' => 'admin', 'namespace' => 'Modules\Commodity\Http\Controllers'], function()
{
    Route::resource('commodity', 'CommodityController');
});

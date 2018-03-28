<?php

Route::group(['roles' => ['member', 'manager', 'admin'],'middleware' => ['web','admin.login.judgment'], 'prefix' => 'admin', 'namespace' => 'Modules\Commodity\Http\Controllers'], function()
{
    Route::resource('commodity', 'CommodityController');
});

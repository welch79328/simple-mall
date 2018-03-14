<?php

Route::group(['roles' => ['member', 'manager', 'admin'],'middleware' => 'web', 'prefix' => 'admin', 'namespace' => 'Modules\Commodity\Http\Controllers'], function()
{
    Route::resource('commodity', 'CommodityController')->middleware('admin.login.judgment');
});

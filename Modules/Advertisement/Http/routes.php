<?php

Route::group(['roles' => ['member', 'manager', 'admin'],'middleware' => ['web','admin.login.judgment'], 'prefix' => 'admin', 'namespace' => 'Modules\Advertisement\Http\Controllers'], function()
{
    Route::resource('advertisement', 'AdvertisementController');
});

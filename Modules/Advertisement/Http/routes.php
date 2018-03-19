<?php

Route::group(['middleware' => 'web', 'prefix' => 'admin', 'namespace' => 'Modules\Advertisement\Http\Controllers'], function()
{
    Route::resource('advertisement', 'AdvertisementController');
});

<?php

Route::group(['middleware' => 'web', 'prefix' => 'commodity', 'namespace' => 'Modules\Commodity\Http\Controllers'], function()
{
    Route::resource('/', 'CategoryController');
});

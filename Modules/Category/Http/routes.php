<?php

Route::group(['middleware' => 'web', 'prefix' => 'category', 'namespace' => 'Modules\Category\Http\Controllers'], function()
{
    Route::resource('/', 'CategoryController');
});

<?php

Route::group(['middleware' => 'web', 'prefix' => 'admin', 'namespace' => 'Modules\Category\Http\Controllers'], function()
{
    Route::resource('category', 'CategoryController');
});

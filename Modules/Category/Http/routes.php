<?php

Route::group(['roles' => ['member', 'manager', 'admin'],'middleware' => ['web','admin.login.judgment'], 'prefix' => 'admin', 'namespace' => 'Modules\Category\Http\Controllers'], function()
{
    Route::resource('category', 'CategoryController');
});

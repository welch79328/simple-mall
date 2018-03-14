<?php

Route::group(['roles' => ['member', 'manager', 'admin'],'middleware' => 'web', 'prefix' => 'admin', 'namespace' => 'Modules\Category\Http\Controllers'], function()
{
    Route::resource('category', 'CategoryController')->middleware('admin.login.judgment');
});

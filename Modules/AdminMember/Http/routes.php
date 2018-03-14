<?php



Route::group(['roles' => ['member', 'manager', 'admin'],'middleware' => 'web', 'prefix' => 'admin', 'namespace' => 'Modules\AdminMember\Http\Controllers'], function()
{
    Route::any('login', 'LoginController@login');
    Route::any('login', 'LoginController@login');
    Route::resource('member', 'AdminMemberController')->middleware('admin.login.judgment');
});

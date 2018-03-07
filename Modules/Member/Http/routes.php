<?php



Route::group(['roles' => ['member', 'manager', 'admin'],'middleware' => 'web', 'prefix' => 'member', 'namespace' => 'Modules\Member\Http\Controllers'], function()
{
    Route::any('login', 'LoginController@login');
//    Route::any('generate_password', 'LoginController@generate_password');
    Route::any('quit', 'LoginController@quit')->middleware('login.judgment');

    Route::resource('/', 'MemberController');
});

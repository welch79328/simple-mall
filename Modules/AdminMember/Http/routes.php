<?php

Route::group(['middleware' => 'web', 'prefix' => 'admin/member', 'namespace' => 'Modules\AdminMember\Http\Controllers'], function()
{
    Route::get('/', 'AdminMemberController@index');
});

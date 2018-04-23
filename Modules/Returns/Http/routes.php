<?php

Route::group(['roles' => ['member', 'manager', 'admin'], 'middleware' => ['web', 'admin.login.judgment'], 'prefix' => 'admin', 'namespace' => 'Modules\Returns\Http\Controllers'], function () {
    Route::get('returns', 'ReturnsController@index');
    Route::get('returns_edit/{returns_id}', 'ReturnsController@edit');
    Route::get('returns_complete/{returns_id}', 'ReturnsController@complete');

    Route::post('returns/update/{returns_id}', 'ReturnsController@update');
});

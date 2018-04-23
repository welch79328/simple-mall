<?php

Route::group(['roles' => ['member', 'manager', 'admin'], 'middleware' => ['web', 'admin.login.judgment'], 'prefix' => 'admin', 'namespace' => 'Modules\Returns\Http\Controllers'], function () {
    Route::get('return', 'ReturnsController@index');
    Route::get('return_complete/{return_id}', 'ReturnsController@complete');
});

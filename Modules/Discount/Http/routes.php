<?php

Route::group(['middleware' => 'web', 'prefix' => 'discount', 'namespace' => 'Modules\Discount\Http\Controllers'], function()
{
    Route::resource('/', 'DiscountController');
});

<?php

Route::group(['middleware' => 'web', 'prefix' => 'shoppingcart', 'namespace' => 'Modules\ShoppingCart\Http\Controllers'], function()
{
    Route::get('/', 'ShoppingCartController@index');
});

<?php

//Route::any('/SMC/index.php', 'Admin\IndexController@freeadwifi');
//
//Route::any('admin/test', 'Admin\LoginController@test');
////後台登入
//Route::any('admin/login', 'Admin\LoginController@login');

Route::group(['roles' => ['member', 'manager', 'admin'],'middleware' => ['admin.login.judgment'], 'prefix'=>'admin','namespace'=>'Backstage'], function (){

    Route::get('/', 'IndexController@index');
    //後台主頁面
    Route::get('info', 'IndexController@info');

    Route::get('layout', 'LayoutController@index');


//    Route::get('quit', 'LoginController@quit');
//    //使用者管理
//    Route::resource('user', 'UserController');
//    //登入狀態
//    Route::any('loginlog', 'UserController@login');
//
//    //功能頁
//    Route::resource('config', 'ConfigController');
//    Route::post('config/changecontent', 'ConfigController@changeContent');
//    Route::get('config/putfile', 'ConfigController@putFile');
//
//    Route::get('report', 'ReportController@index');
//    Route::any('reporttest', 'ReportController@test');
//    Route::any('reporttest2', 'ReportController@test2');
//
//    Route::get('layout', 'LayoutController@index');
//    Route::post('layout/changecontent', 'LayoutController@changeContent');
//    Route::any('select/case/layout', 'LayoutController@selectcase');
//
//
//    Route::resource('router', 'RouterController');
//    //出首頁圖
//    Route::any('router/{routerName}/demo', 'RouterController@demo');
//    Route::any('router/{routerName}/imitation', 'RouterController@imitation');
//    Route::any('router_/search', 'RouterController@search');
//
//    //分類
//    Route::resource('category', 'CategoryController');
//    Route::any('classification_changes/{cate_id}', 'CategoryController@classification_changes');
//    Route::any('classification_changes_up', 'CategoryController@classification_changes_up');
//    //廣告分類
//    Route::resource('advcategory', 'AdvCategoryController');
//    Route::any('adv/classification_changes/{cate_id}', 'AdvCategoryController@classification_changes');
//    Route::any('adv/classification_changes_up', 'AdvCategoryController@classification_changes_up');
//
//
    Route::any('upload', 'CommonController@upload');
});


Route::group(['roles' => ['member', 'manager', 'admin'],'middleware' => ['admin.login.judgment'],'namespace'=>'Backstage'], function (){
    Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');
});

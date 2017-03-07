<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//前端路由
Route::group(['namespace' => 'Home'],function(){
    Route::get('/', 'IndexController@index');
});


//后端路由
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    Route::any('login','LoginController@login')->name('admin_login');
    Route::group(['middleware'=>['auth.admin']],function(){
        Route::get('admin', 'IndexController@index');
        Route::post('admin_reg', 'AdminController@store')->name('admin_reg');
        Route::get('logout', 'LoginController@logout');
        //权限列表
        Route::get('admin_auth_permission','AdminPermissionController@index');
        Route::get('admin_auth_role','AdminPermissionController@roleList');
        //添加权限角色
        Route::any('admin_auth_role/add','AdminPermissionController@roleAdd')->name('roleadd');
        //修改权限组权限
        Route::any('admin_auth_role/edit/{id}','AdminPermissionController@permissions')->name('role_edit');
        Route::post('permissionsrole/edit','AdminPermissionController@storePermissions')->name('permissionsrole');
        //添加权限
        Route::get('admin_auth_permission/add','AdminPermissionController@addMenu');
        Route::post('add_menu','AdminPermissionController@store')->name('store');
        //文章列表
        Route::get('article', 'ArticleController@index')->name('article_list');
        //管理员列表
        Route::get('administrator_list','AdminController@index');
        Route::get('administrator', 'AdminController@addAdministrator');
    });

});

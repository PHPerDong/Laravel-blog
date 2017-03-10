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
    Route::get('errors/403','LoginController@errors');
    Route::get('logout', 'LoginController@logout');
    Route::group(['middleware'=>'auth.admin'],function(){
        Route::get('admin', ['as' => 'admin.index.index', 'uses' => 'IndexController@index']);
        Route::post('admin_reg', 'AdminController@store')->name('admin_reg');

        //权限列表
        Route::get('admin_auth_permission',['as' => 'admin.admin_auth.permission.index', 'uses' => 'AdminPermissionController@index']);
        Route::get('admin_auth_role',['as' => 'admin.admin_auth.permission.role', 'uses' => 'AdminPermissionController@roleList']);
        //添加权限角色
        Route::any('admin_auth_role/add','AdminPermissionController@roleAdd')->name('roleadd');
        //修改权限组权限
        Route::any('admin_auth_role/edit/{id}','AdminPermissionController@permissions')->name('role_edit');
        Route::post('permissionsrole/edit/{id}','AdminPermissionController@storePermissions')->name('permissionsrole');
        //添加权限
        Route::get('admin_auth_permission/add',['as' => 'admin.admin_auth.permission.create', 'uses' => 'AdminPermissionController@addMenu']);
        Route::post('add_menu','AdminPermissionController@store')->name('store');
        //文章列表
        Route::get('article', 'ArticleController@index')->name('article_list');
        //管理员列表
        Route::get('administrator_list',['as' => 'admin.admin_auth.index', 'uses' => 'AdminController@index']);
        Route::get('administrator', ['as' => 'admin.admin_auth.create', 'uses' => 'AdminController@addAdministrator']);
        //修改管理员
        Route::get('administrator/edit/{id}','AdminController@edit')->name('administrator_edit');
        Route::post('update/{id}','AdminController@editAdministrator')->name('administrator_update');
    });

});

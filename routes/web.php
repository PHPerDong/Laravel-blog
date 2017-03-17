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
Route::group(['namespace' => 'Home','domain'=>env('FRONT_DOMAIN')],function(){
    Route::get('/', 'IndexController@index');
});


//后端路由
Route::group(['prefix'=>'admin','namespace'=>'Admin','domain'=>env('BACKGROUND_DOMAIN')],function($router){
    $router->any('login','LoginController@login')->name('admin_login');
    $router->get('errors/403','LoginController@errors');
    $router->get('logout', 'LoginController@logout');
    //清除缓存
    $router->get('clear_cache','AdminPermissionController@clearedCache');
    $router->group(['middleware'=>['auth.admin','menu']],function($router){
        $router->get('admin', ['as' => 'admin.index.index', 'uses' => 'IndexController@index']);
        $router->post('admin_reg', 'AdminController@store')->name('admin_reg');

        //权限列表
        $router->get('admin_auth_permission',['as' => 'admin.admin_auth.permission.index', 'uses' => 'AdminPermissionController@index']);
        $router->get('admin_auth_role',['as' => 'admin.admin_auth.permission.role', 'uses' => 'AdminPermissionController@roleList']);
        //添加权限角色
        $router->any('admin_auth_role/add','AdminPermissionController@roleAdd')->name('roleadd');
        //删除权限组
        $router->post('delete/role','AdminPermissionController@delRole')->name('role_delete');
        //修改权限组权限
        $router->any('admin_auth_role/edit/{id}','AdminPermissionController@permissions')->name('role_edit');
        $router->post('permissionsrole/edit/{id}','AdminPermissionController@storePermissions')->name('permissionsrole');
        //添加权限
        $router->get('admin_auth_permission/add',['as' => 'admin.admin_auth.permission.create', 'uses' => 'AdminPermissionController@addMenu']);
        $router->post('add_menu','AdminPermissionController@store')->name('store');

        //管理员列表
        $router->get('administrator_list',['as' => 'admin.admin_auth.index', 'uses' => 'AdminController@index']);
        $router->get('administrator', ['as' => 'admin.admin_auth.create', 'uses' => 'AdminController@addAdministrator']);
        //修改管理员
        $router->get('administrator/edit/{id}','AdminController@edit')->name('administrator_edit');
        $router->post('update/{id}','AdminController@editAdministrator')->name('administrator_update');
        //删除管理员
        $router->post('delete/admin','AdminController@delAdmin')->name('administrator_delete');


        //文章管理
        $router->resource('/article','ArticleController');
        //文章分类管理
        $router->resource('/classification','CategoryController');
        //文章分类删除
        $router->post('/delete/class',['as' => 'class.delete', 'uses' => 'CategoryController@delClass']);
        //文章分类修改
        $router->post('/edit/class',['as' => 'class.edit', 'uses' => 'CategoryController@editClass']);
        //文章标签管理
        $router->resource('/label','LabelController');
        //修改标签
        $router->post('/updates/label',['as' => 'label.update', 'uses' => 'LabelController@editLabel']);
        //删除标签
        $router->post('/delete/label',['as' => 'label.delete', 'uses' => 'LabelController@delLabel']);



        //多图上传
        $router->post('/upload/upload','UploadController@upload');


    });

});

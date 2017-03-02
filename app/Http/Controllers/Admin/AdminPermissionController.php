<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PermissionRepositoryEloquent;
use App\Model\Permission;
use App\Http\Requests\Admin\Permission\CreateRequest;
use App\Http\Requests\Admin\Permission\UpdateRequest;
use Breadcrumbs, Toastr;

class AdminPermissionController extends BaseController
{

    protected $permission;

    protected $permissionRole;

    public function index(){
        return view('admin.admin_auth.permission.index');
    }


    public function roleList(){
        return view('admin.admin_auth.permission.role');
    }

    //添加菜单
    public function addMenu(){
        return view('admin.admin_auth.permission.create');
    }

    public function store(CreateRequest $request){

        $result = Permission::create($request->all());

        if(!$result) {
            //Toastr::error('新权限添加失败!');
            //return redirect('admin/permission/create');
            return response()->json(array('accessGranted'=>0));
        } else {
            //Toastr::success('新权限添加成功!');
            //return redirect('admin/permission');
            return response()->json(array('accessGranted'=>1));
        }
    }


}
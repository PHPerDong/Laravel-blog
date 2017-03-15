<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin,App\Model\Role;
use App\Http\Controllers\Controller;
use App\Repositories\AdminUserRepositoryEloquent;
use App\Http\Requests\Admin\AdminUser\CreateRequest;
use App\Http\Requests\Admin\AdminUser\UpdateRequest;
use Auth;


class AdminController extends BaseController
{

    protected $admin;

    protected $adminUserRole;

    public function __construct(AdminUserRepositoryEloquent $adminUser){
         parent::__construct();
         $this->admin = $adminUser;
    }

    //管理员列表
    public function index(){
         $admin_list = Admin::orderBy('id','desc')->paginate(10);
         return view('admin.admin_auth.index',compact('admin_list'));
    }
    //添加管理员
    public function addAdministrator(){
         return view('admin.admin_auth.create');
    }
    //修改管理员
    public function edit($id){
        $admin_user = $this->admin->find($id);
        //$hasRoles = $admin_user->roles();
        $role = Role::get();
        //dd($role->chunk(1));
        //dd($role_ids=$admin_user->roles->pluck('id')->all());
        $role_ids=$admin_user->roles->pluck('id')->all();
        return view('admin.admin_auth.edit',compact('admin_user','role','role_ids'));
    }
    //修改管理员
    public function editAdministrator(Request $request, $id){
        //dd($request->all());
        $result = $this->admin->update($request->all(), $id);
        if(!$result['status']){
            return response()->json(array('accessGranted'=>0));
        }else{
            return response()->json(array('accessGranted'=>1));
        }
    }
    //删除管理员
    public function delAdmin(Request $request){
        $id = $request->input('id',0);
        if($id == 1){
            return response()->json(array('accessGranted'=>0,'msg'=>'超级管理员不能删除'));
        }
        $result = $this->admin->delete($id);
        if(!$result){
            return response()->json(array('accessGranted'=>0));
        }else{
            return response()->json(array('accessGranted'=>1));
        }
    }


    public function store(Request $request){

        $data = $request->all();
        //$data['password']=\Hash::make($data['password']);
        //$admin=Admin::create($data);
        $admin=$this->admin->store($data);

        /*if(isset($data['role'])){
            $roles=[];
            foreach($data['role'] as $v){
                $roles[]=$v;
            }
        }else{
            $roles=[];
        }
        $admin->roles()->sync($roles);*/
        if(!$admin){
            return response()->json(array('accessGranted'=>0));
        }else{
            return response()->json(array('accessGranted'=>1));
        }
        //return redirect()->route('admin.admin_auth.create');

    }

}

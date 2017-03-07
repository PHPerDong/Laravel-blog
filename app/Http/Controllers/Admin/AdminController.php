<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin,App\Model\Role;
use App\Http\Controllers\Controller;
use App\Repositories\AdminUserRepositoryEloquent;
use App\Http\Requests\Admin\AdminUser\CreateRequest;
use App\Http\Requests\Admin\AdminUser\UpdateRequest;



class AdminController extends BaseController
{

    protected $admin;

    protected $adminUserRole;

    public function __construct(AdminUserRepositoryEloquent $adminUser){
         $this->admin = $adminUser;
    }

    public function index(){
         $admin_list = Admin::orderBy('id','desc')->paginate(10);
         return view('admin.admin_auth.index',compact('admin_list'));
    }

    public function addAdministrator(){
         return view('admin.admin_auth.create');
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

<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PermissionRepositoryEloquent;
use App\Repositories\RoleRepositoryEloquent;
use App\Model\Permission,App\Model\Role;
use App\Http\Requests\Admin\Permission\CreateRequest;
use App\Http\Requests\Admin\Permission\UpdateRequest;
//use Breadcrumbs, Toastr;

class AdminPermissionController extends BaseController
{

    protected $permission;

    protected $permissionRole;

    protected $role;

    public function __construct(RoleRepositoryEloquent $role, PermissionRepositoryEloquent $permission){

        parent::__construct();
        $this->role = $role;
        $this->permission = $permission;
    }

    //权限菜单列表页
    public function index(){
        
        $permission = $this->permission->topPermissions();
        $permissions = self::recursion_children($permission);
        //dd($permissions);
        return view('admin.admin_auth.permission.index',compact('permissions'));
    }

    //权限组(角色)
    public function roleList(){
        $role_list = Role::orderBy('id','desc')->get();
        return view('admin.admin_auth.permission.role',compact('role_list'));
    }
    //修改权限组权限
    public function permissions($id){
        $role = $this->role->find($id);
        $permission = $this->permission->topPermissions();
        $permissions = self::recursion_children($permission);
        //dd($permissions);
        $rolePermissions = $this->role->rolePermissions($id);
        return view('admin.admin_auth.permission.edit',compact('role','permissions','rolePermissions'));
    }
    //修改权限组权限
    public function storePermissions($id, Request $request)
    {
        //dd($request->input('permissions', []));
        $result = $this->role->savePermissions($id, $request->input('permissions', []));
        return response()->json($result ? ['status' => 1] : ['status' => 0]);
    }

    //添加权限组
    public function roleAdd(Request $request){
        if($request->isMethod('POST')){
            $result = $this->role->create($request->all());
            if(!$result){
                return response()->json(array('accessGranted'=>0));
            }else{
                return response()->json(array('accessGranted'=>1));
            }
        }
        return view('admin.admin_auth.permission.addrole');
    }

    //添加菜单页
    public function addMenu(){
        return view('admin.admin_auth.permission.create');
    }

    //添加菜单
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

    /**
     * 递归处理栏目 子栏目放入child
     * @param array $arr 源数组
     * @param int   $id
     * @return array
     */
    public static function recursion_children($arr,$id=0){
        $data=array();
        foreach($arr as $k=>$v){
            if($v['fid']==$id){
                $v['child']=self::recursion_children($arr,$v['id']);
                $data[]=$v;
            }
        }
        return $data;
    }

}
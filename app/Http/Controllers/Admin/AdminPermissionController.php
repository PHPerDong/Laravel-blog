<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin;

class AdminPermissionController extends BaseController
{

    public function index(){
        return view('admin.admin_auth.permission.index');
    }


    public function roleList(){
        return view('admin.admin_auth.permission.role');
    }


}
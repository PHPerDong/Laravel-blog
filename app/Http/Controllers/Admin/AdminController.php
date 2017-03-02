<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin;

class AdminController extends BaseController
{

    public function index(){
         return view('admin.admin_auth.create');
    }

    public function store(Request $request){

        $data = $request->all();
        $data['password']=\Hash::make($data['password']);
        $admin=Admin::create($data);

        return redirect()->route('admin.admin_auth.create');

    }

}

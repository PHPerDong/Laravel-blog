<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth as A;
use Auth;

class LoginController extends Controller
{
    //
    public function login(Request $request){

        if($request->isMethod('POST')){
            $data = $request->only(['name','password']);
            if(Auth::guard('admin')->attempt($data)){
                return response()->json(array('accessGranted'=>1));
            }else{
                return response()->json(array('accessGranted'=>0));
            }
        }
        return view('admin.login.login');
    }


    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->to('/admin/login');
    }

    public function errors(){
        return view('admin.errors.403');
    }



}

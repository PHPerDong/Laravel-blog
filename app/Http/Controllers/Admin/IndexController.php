<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends BaseController
{
    //首页
    public function index(){
        //dd('index');
        return view('admin.index.index');
    }
}

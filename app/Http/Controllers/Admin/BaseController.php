<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Presenters\PermissionPresenter;
use App\Model\Admin;
use Auth,Cache;

class BaseController extends Controller
{

      protected $admin;

      protected $permissionPresenter;

      public function __construct()
      {
            //$this->middleware('auth.admin');
            //dump('adfasdf');
            $this->admin = Auth::guard('admin')->user();
            //$this->permissionPresenter = $permissionPresenter;
            //$menus = $this->permissionPresenter->menus();
            //dd(Auth::guard('admin')->user());
            //$this->getMenu();

      }

      protected function getMenu(){
            dd(Auth::guard('admin')->user());
      }







}

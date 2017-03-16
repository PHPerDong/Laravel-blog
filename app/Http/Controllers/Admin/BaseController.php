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


      }


}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class ArticleController extends BaseController
{
    //
    public function index(){
        return view('admin.article.article');
    }




}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $table = 'articles';

    protected $fillable = ['id','title','content','sort','created_at','updated_at','is_show','cid','thumb','photo','status','is_top','introduction'];




}

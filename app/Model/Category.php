<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categorys';

    protected $fillable = ['id','name','pid','sort','created_at','updated_at'];

    public function articles(){
          return $this->belongsToMany('App\Model\Article','articles_cate','article_id','category_id');
    }




}

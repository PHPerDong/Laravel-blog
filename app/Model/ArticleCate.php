<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ArticleCate extends Model
{

    protected $fillable = ['id','article_id','category_id'];

    public function article(){
        return $this->belongsTo('App\Model\Article');
    }

    public function category(){
        return $this->belongsTo('App\Model\Category');
    }



}

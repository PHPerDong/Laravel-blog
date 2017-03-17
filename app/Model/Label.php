<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{

    protected $table = 'labels';

    protected $fillable = ['id','name'];

    public function articles(){
        return $this->belongsToMany('App\Model\Article','articles_label','article_id','label_id');
    }



}

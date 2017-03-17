<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $table = 'articles';

    protected $fillable = ['id','title','content','sort','created_at','updated_at','is_show','pid','thumb','photo','status','is_top','introduction'];

    public function labels(){
        return $this->belongsToMany('App\Model\Label','articles_label','article_id','label_id');
    }


}

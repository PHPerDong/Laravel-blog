<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $table = 'articles';

    protected $fillable = ['id','title','content','sort','created_at','updated_at','is_show','pid','thumb','photo','status','is_top','introduction'];

    public function setPhotoAttribute($value){
        $this->attributes['photo'] = serialize($value);
    }

    public function getPhotoAttribute($value){
        return unserialize($value);
    }


    public function labels(){
        return $this->belongsToMany('App\Model\Label','articles_label','article_id','label_id')->withPivot('name');
    }

    public function categorys(){
        return $this->belongsToMany('App\Model\Category','articles_cate','article_id','category_id');
    }


}

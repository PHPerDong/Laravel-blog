<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ArticleLabel extends Model
{

    protected $fillable = ['id','article_id','label_id'];

    public function article(){
        return $this->belongsTo('App\Model\Article');
    }

    public function label(){
        return $this->belongsTo('App\Model\Label');
    }


}

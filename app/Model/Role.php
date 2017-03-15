<?php

namespace App\Model;

use Zizaco\Entrust\EntrustRole;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Role extends EntrustRole implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['name', 'display_name', 'description'];

    /**
     * belongs to many for admin_user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\Model\Admin','role_user','user_id','role_id');
    }

}


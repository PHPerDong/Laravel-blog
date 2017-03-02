<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
//use Illuminate\Contracts\Auth\Authenticatable;
//use Illuminate\Database\Eloquent\Model;


class Admin extends Authenticatable
{
    //use \Illuminate\Auth\Authenticatable;
    use Notifiable;
    use EntrustUserTrait;

    //protected $authGuardName='admin';

    protected $fillable = [
        'name', 'password','is_super'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];





}

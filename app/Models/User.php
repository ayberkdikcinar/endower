<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    public function getPosts(){
        return $this->hasMany('App\Models\Post','user_id','id');

    }

}

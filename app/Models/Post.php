<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getUser(){
        return $this->hasOne('App\Models\User','id','user_id');
    }
}

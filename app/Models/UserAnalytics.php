<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAnalytics extends Model
{
    

    public function getUser(){
        return $this->belongsTo(User::Class);
    }
}

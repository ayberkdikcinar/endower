<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileSettings extends Model
{
    public function getUser(){
        return $this->hasOne(User::Class);
    }
}

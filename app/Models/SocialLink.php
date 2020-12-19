<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    


    public function getUser(){
        return $this->belongsTo(User::class);
    }
}

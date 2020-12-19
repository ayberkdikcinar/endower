<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    

    public function getUser(){
        return $this->belongsTo(User::Class);
    }

    public function getDonator(){
        return $this->belongsTo(Donator::Class);
    }
}

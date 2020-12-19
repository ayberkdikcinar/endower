<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{


    public function getUser(){
        return $this->belongsTo(User::class);
    }

    public function getDonator(){
        return $this->belongsTo(Donator::class);
    }
}

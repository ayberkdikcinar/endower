<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function donator(){
        return $this->belongsTo(Donator::class);
    }
}

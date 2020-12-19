<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donator extends Model
{
    public function donations(){
        return $this->hasMany(Donation::class)->get()->all();
    }
}

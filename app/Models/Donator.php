<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donator extends Model
{
    public function getDonations(){
        return $this->hasMany(Donation::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Donation extends Model
{
    use Notifiable;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function donator(){
        return $this->belongsTo(Donator::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAnalytics extends Model
{
    

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function topDonator(){
        if(!$this->topDonator)
            return null;

        $donator=Donator::find($this->top_donator_id);
        return $donator;
    }
}

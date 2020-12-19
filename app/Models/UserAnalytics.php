<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAnalytics extends Model
{
    

    public function getUser(){
        return $this->belongsTo(User::Class);
    }

    public function getTopDonator(){
        if(!$this->topDonator)
            return null;

        $donator=Donator::find($this->top_donator_id);
        return $donator;
    }
}

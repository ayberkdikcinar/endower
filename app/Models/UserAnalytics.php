<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAnalytics extends Model
{


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topDonator()
    {


        $donator = Donator::find($this->top_donator_id);
        if($donator==NULL){
            $donator=new Donator();
            $donator->name="No Donator";
        }
        return $donator;
    }
}

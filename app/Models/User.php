<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{

    public function getPosts(){
        return $this->hasMany('App\Models\Post','user_id','id');
    }

    public function getProfileSettings(){
        return $this->hasOne(ProfileSettings::Class);
    }

    public function getAnalytics(){
        return $this->hasOne(UserAnalytics::Class);
    }

    public function getSocialLinks(){
        return $this->hasMany(SocialLink::Class);
    }

    public function getDonations(){
        return $this->hasMany(Donation::Class);
    }


}

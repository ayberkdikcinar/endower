<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{

    // Actions
    public function addPost($title, $content, $image_url){
        $post = new Post;
        $post->user_id=$this->id;
        $post->title=$title;
        $post->content=$content;
        $post->image_url=$image_url;

        $post->save();
    }

    public function addSocialLink($name, $url){
        $socialLink = new SocialLink;
        $socialLink->user_id=$this->id;
        $socialLink->name=$name;
        $socialLink->url=$url;

        $socialLink->save();
    }

    public function createProfileSettings(){
        $profile_settings=new ProfileSettings;
        $profile_settings->user_id=$this->id;
        $profile_settings->save();
    }

    public function createUserAnalytics(){
        $user_analytics=new UserAnalytics;
        $user_analytics->user_id=$this->id;
        $user_analytics->save();
    }




    // Getters & Relations
    public function getPosts(){
        return $this->hasMany('App\Models\Post','user_id','id');
    }

    public function getProfileSettings(){
        return $this->hasOne(ProfileSettings::class);
    }

    public function getAnalytics(){
        return $this->hasOne(UserAnalytics::class);
    }

    public function getSocialLinks(){
        return $this->hasMany(SocialLink::class);
    }

    public function getDonations(){
        return $this->hasMany(Donation::class);
    }


    // Boot Setup
    public static function boot()
    {
        parent::boot();

        self::created(function($model){
            
            // Create user setting
            $model->createProfileSettings();

            // Create user analytics
            $model->createUserAnalytics();

        });
    }
    // end boot

}

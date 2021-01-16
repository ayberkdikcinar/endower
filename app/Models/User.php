<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use Notifiable;

    // Actions
    public function addPost($title, $content, $image_url)
    {
        $post = new Post;
        $post->user_id = $this->id;
        $post->title = $title;
        $post->content = $content;
        $post->image_url = $image_url;

        $post->save();
    }

    public function addDonation($donator, $amount, $is_anonymous, $comment)
    {
        $donation = new Donation;
        $donation->user_id = $this->id;
        $donation->donator_id = $donator->id;
        $donation->amount = $amount;
        $donation->is_anonymous = $is_anonymous;
        $donation->comment = $comment;

        $donation->save();

        $this->calculateAnalytics($donator->id, $amount);
    }

    public function addSocialLink($name, $url)
    {
        if ($socialLink = SocialLink::where('user_id', Auth::user()->id)->where('name', $name)->first()) {
            $socialLink->user_id = $this->id;
            $socialLink->name = $name;
            $socialLink->url = $url;
        } else {
            $socialLink = new SocialLink;
            $socialLink->user_id = $this->id;
            $socialLink->name = $name;
            $socialLink->url = $url;
        }

        $socialLink->save();
    }

    public function createProfileSettings()
    {
        $profile_settings = new ProfileSettings;
        $profile_settings->user_id = $this->id;
        $profile_settings->save();
    }

    public function createUserAnalytics()
    {
        $user_analytics = new UserAnalytics;
        $user_analytics->user_id = $this->id;
        $user_analytics->save();
    }

    public function calculateAnalytics($donator_id = -1, $amount = -1)
    {
        $analytics = $this->UserAnalytics;

        // Calculate numbers
        $analytics->total_donation = $this->donations->sum('amount');
        $analytics->donator_count = $this->donations->groupBy('donator_id')->count();

        if ($amount > $analytics->top_donation) {
            $analytics->top_donation = $amount;
            $analytics->top_donator_id = $donator_id;
        }

        $analytics->save();
    }

    public function reversePosts()
    {
        $data = Post::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        return $data;
    }


    // Getters & Relations
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function profileSettings()
    {
        return $this->hasOne(ProfileSettings::class);
    }

    public function userAnalytics()
    {
        return $this->hasOne(UserAnalytics::class);
    }

    public function socialLinks()
    {
        return $this->hasMany(SocialLink::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }


    // Boot Setup
    public static function boot()
    {
        parent::boot();

        self::created(function ($model) {

            // Create user setting
            $model->createProfileSettings();

            // Create user analytics
            $model->createUserAnalytics();
        });
    }
    // end boot


}

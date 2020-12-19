<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SocialLinkController extends Controller
{
    public function create(Request $request){

        $user=User::find(5);

        $request->validate([
            'name'=>'min:3|max:100',
            'url'=>'max:256'
        ]);

        $name=$request->input('name');
        $url=$request->input('url');

        $user->addSocialLink($name, $url);

        // TODO: Return view or redirect
    }
    // end create
}

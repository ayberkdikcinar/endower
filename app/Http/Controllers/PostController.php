<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PostController extends Controller
{
    public function create(Request $request){

        $user=Auth::user();

        $title=$request->input('title');
        $content=$request->input('content');
        $image_url="/post.png";

        if($request->hasFile('image'))
            $image_url=GetImageUrl($request->image);
        

        $user->addPost($title, $content, $image_url);

        // TODO: Return view or redirect
    }
    // end create


}

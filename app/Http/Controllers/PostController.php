<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){

        $user=Auth::user();

        $title=$request->input('title');
        $content=$request->input('content');
        $image_url=NULL;

        if($request->hasFile('image')){
            $image_url=GetImageUrl($request->image);
        }

        $user->addPost($title, $content, $image_url);
    }
    // end create


}

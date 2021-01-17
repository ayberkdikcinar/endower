<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PostController extends Controller
{
    public function create(Request $request)
    {

       
        $user = User::where('id', Auth::user()->id)->first();

        
        $title = $request->input('title');
        $content = $request->input('content');
        $image_url = "/post.png";

        if ($request->hasFile('image'))
            $image_url = GetImageUrl($request->image);

        
        
        $user->addPost($title, $content, $image_url);

        //return redirect("/profile/$user->username_slug?action=postcreated&status=1");
        return redirect()->back();
    }
    // end create


    public function delete($postId)
    {
        $user = Auth::user();

        $post = $user->posts->find($postId);

        if ($post) {
            $post->destroy();

            // Success
            return redirect("/profile/$user->username_slug?action=postdeleted&status=1");
        } else {
            // Fail
            return redirect("/profile/$user->username_slug?action=postdeleted&status=0");
        }
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        $post = $user->posts->find($request->id);
        
        return response()->json($post);

    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $post = $user->posts->find($request->id);

        
    }
}

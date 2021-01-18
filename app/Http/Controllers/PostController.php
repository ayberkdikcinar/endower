<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Str;
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


    public function delete(Request $request)
    {
        $user = Auth::user();

        $post = Post::find($request->deleteid);

        if ($post) {
            $post->delete();

            // Success
            return redirect("/profile/$user->username_slug?action=postdeleted&status=1");
        } else {
            // Fail
            return redirect("/profile/$user->username_slug?action=postdeleted&status=0");
        }
    }

    public function getData(Request $request){

        $post=Post::findOrFail($request->id);
        return response()->json($post);

    }
    public function update(Request $request){

        $user = User::where('id', Auth::user()->id)->first();

        $title = $request->title;
        $content = $request->content;

        $id=$request->input('id');

        $post = Post::find($id);
        $image_url = $post->image_url;

        if($request->hasFile('image')){
            $imagename=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imagename);
            $image_url='uploads/'.$imagename;
        }

        $user->updatePost($title, $content, $image_url,$id);

        return redirect()->back();
    }
}

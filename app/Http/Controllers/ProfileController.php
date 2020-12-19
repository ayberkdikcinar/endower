<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{

    public function viewProfile($username){

        $user=User::where('user_name',$username)->first() ?? abort(404);

        if(Auth::check() && ($user->id==Auth::user()->id))
            return view('back.profile');

        else{
            $data['user']=$user;
            //$data['posts']=Post::where('user_id',$user->id);
            return view('front.user-profile',$data);
        }

    }

    public function updateAccount(Request $request){

        $request->validate([
            'name'=>'min:3',
            'image'=>'image|mimes:png,jpg,jpeg|max:300',
            'username'=>'min:3',
            'phone'=>'min:10|max:10|string'
        ]);
        //dd($request->username);die;
        $user=User::findOrFail(Auth::user()->id);
        $user->name=$request->name;
        $user->user_name=$request->username;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->username_slug=Str::slug($request->username);

        if($request->hasFile('image')){
            $user->image_url=GetImageUrl($request->image, Str::slug($request->username));
        }

        $user->save();
        toastr()->success('Successfully Updated');

        return redirect()->route('user.profile',$user->user_name);

    }

    public function settings(){
        return view('back.profile-settings');
    }
}

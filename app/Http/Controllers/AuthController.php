<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
class AuthController extends Controller
{
    ////Register Frame
    public function indexReg(){
        return view('front.auth.register');
    }
    ////Login Frame
    public function indexLog(){
        return view('front.auth.login');
    }

     ////Login operation
    public function loginPost(Request $request){

        if(Auth::attempt(['username_slug'=>Str::slug($request->userid), 'password'=>$request->password]) || Auth::attempt(['email'=>$request->userid, 'password'=>$request->password])){
            toastr()->success('Welcome Back!\n','Success');
            return redirect()->route('index');
        }
        else{
            toastr()->warning('Check your E-mail or Password!\n','Warning');
            return redirect()->back();
        }

    }

    ///Register operation
    public function registerPost(Request $request){

        $isExist=false;
        if(User::where('username_slug',Str::slug($request->username))->first() || User::where('email',$request->email)->first())
            $isExist=true;
        if($isExist){
            return redirect()->back()->withErrors('Username or Email is already in use');
        }
        $user=new User;
        $user->name=$request->name;
        $user->username_slug=Str::slug($request->username);
        $user->user_name=$request->username;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->save();
        Auth::login($user);
        toastr()->success('Welcome to the club!\n','Success');
        return redirect()->route('index');
    }

    ///Log out
    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }
}

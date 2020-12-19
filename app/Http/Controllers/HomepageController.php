<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
class HomepageController extends Controller
{
    public function index(){
        $users=User::all();
        return view('front.index', compact('users'));
    }
    public function productPage(){
        return view('front.product');
    }


}

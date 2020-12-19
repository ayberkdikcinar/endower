<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\News;
class HomepageController extends Controller
{
    public function index(){
        $users=User::all();
        $news=News::orderBy('created_at','DESC')->get();
        return view('front.index', compact('users','news'));
    }
    public function productPage(){
        return view('front.product');
    }


}

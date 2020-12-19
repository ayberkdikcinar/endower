<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\News;
use App\Models\Donation;
class HomepageController extends Controller
{
    public function index(){
        $users=User::all();
        $news=News::orderBy('created_at','DESC')->get();
        $donations[0]=Donation::orderBy('created_at','DESC')->limit(5)->get();
        $donations[1]=Donation::orderBy('created_at','DESC')->limit(5)->get();
        return view('front.index', compact('users','news','donations'));
    }
    public function productPage(){
        return view('front.product');
    }


}

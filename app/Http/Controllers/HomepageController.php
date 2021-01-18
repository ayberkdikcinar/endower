<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\News;
use App\Models\Donation;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    public function index(){
        $users=User::all();
        $news=News::orderBy('created_at','DESC')->get();
        $donations[0]=Donation::orderBy('created_at','DESC')->limit(5)->get();
        $donations[1]=Donation::orderBy('amount','DESC')->limit(5)->get();
        $topUsers=User::orderBy('popularity','DESC')->limit(5)->get();
        return view('front.index', compact('users','news','donations','topUsers'));
    }
    public function productPage(){
        return view('front.product');
    }
    public function contact(){
        return view('front.contact');
    }
    public function aboutUs(){
        return view('front.about-us');
    }
    public function contactSend(Request $request){
        $validator = Validator::make($request->all(), [
            'email'=>'required|email',
            'message'=>'required|min:10',
            'name'=>'required',
            'phone'=>'required|min:10|max:10'
        ]);

        if($validator->fails())
           return redirect()->route('contact.page')->withErrors($validator)->withInput();


            $contact = new Contact;
            $contact->name=$request->name;
            $contact->email=$request->email;
            $contact->phone=$request->phone;
            $contact->message=$request->message;
            $contact->created_at=now();
            $contact->updated_at=now();
            $contact->save();

        return redirect()->route('contact.page')->with('success','Message has sent. Thank you !');

    }
    public function search(Request $req){
        $q = $req->input("q");

        // Search in these fields
        $search_fields = ["user_name","username_slug","description"];

        // Build query
        $query = DB::table('users');
        foreach($search_fields as $field) {
            $query = LikeBuilder($query, $field, $q);
        }

        $results = $query
                    // We write joins here instead of calling ->userAnalytics inside the view,
                    // so we can remove the additional query per result.
                    // If we call those getters inside view, an additional query will be performed for each result.
                    // Joins help us avoid that.
                    //  - FEA
                    ->join('user_analytics', 'users.id', '=', 'user_analytics.user_id')
                    ->orderBy('popularity', 'desc')
                    ->limit(100)
                    ->get();


        return view('front.search', compact('results', 'q'));
    }

}

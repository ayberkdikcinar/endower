<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SocialLinkController extends Controller
{
    public function create(Request $request){

        $user=Auth::user();

        $request->validate([
            'name'=>'min:3|max:100',
            'url'=>'max:256'
        ]);

        $name=$request->input('name');
        $url=$request->input('url');

        $user->addSocialLink($name, $url);

        return redirect("/profile/$user->username_slug?action=linkcreated&status=1");
    }
    // end create


    public function delete($linkId){
        $user=Auth::user();

        $socialLink=$user->SocialLinks->find($linkId);

        if($socialLink){
            $socialLink->destroy();

            // Success
            return redirect("/profile/$user->username_slug?action=linkdeleted&status=1");
        }
        else{
            // Fail
            return redirect("/profile/$user->username_slug?action=linkdeleted&status=0");
        }
    }

}

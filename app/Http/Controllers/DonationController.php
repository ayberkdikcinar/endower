<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Donator;
use App\Models\Donation;

class DonationController extends Controller
{
    
  public function donate(Request $request){

    // Donator data
    $name=$request->input('name');
    $email=$request->input('email');
    $phone=$request->input('phone');
    $card_name=$request->input('card_name');
    $card_no=$request->input('card_no');
    $card_ex_date=$request->input('card_ex_date');
    $card_cvc=$request->input('card_cvc');

    $donator=$this->createOrUpdateDonator($name, $email, $phone, $card_name, $card_no, $card_ex_date, $card_cvc);

    // Donation data
    $username=$request->input('username');
    $amount=$request->input('amount');
    $is_anonymous=$request->input('is_anonymous') == 1 ? 1 : 0;
    $comment=$request->input('comment');

    // TODO: Validate data

    $user = User::where('user_name', $username)->first();

    if(!$user){
      // TODO: Redirect with error
      return 'no_user';
    }

    $user->addDonation($donator, $amount, $is_anonymous, $comment);

    // TODO: Redirect success
    return 'success';
  }
  // end donate


  private function createOrUpdateDonator($name, $email, $phone, $card_name, $card_no, $card_ex_date, $card_cvc) {
    
    $donator = Donator::where('email', $email)->first();

    if(!$donator)
      $donator = new Donator;

    $donator->name=$name;
    $donator->email=$email;
    $donator->phone=$phone;
    $donator->card_name=$card_name;
    $donator->card_no=$card_no;
    $donator->card_ex_date=$card_ex_date;
    $donator->card_cvc=$card_cvc;

    $donator->save();

    return $donator;
  }
  // end createOrUpdateDonator

}

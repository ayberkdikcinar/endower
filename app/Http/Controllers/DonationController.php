<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Donator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\DonationReceive;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class DonationController extends Controller
{
    public function donate(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'comment' => 'required|min:1|max:200',
            'phone' => 'required|min:10|max:10',
            'amount' => 'required|min:1|max:6'
        ]);

        if ($validator->fails()) {
            toastr()->error('A problem has been occured', 'Error');
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $user = User::where('user_name', $request->segment(3))->first();

        $donation = new Donation();

        $name = $request->donatorname;
        $phone = $request->phone;
        $email = $request->email;
        $card_name = $request->cardname;
        $card_no = $request->cardnumber;
        $card_ex_date = $request->month . '/' . $request->year;
        $card_cvc = $request->cvc;


        $donator= $this->createOrUpdateDonator($name, $email, $phone, $card_name, $card_no, $card_ex_date, $card_cvc);
        $donation->user_id = $user->id;
        $donation->donator_id = $donator->id;
        $donation->amount = $request->amount;
        $donation->comment = $request->comment;

        $donation->save();

        $user->popularity += 1;

        $user->calculateAnalytics($donation->donator_id, $donation->amount);

        toastr()->success('Thanks for donation!', 'Success');

        $this->DonationNotification($donation);

        return redirect()->back();
    }

    public function createOrUpdateDonator($name, $email, $phone, $card_name, $card_no, $card_ex_date, $card_cvc) {

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
    public function DonationNotification(Donation $donation)
    {

        $when = Carbon::now()->addSeconds(10);
        $user = User::find($donation->user_id);
        $user->notify((new DonationReceive($donation))->delay($when));
    }
}

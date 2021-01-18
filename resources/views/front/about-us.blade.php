@extends('front.layouts.master')
@section('content')
<div class="contact">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="contact-info">
                    <h2>About US</h2>
                    <h3>
                        Endower aims to make the financial support process of needy people, donors or donors seeking donations as simple as possible,
                        without the involvement of banks, foundations or companies.Users registered with Endower can create posts, add social media links to their profiles and edit profiles when necessary, in order to seek financial support.<br><br>
                        Donors, on the other hand, can make donations to users registered in the system using their credit / debit cards, regardless of any registration requirement.
                        In the system, the highest donations and the last donations will be directly visible to every user, thus ensuring transparency and reliability.
                    </h3>

                    <div class="review-img">
                        <img src="{{asset('front/img/about.png')}}" alt="about us" style="padding-left: 9%;" />
                    </div>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</div>

@endsection

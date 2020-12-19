@extends('front.layouts.master')
@section('content')
@section('title','Endower -Homepage')

<!-- news card section starts from here -->
<section class="details-card">
    <div class="container">
        <h1>Last News</h1>
        <div class="row">
            @foreach ($news as $new)
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                        <img src="{{$new->image_url}}" alt="">
                    </div>
                    <div class="card-desc">
                        <h3>{{$new->title}}</h3>
                        <p>{{$new->content}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- news card section starts from here -->

            <!-- Last Donates Start -->
            <div class="review">
                <div class="container-fluid">
                    <h1>Last Donations</h1>
                    <div class="row align-items-center review-slider normal-slider">
                        @foreach ($users as $user)

                        <div class="col-md-6">
                            <div class="review-slider-item">
                                <div class="review-img">
                                    <img src="{{$user->image_url}}" width="100" height="100" alt="Image">
                                </div>
                                <div class="review-text">
                                    <h2>{{$user->name}}</h2>
                                    <h3>{{$user->email}}</h3>
                                    <p>
                                        {{$user->description}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Last Donates End -->
  <!-- Top Donates Start -->
  <div class="review">
    <div class="container-fluid">
        <h1>Top Donations</h1>
        <div class="row align-items-center review-slider normal-slider">
            @foreach ($users as $user)
            <div class="col-md-6">
                <div class="review-slider-item">
                    <div class="review-img">
                        <img src="{{$user->image_url}}" width="100" height="100" alt="Image">
                    </div>
                    <div class="review-text">
                        <h2>{{$user->name}}</h2>
                        <h3>{{$user->email}}</h3>
                        <p>
                            {{$user->description}}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Top Donates End -->
        <!-- Feature Start-->
        <div class="feature">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fab fa-cc-mastercard"></i>
                            <h2>Secure Payment</h2>
                            <p>
                                Lorem ipsum dolor sit amet consectetur elit
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-truck"></i>
                            <h2>Worldwide Delivery</h2>
                            <p>
                                Lorem ipsum dolor sit amet consectetur elit
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-sync-alt"></i>
                            <h2>90 Days Return</h2>
                            <p>
                                Lorem ipsum dolor sit amet consectetur elit
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-comments"></i>
                            <h2>24/7 Support</h2>
                            <p>
                                Lorem ipsum dolor sit amet consectetur elit
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature End-->


 @endsection

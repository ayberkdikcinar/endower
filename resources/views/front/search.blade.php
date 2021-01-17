@extends('front.layouts.master')
@section('content')
@section('title','Endower -Homepage')


<div class="review">
    <div class="container-fluid mb-5">
        <h1>Search Results</h1>
        @foreach ($results as $result)
        
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="review-slider-item">
                        <div class="review-img">
                            <a href="{{route('user.profile', $result->username_slug)}}">
                                <img src="{{asset($result->image_url)}}" width="100" alt="Image">
                            </a>
                        </div>
                        <div class="review-text">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{route('user.profile', $result->username_slug)}}">
                                        <h2>{{$result->user_name}}</h2>
                                    </a>
                                    
                                    <p class="small">{{$result->description}}</p>
                                </div>
                                <div class="col-md-6 text-center">
                                    <div class="badge">
                                        <h2>{{$result->donator_count}}</h2>
                                        <br>
                                        Donators
                                    </div>
                                    <div class="badge">
                                        <h2>{{$result->total_donation}}</h2>
                                        <br>
                                        Total Donations
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
</div>
    


 @endsection

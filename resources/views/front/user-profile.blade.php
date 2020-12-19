@extends('front.layouts.master')
@section('content')

  <!-- My Account Start -->
  <div class="my-account">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <img src="{{asset($user->image_url)}}" class="img-fluid img-thumbnail" width="423">
                <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="dashboard-nav" data-toggle="pill" href="#dashboard-tab" role="tab"><i class="fa fa-tachometer-alt"></i>Dashboard</a>
                    <a class="nav-link" id="payment-nav" data-toggle="pill" href="#payment-tab" role="tab"><i class="fa fa-credit-card"></i>Let's Donate</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">

                        @if ($user->posts->count()>0)

                        @foreach ($user->posts as $post)

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">{{$post->title}}</h6>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-4">
                                    <img src="{{$post->image_url}}" width="300">
                                    </div>
                                    <div class="col-md-4">
                                    {{$post->content}}
                                    </div>
                                </div>

                            </div>
                        </div>
                        @endforeach
                        @else
                         <h1>Kullanıcının postu yok!</h1>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">
                        <h4>Payment Method</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra dictum.
                            In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus. Nulla tristique viverra nisl,
                            sit amet bibendum ante suscipit non. Praesent in faucibus tellus, sed gravida lacus. Vivamus eu diam eros. Aliquam et
                            sapien eget arcu rhoncus scelerisque.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



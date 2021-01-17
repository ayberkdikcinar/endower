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
                <div class="col-md-12" style="background-color: rgb(213, 212, 224)">
                    <label style="color: rgb(34, 8, 129)">Social Links:</label>
                    <div class="contact-info">
                    @foreach ($user->socialLinks as $social)
                    <div class="social">
                    <a target="_blank" href="https:/{{$social->url}}"><i class="fab fa-{{$social->name}}"></i>&nbsp;&nbsp;&nbsp;{{$social->name}}</a>
                    </div>
                    @endforeach
                    </div>
                    <label></label>
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
                         <h1>Could not found any post!</h1>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">
                        <form action="{{route('donation',Request::segment(2))}}" class="form-style-9" method="POST">

                            @csrf
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                            @endif
                            @if ($errors->any())
                            <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            <ul> {{$error}}</ul>

                            @endforeach
                            </div>
                            @endif


                        <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-4">
                        <h4>Who is donating</h4>
                            <input type="text" class="form-control" placeholder="Full Name" name="donatorname" required>
                            <input type="email" class="form-control" placeholder="E-mail" name="email" required>
                            <input type="tel" class="form-control" placeholder="Phone" name="phone" required>
                            <textarea type="text" cols="40" rows="5" placeholder="Comment" name="comment"></textarea>
                            <h6>Amount</h6><input type="number" min="1" max="10000" class="form-control" placeholder="0" name="amount" required>

                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-6">
                        <h4>Payment Informations</h4>
                        <input type="text" class="form-control col-md-9" placeholder="Full Name   (exp: Lorem Ipsum)" name="cardname" required>
                        <input type="text" class="form-control col-md-9" placeholder="Card Number" name="cardnumber" minlength="16" maxlength="16" required>
                        <div class="row">
                        <div class="col-md-4">
                            <span class="expiration">
                                <input type="text" name="month" placeholder="MM" maxlength="2" size="2" required/>
                                <span>/</span>
                                <input type="text" name="year" placeholder="YY" maxlength="2" size="2" required/>
                            </span>

                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control col-md-6" placeholder="CVC" name="cvc" maxlength="3" required>
                        </div>
                        </div>
                    </div>
                    </div>

                    <input type="submit" class="btn2 btn-block btn-lg" value="Donate Now!" />
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>
@endsection



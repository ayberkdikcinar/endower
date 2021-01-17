

@extends('front.layouts.master')
@section('content')

  <!-- My Account Start -->
  <div class="my-account">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <img src="{{asset(Auth::user()->image_url)}}" class="img-fluid img-thumbnail" width="423">
                <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="dashboard-nav" data-toggle="pill" href="#dashboard-tab" role="tab"><i class="fa fa-tachometer-alt"></i>Dashboard</a>
                    <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Edit Posts</a>
                    <a class="nav-link" id="payment-nav" data-toggle="pill" href="#payment-tab" role="tab"><i class="fa fa-credit-card"></i>Analytics</a>
                    <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Account Details</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                        @foreach (Auth::user()->posts as $post)

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
                    </div>
                    <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">


                             <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Posts</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Manage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Auth::user()->posts as $post)
                                        <tr>
                                            <td>{{$post->id}}</td>
                                            <td><img src="{{$post->image_url}}" width="80"></td>
                                            <td>{{$post->title}}</td>
                                            <td>{{$post->content}}</td>
                                            <td>
                                                <a href="{{route('update.post',$post->id)}}" class="btn btn-sm btn-primary"><i clas="fa fa-edit">Edit</i></a>
                                                <a href="#" class="btn btn-sm btn-danger"><i clas="fa fa-edit">Delete</i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    </div>
                    <div class="tab-pane fade" id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">
                        <h4>Payment Method</h4>
                        <p>

                        </p>
                    </div>
                    <div class="tab-pane fade" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                        <h4>Address</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Payment Address</h5>
                                <p>123 Payment Street, Los Angeles, CA</p>
                                <p>Mobile: 012-345-6789</p>
                                <button class="btn">Edit Address</button>
                            </div>
                            <div class="col-md-6">
                                <h5>Shipping Address</h5>
                                <p>123 Shipping Street, Los Angeles, CA</p>
                                <p>Mobile: 012-345-6789</p>
                                <button class="btn">Edit Address</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">

                        <div class="row">
                            <div class="col-md-6">
                            <form action="{{route('update.account')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h4>Account Details</h4>
                                <input class="form-control" type="text" placeholder="Name" name="name" value="{{Auth::User()->name}}">
                                <input class="form-control" type="text" placeholder="User Name"  name="username" value="{{Auth::User()->user_name}}">
                                <input class="form-control" type="email" placeholder="Email"  name="email" value="{{Auth::User()->email}}">
                                <input class="form-control" type="tel" placeholder="Phone" name="phone">
                                <img src="{{asset(Auth::user()->image_url)}}" class="img-fluid img-thumbnail" width="250"/>
                                <input type="file" name="image" class="form-control">
                                <button class="btn btn-primary" type="submit">Update Account</button>
                                <br><br>
                            </form>
                            </div>
                            <div class="col-md-6">
                            <form action="{{route('update.account.socials')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h4>Social Links</h4>
                                <input class="form-control" type="text" placeholder="Facebook" name="facebook" value="">
                                <input class="form-control" type="text" placeholder="Twitter"  name="twitter" value="">
                                <input class="form-control" type="text" placeholder="LinkedIn"  name="linkedin" value="">
                                <input class="form-control" type="text" placeholder="Instagram"  name="instagram" value="">
                                <input class="form-control" type="text" placeholder="YouTube"  name="youtube" value="">
                                <button class="btn btn-primary" type="submit">Update Links</button>
                            </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- My Account End -->

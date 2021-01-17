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
                        <div class="card shadow mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Create a post</h6>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('createpost')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-5">
                                                    Title
                                                    <input type="text" name="title" class="form-control" required>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="col-md-1"></div>
                                                    Image
                                                    <input type="file" name="image" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    Content
                                                    <textarea name="content" rows="4" class="form-control" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-10"></div>
                                                <div class="col-md-1">
                                                    <button type="submit" name="image" class="btn btn-primary " required>Post</button>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @foreach (Auth::user()->posts->reverse() as $post)
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <div class="row">
                                    <div class="col-md-10">
                                        <h6 class="m-0 font-weight-bold text-primary">{{$post->title}}</h6>
                                    </div>
                                    <div class="col-md-2">
                                        <h6 class="m-0 font-weight-bold text-primary">{{$post->created_at->diffForHumans()}}</h6>
                                    </div>

                                </div>

                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{asset($post->image_url)}}" width="300">
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
                                                <td><img src="{{asset($post->image_url)}}" width="80"></td>
                                                <td>{{$post->title}}</td>
                                                <td>{{$post->content}}</td>
                                                <td>
                                                    <a href="#" post-id="{{$post->id}}" class="btn btn-sm btn-primary edit-click" data-toggle="modal" data-target="#exampleModal"><i clas="fa fa-edit ">Edit</i></a>
                                                    <a href="#" post-id="{{$post->id}}" class="btn btn-sm btn-danger"><i clas="fa fa-edit">Delete</i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- start  !-->

                    <div class="tab-pane fade" id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Analytics</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Top Donator</th>
                                                <th>Top Donation</th>
                                                <th>Total Donation</th>
                                                <th>Total Donators</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{Auth::user()->userAnalytics->topDonator()->name}}</td>
                                                <td>{{Auth::user()->userAnalytics->top_donation}}</td>
                                                <td>{{Auth::user()->userAnalytics->total_donation}}</td>
                                                <td>{{Auth::user()->userAnalytics->donator_count}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end  !-->
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
                                    <input class="form-control" type="text" placeholder="User Name" name="username" value="{{Auth::User()->user_name}}">
                                    <input class="form-control" type="email" placeholder="Email" name="email" value="{{Auth::User()->email}}">
                                    <input class="form-control" type="tel" placeholder="Phone" name="phone">
                                    <img src="{{asset(Auth::user()->image_url)}}" class="img-fluid img-thumbnail" width="250" />
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
                                    <input class="form-control" type="text" placeholder="Twitter" name="twitter" value="">
                                    <input class="form-control" type="text" placeholder="LinkedIn" name="linkedin" value="">
                                    <input class="form-control" type="text" placeholder="Instagram" name="instagram" value="">
                                    <input class="form-control" type="text" placeholder="YouTube" name="youtube" value="">
                                    <button class="btn btn-primary" type="submit">Update Links</button>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<!--
    <div class="modal fade" tabindex="-1" id="exampleModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

-->
<div class="modal fade" tabindex="-1" id="exampleModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('updatepost')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Category Name:</label>
                        <input id="postTitle" type="text" class="form-control" name="title" />

                        <input id="postId" type="hidden" class="form-control" name="id" />
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
-->


@endsection

<script>
    $(function() {
        $('.edit-click').click(function() {
            id = $(this)[0].getAttribute('post-id');
            console.log(id);
            $.ajax({
                type: 'get',
                url: '{{route('editpost')}}',
                data: {id:id},
                success: function(data) {
                    console.log(data);
                    $('#postTitle').val(data.title);
                    $('#postId').val(data.id);
                    $('#editModal').modal();
                }
            });
        });
    })
</script>


<!-- My Account End -->
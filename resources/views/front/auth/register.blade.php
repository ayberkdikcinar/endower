
@extends('front.layouts.master')
@section('content')

        <!-- Login Start -->
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="register-form">
                            <div class="row">
                                <div class="col-md-12">

                                    <form action="{{route('register')}}" method="POST">
                                        @csrf

                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                        <ul> {{$error}}</ul>

                                        @endforeach
                                    </div>
                                    @endif
                                    <label>Name</label>
                                    <input class="form-control" name="name" type="text" placeholder="Name" required>


                                    <label>User Name"</label>
                                    <input class="form-control" name="username" type="text" required placeholder="User Name" required>


                                    <label>E-mail</label>
                                    <input class="form-control" name="email" type="email" required placeholder="E-mail" required>


                                    <label>Phone Number</label>
                                    <input class="form-control" name="phone" type="text" placeholder="Phone">
                                    <label>Password</label>
                                    <input class="form-control" name="password" type="password" placeholder="Password" required>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">Register</button>
                                </form>
                                </div>




                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Login End -->
@endsection

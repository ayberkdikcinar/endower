<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>LogIn Form</title>
  <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Hind:300' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>


  <link rel="stylesheet" href="{{asset('front/')}}/css/login.css">

  @toastr_css

</head>

<body>
  <div id="login-button">
    <img src="http://dqcgrsy5v35b9.cloudfront.net/cruiseplanner/assets/img/icons/login-w-icon.png">
  </div>
  <div id="container">
    <h1>Log In</h1>
    <span class="close-btn">
      <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png">
    </span>

    <form action="{{route('login.auth')}}" method="POST">
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
      <input type="text" name="userid" placeholder="E-mail or Username">
      <input type="password" name="password" placeholder="Password">
      <button type="submit">Log In</button>
    </form>
    <a href="{{route('registerpage')}}">Register</a>
  </div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js'></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  <script src="{{asset('front/')}}/js/index.js"></script>

  @toastr_js
  @toastr_render
</body>

</html>
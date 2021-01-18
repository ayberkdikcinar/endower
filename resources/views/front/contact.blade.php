@extends('front.layouts.master')
@section('content')
<!-- Contact Start -->
<div class="contact">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-info">
                    <h2>Address</h2>
                    <h3><i class="fa fa-map-marker"></i>Kuruçeşme Mh. Deü Kaynaklar Yerleşkesi Pk:35370 Buca/izmir</h3>
                    <h3><i class="fa fa-envelope"></i>info@endower.com</h3>
                    <h3><i class="fa fa-phone"></i>+123-456-7890</h3>
                    <div class="social">
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-form">
                    <form action="{{route('contact.send')}}" method="POST">
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
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Your Name" name="name" value="{{old('name')}}"/>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" placeholder="Your Email" name="email" value="{{old('email')}}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="5551234567" name="phone" value="{{old('phone')}}"/>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" placeholder="Message" name="message" value="{{old('message')}}"></textarea>
                        </div>
                        <div><button class="btn" type="submit">Send Message</button></div>
                    </form>
                </div>
            </div>
            
            <div class="col-lg-12">
                <div class="contact-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3128.124921371879!2d27.207549315664053!3d38.36923148550725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b9618608d7c777%3A0x22aca51dc55ea9d1!2zRC5FLsOcIE3DvGhlbmRpc2xpayBGYWvDvGx0ZXNpIEJpbGdpc2F5YXIgTcO8aGVuZGlzbGnEn2kgQsO2bMO8bcO8!5e0!3m2!1str!2str!4v1610985103502!5m2!1str!2str" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
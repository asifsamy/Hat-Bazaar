@extends('frontEnd.master')

@section('title')
Contact Page
@endsection

@section('homeMenu')
<!-- products-breadcrumb -->
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ url('/') }}">Home</a><span>|</span></li>
            <li>Contact Us</li>
        </ul>
    </div>
</div>
<!-- //products-breadcrumb -->
@include('frontEnd.includes.sidebar')
@endsection

@section('body')
<div class="w3l_banner_nav_right">
    <!-- login -->
    <div class="w3_login">
        <h3>Contact Us</h3><br><br>
        <div class="w3_login_module">
            {!! Form::open(['url'=>'/fourZero/404', 'method'=>'POST']) !!}
            <div class="form-group">
                <input type="text" name="name" placeholder="Name" required class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="subject" placeholder="Subject" required class="form-control">
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required class="form-control">
            </div>
            <div class="form-group">
                <textarea placeholder="Message" name="message" required class="form-control"></textarea>
            </div>
            <input type="submit" name="c_btn" value="Submit" class="btn btn-success">
            {!! Form::close() !!}
        </div>
        <h4>GET IN TOUCH :</h4>
        <p>
            <i class="fa fa-map-marker"></i> Juhurul Islam City, Aftabnagar, Dhaka-1212.</p>
        <p>
            <i class="fa fa-phone"></i> Telephone : +88052178978</p>
        <p>
            <i class="fa fa-fax"></i> FAX : +1 888 888 4444</p>
        <p>
            <i class="fa fa-envelope-o"></i> Email :
<!--            <a href="mailto:example@mail.com">asifsamy@gmail.com</a>-->
            <a href="#">asifsamy@gmail.com</a>
        </p>
    </div>
    <!-- //login -->
</div>
<div class="clearfix"></div>
</div>
@endsection


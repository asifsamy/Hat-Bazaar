@extends('frontEnd.master')

@section('title')
404! Not Found
@endsection

@section('homeMenu')
<!-- products-breadcrumb -->
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ url('/') }}">Home</a><span>|</span></li>
            <li>404 Page</li>
        </ul>
    </div>
</div>
<!-- //products-breadcrumb -->
@endsection

@section('body')
<div class="w3l_banner_nav_right">
    <!-- login -->
    <div class="w3_login">
        <h1><span style="color: red; font-size: 72px;">404!</span><br> Not Found.</h1>
    </div>
    <!-- //login -->
</div>
<div class="clearfix"></div>
</div>
@endsection




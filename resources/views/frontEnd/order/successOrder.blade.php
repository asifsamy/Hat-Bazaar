@extends('frontEnd.master')

@section('title')
Order Success
@endsection

@section('homeMenu')

<!-- products-breadcrumb -->
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ url('/') }}">Home</a><span>|</span></li>
            <li>Order Success</li>
        </ul>
    </div>
</div>
<!-- //products-breadcrumb -->
@include('frontEnd.includes.sidebar')
@endsection

@section('body')
<div class="w3l_banner_nav_right">
    <!-- login -->
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="well lead text-center text-success"><b>Thank You.</b>You have successfully placed your Order.<br>Please Check Your <b>Email</b></div>
            </div>
            <?php
                    Cart::destroy();
//                    session()->forget('shippingId');
               ?>
        </div><br>
    </div>
    <!-- //login -->
</div>
<div class="clearfix"></div>
</div>
@endsection

@section('brands')
<!--@include('frontEnd.includes.popularBrands')-->
@endsection




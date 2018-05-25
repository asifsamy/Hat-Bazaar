@extends('frontEnd.master')

@section('title')
Branded Products
@endsection

@section('homeMenu')
<!-- products-breadcrumb -->
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ url('/') }}">Home</a><span>|</span></li>
            <li>Branded Products</li>
        </ul>
    </div>
</div>
<!-- //products-breadcrumb -->
@include('frontEnd.includes.sidebar')
@endsection

@section('body')
<div class="w3l_banner_nav_right">
    <div class="w3l_banner_nav_right_banner3">
        <h3>Best Deals For New Products<span class="blink_me"></span></h3>
    </div>
    <div class="w3l_banner_nav_right_banner3_btm">
        <div class="col-md-4 w3l_banner_nav_right_banner3_btml">
            <div class="view view-tenth">
                <img src="{{ asset('public/frontEnd/') }}/images/13.jpg" alt=" " class="img-responsive" />
                <div class="mask">
                    <h4>Grocery Store</h4>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
                </div>
            </div>
            <h4>Utensils</h4>
            <ol>
                <li>sunt in culpa qui officia</li>
                <li>commodo consequat</li>
                <li>sed do eiusmod tempor incididunt</li>
            </ol>
        </div>
        <div class="col-md-4 w3l_banner_nav_right_banner3_btml">
            <div class="view view-tenth">
                <img src="{{ asset('public/frontEnd/') }}/images/14.jpg" alt=" " class="img-responsive" />
                <div class="mask">
                    <h4>Grocery Store</h4>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
                </div>
            </div>
            <h4>Hair Care</h4>
            <ol>
                <li>enim ipsam voluptatem officia</li>
                <li>tempora incidunt ut labore et</li>
                <li>vel eum iure reprehenderit</li>
            </ol>
        </div>
        <div class="col-md-4 w3l_banner_nav_right_banner3_btml">
            <div class="view view-tenth">
                <img src="{{ asset('public/frontEnd/') }}/images/15.jpg" alt=" " class="img-responsive" />
                <div class="mask">
                    <h4>Grocery Store</h4>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
                </div>
            </div>
            <h4>Cookies</h4>
            <ol>
                <li>dolorem eum fugiat voluptas</li>
                <li>ut aliquid ex ea commodi</li>
                <li>magnam aliquam quaerat</li>
            </ol>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<div class="clearfix"></div>
	</div>
@endsection 

@section('brands')
@include('frontEnd.includes.popularBrands')
@endsection
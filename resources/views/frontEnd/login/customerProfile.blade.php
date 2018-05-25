@extends('frontEnd.master')

@section('title')
My Profile
@endsection

@section('homeMenu')

<!-- products-breadcrumb -->
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ url('/') }}">Home</a><span>|</span></li>
            <li>My Profile</li>
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
        <div class="well lead text-center text-success">{{ Session::get('message') }}</div>
        <h3>Profile</h3><br><br>
        <div class="w3_login_module">
            <table class="stripe">
                <tr>
                    <th>First Name</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <td>{{ $customer->firstName }}</td>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <td>{{ $customer->lastName }}</td>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th>Email Address</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <td>{{ $customer->emailAddress }}</td>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <td>{{ $customer->phoneNumber }}</td>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th>Address</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <td>{{ $customer->address }}</td>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th><a href="{{ url('/customer/edit-profile') }}" class="btn btn-info" role="button">Edit Profile</a></th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <td><a href="{{ url('/customer/change-password') }}" class="btn btn-info" role="button">Change Password</a></td>
                </tr>
            </table>
        </div>
    </div>
    <!-- //login -->
</div>
<div class="clearfix"></div>
</div>
@endsection

@section('brands')
<!--@include('frontEnd.includes.popularBrands')-->
@endsection




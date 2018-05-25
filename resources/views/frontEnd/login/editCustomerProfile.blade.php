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
            <li>Edit My Profile</li>
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
        <h3>Edit Profile</h3><br><br>
        <div class="w3_login_module">
            {!! Form::open(['url'=>'/customer/update-profile', 'method'=>'POST']) !!}
            <div class="form-group">
                <input type="text" name="firstName" value="{{ $customer->firstName }}" required class="form-control">
                <span class="text-danger">
                    {{ $errors->has('firstName') ? $errors->first('firstName') : '' }}
                </span>
            </div>
            <div class="form-group">
                <input type="text" name="lastName" value="{{ $customer->lastName }}" required class="form-control">
                <span class="text-danger">
                    {{ $errors->has('lastName') ? $errors->first('lastName') : '' }}
                </span> 
            </div>
            <div class="form-group">
                <input type="email" name="emailAddress" value="{{ $customer->emailAddress }}"  required class="form-control">
                <span class="text-danger">
                    {{ $errors->has('emailAddress') ? $errors->first('emailAddress') : '' }}
                </span>
                <span class="text-danger">
                    {{ Session::get('message') }}
                </span>
            </div>
            <div class="form-group">
                <input type="text" name="phoneNumber" value="{{ $customer->phoneNumber }}" required class="form-control">
                <span class="text-danger">
                    {{ $errors->has('phoneNumber') ? $errors->first('phoneNumber') : '' }}
                </span>
            </div>
            <div class="form-group">
                <textarea name="address" placeholder="Address" rows="3" cols="3" required class="form-control">{{ $customer->address }}</textarea>
                <span class="text-danger">
                    {{ $errors->has('address') ? $errors->first('address') : '' }}
                </span>
            </div>

            <input type="submit" name="c_btn" value="Update Info" class="btn btn-success">
            {!! Form::close() !!}
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






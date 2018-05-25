@extends('frontEnd.master')

@section('title')
Shipping
@endsection

@section('homeMenu')

<!-- products-breadcrumb -->
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ url('/') }}">Home</a><span>|</span></li>
            <li>Shipping</li>
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
                <div class="well lead text-center text-success">Hello <b>{{ $customerById->firstName }}</b>.  You have to give product shipping information to complete your valuable order.If you your product billing information and shipping information are same then just press on Save Shipping info Button</div>
            </div>
            <div class="col-lg-10">
                <div class="w3_login">
                    <h3>Shipping Information</h3>   
                </div>
            </div>
            <div class="col-lg-10">
              {!! Form::open(['url'=>'/checkout/save-shipping', 'method'=>'POST']) !!}
              <div class="form-group">
                <label>First Name</label>
                <input type="text" name="firstName" value="{{ $customerById->firstName }}" class="form-control" required="">
                <span class="text-danger">
                    {{ $errors->has('firstName') ? $errors->first('firstName') : '' }}
                </span>
              </div>
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="lastName" class="form-control" value="{{ $customerById->lastName }}" required="">
                <span class="text-danger">
                    {{ $errors->has('lastName') ? $errors->first('lastName') : '' }}
                </span>
              </div>
              <div class="form-group">
                <label>Email Address</label>
                <input type="text" name="emailAddress" value="{{ $customerById->emailAddress }}" class="form-control" required="">
                <span class="text-danger">
                    {{ $errors->has('emailAddress') ? $errors->first('emailAddress') : '' }}
                </span>
              </div>
              <div class="form-group">
                <label>Mobile Number</label>
                <input type="text" name="phoneNumber" value="{{ $customerById->phoneNumber }}" class="form-control" required="">
                <span class="text-danger">
                    {{ $errors->has('phoneNumber') ? $errors->first('phoneNumber') : '' }}
                </span>
              </div>
              <div class="form-group">
                <label>Address</label>
                <textarea name="address" class="form-control" rows="3" cols="3">{{ $customerById->lastName }}</textarea>
                <span class="text-danger">
                    {{ $errors->has('address') ? $errors->first('address') : '' }}
                </span>
              </div>
              <button type="submit" name="btn" class="btn btn-success">Save Shipping Info</button>
              {!! Form::close() !!}
            </div>
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



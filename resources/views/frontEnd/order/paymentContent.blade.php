@extends('frontEnd.master')

@section('title')
Payment Form
@endsection

@section('homeMenu')

<!-- products-breadcrumb -->
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ url('/') }}">Home</a><span>|</span></li>
            <li>Payment Form</li>
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
                <div class="well lead text-center text-success">You have to give product Payment information to complete your valuable order.</div>
            </div>
            <div class="col-lg-10">
                <div class="w3_login">
                    <h3>Payment Information</h3>   
                </div>
            </div>
            <div class="col-lg-10">
              {!! Form::open(['url'=>'/order/save-order', 'method'=>'POST']) !!}
              <div class="form-group">
                <label><input type="radio" name="paymentType" value="cashOnDelivery">Cash On Delivery</label>
              </div>
              <div class="form-group">
                <label><input type="radio" name="paymentType" value="bkash">Bkash</label>
              </div>
              <div class="form-group">
                <label><input type="radio" name="paymentType" value="debitCredit">Debit/Credit Cart</label>
              </div>
              <button type="submit" name="btn" class="btn btn-success">Submit</button>
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







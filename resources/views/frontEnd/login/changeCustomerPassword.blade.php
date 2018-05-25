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
        <div class="danger">{{ Session::get('message') }}</div>
        <div class="w3_login_module">
            {!! Form::open(['url'=>'/customer/update-password', 'name'=>'myForm', 'onsubmit'=>'return validateForm()', 'method'=>'POST']) !!}
            <div class="form-group">
                <input type="password" name="oldPassword" id="oldPassword" required placeholder="Enter Old Password" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" required placeholder="Enter New Password" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" name="password2" id="password2" required placeholder="Re-Enter New Password" class="form-control"> 
            </div>
            <input type="submit" name="c_btn" value="Change" class="btn btn-success">
            {!! Form::close() !!}
        </div>
    </div>
    <!-- //login -->
</div>
<div class="clearfix"></div>
</div>
@endsection

<script>
    function validateForm() {
    var password = document.forms["myForm"]["password"].value;
    var password2 = document.forms["myForm"]["password2"].value;
    if (password != password2) {
        alert("Password Mismatched");
        return false;
    }
}
</script>

@section('brands')
<!--@include('frontEnd.includes.popularBrands')-->
@endsection








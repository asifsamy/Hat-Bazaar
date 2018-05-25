@extends('frontEnd.master')

@section('title')
Checkout
@endsection

@section('homeMenu')

<!-- products-breadcrumb -->
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ url('/') }}">Home</a><span>|</span></li>
            <li>Checkout</li>
        </ul>
    </div>
</div>
<!-- //products-breadcrumb -->
@include('frontEnd.includes.sidebar')
@endsection

@section('body')
<script>
    var xmlhttp = false;
    try{
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch(e){
        try{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch(E){
            xmlhttp = false;
        }
    }
    if(!xmhttp && typeof XMLHttpRequest != 'undefined'){
        xmlhttp = new XMLHttpRequest();
    }
    function makerequest(emailAddress,objID)
    {
        serverPage='ajax-email-check/'+emailAddress;
                xmlhttp.open("GET",serverPage);
                xmlhttp.onreadystatechange = function()
                {
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById(objID).innerHTML = xmlhttp.responseText;
                        if(xmlhttp.responseText == 'Already Exists!') 
                        {
                            document.getElementById('c_btn').disabled=true;
                        }
                        if(xmlhttp.responseText == 'Available')   
                        {
                            document.getElementById('c_btn').disabled=true;
                        }
                    }
                }
                xmlhttp.send(null);
    }
</script>
<div class="w3l_banner_nav_right">
    <!-- login -->
    <div class="w3_login">
        <h3>Sign In & Sign Up</h3>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="well lead text-center text-success">You have to login to complete your valuable order.If you are not registered then register first</div>
                </div>
            </div>
        </div>
        <div class="w3_login_module">
            <div class="module form-module">
                <div class="toggle"><i class="fa fa-times fa-pencil"></i>
                    <div class="tooltip">Click Me</div>
                </div>
                <div class="form">
                    <h2>Login to your account</h2>
                    {!! Form::open(['url'=>'/checkout/login', 'method'=>'POST']) !!}
                        <input type="email" name="emailAddress" placeholder="Email Address" required=" ">
                        <span class="text-danger">
                            {{ $errors->has('emailAddress') ? $errors->first('emailAddress') : '' }}
                        </span>
                        <input type="password" name="password" placeholder="Password" required=" ">
                        <span class="text-danger">
                            {{ $errors->has('password') ? $errors->first('password') : '' }}
                        </span>
                        <span class="text-danger">
                            {{ Session::get('message') }}
                        </span>
                        <input type="submit" value="Login">
                    {!! Form::close() !!}
                </div>
                <div class="form">
                    <h2>Create an account</h2>
                    {!! Form::open(['url'=>'/checkout/sign-up', 'method'=>'POST']) !!}
                        <input type="text" name="firstName" placeholder="First Name" required=" ">
                        <span class="text-danger">
                            {{ $errors->has('firstName') ? $errors->first('firstName') : '' }}
                        </span>
                        <input type="text" name="lastName" placeholder="Last Name" required=" ">
                        <span class="text-danger">
                            {{ $errors->has('lastName') ? $errors->first('lastName') : '' }}
                        </span>
                        <input type="email" name="emailAddress" id="emailAddress" onblur="makerequest(this.value,'res')" placeholder="Email Address" required=" ">
                        <span id="res" style="color: red"></span>
                        <span class="text-danger">
                            {{ $errors->has('emailAddress') ? $errors->first('emailAddress') : '' }}
                        </span>
                        <span class="text-danger">
                            {{ Session::get('message') }}
                        </span>
                        <input type="password" name="password" placeholder="Password" required=" ">
                        <span class="text-danger">
                            {{ $errors->has('password') ? $errors->first('password') : '' }}
                        </span>
                        <input type="text" name="phoneNumber" placeholder="Mobile Number" required=" ">
                        <span class="text-danger">
                            {{ $errors->has('phoneNumber') ? $errors->first('phoneNumber') : '' }}
                        </span>
                        <textarea name="address" placeholder="Address" rows="3" cols="3" required=" "></textarea>
                        <span class="text-danger">
                            {{ $errors->has('address') ? $errors->first('address') : '' }}
                        </span>
                        <input type="submit" name="c_btn" id="c_btn" value="Register">
                    {!! Form::close() !!}
                </div>
                <div class="cta"><a href="#">Forgot your password?</a></div>
            </div>
        </div>
        <script>
            $('.toggle').click(function () {
                // Switches the Icon
                $(this).children('i').toggleClass('fa-pencil');
                // Switches the forms  
                $('.form').animate({
                    height: "toggle",
                    'padding-top': 'toggle',
                    'padding-bottom': 'toggle',
                    opacity: "toggle"
                }, "slow");
            });
        </script>
    </div>
    <!-- //login -->
</div>
<div class="clearfix"></div>
</div>
@endsection

@section('brands')
<!--@include('frontEnd.includes.popularBrands')-->
@endsection

@extends('frontEnd.master')

@section('title')
Your Cart
@endsection

@section('homeMenu')
<!-- script for ajax based update cart-->
<script>
    $(document).ready(function(){
        $("#CartMsg").hide();
        @foreach($cartData as $cartProduct)
        $("#upCart{{$cartProduct->id}}").on('change keyup', function(){
            var newQty = $("#upCart{{$cartProduct->id}}").val();
            var rowId = $("#rowId{{$cartProduct->id}}").val();
            $.ajax({
                url:'{{url('/cart/update')}}',
                data:'rowId=' + rowId + '&newQty=' + newQty,
                type:'get',
                success:function(response){
                    $("#CartMsg").show();
                    console.log(response);
                    $("#CartMsg").html(response);
                }
            });
        });
        @endforeach
    });
</script>
<!-- products-breadcrumb -->
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ url('/') }}">Home</a><span>|</span></li>
            <li>Cart Details</li>
        </ul>
    </div>
</div>
<!-- //products-breadcrumb -->
@include('frontEnd.includes.sidebar')
@endsection

@section('body')
<div class="w3l_banner_nav_right">
    <!-- about -->
    <div class="privacy about">
        <h3>Sho<span>pping Bas</span>ket</h3>
        @if(Cart::count() != "0")
        <div class="checkout-right">
            <h4>Your shopping Basket contains: <span>{{ Cart::count() }} Products</span></h4>
            <table class="timetable_sub">
                <thead>
                    <tr>
                        <th>SL No.</th>	
                        <th>Product</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Sub Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach($cartData as $cartProduct)
                    <tr class="rem1">
                        <td class="invert">{{ $i++ }}</td>
                        <td><a href="single.html"><img src="{{ asset($cartProduct->options->img) }}" alt=" "  width="100px" height="100px" class="img-responsive"></a></td>
                        <td class="invert">{{ $cartProduct->name.' '.$cartProduct->options->pdQty.' '.$cartProduct->options->perimeter }}</td>
                        <td class="invert">{{ $cartProduct->price.' Tk.' }}</td>
                        <td class="invert">
                            <div class="quantity">
                                <div class="quantity-select">                           
<!--                                    <div class="entry value-minus">&nbsp;</div>-->
<!--                                    <div class="entry value"><span>{{ $cartProduct->qty }}</span></div>-->
                                    <input type="hidden"  id="rowId{{$cartProduct->id}}" value="{{$cartProduct->rowId}}">
                                    <input type="number" id="upCart{{$cartProduct->id}}" value="{{$cartProduct->qty}}" max="10" min="1" class="entry value">
<!--                                    <div class="entry value-plus active">&nbsp;</div>-->
                                </div>
                            </div>
                        </td>
                        <td class="invert">{{ $cartProduct->price*$cartProduct->qty.' Tk.' }}</td>
                        <td class="invert">
                            <div class="rem">
                                <a class="close1" href="{{ url('/cart/remove/'.$cartProduct->rowId) }}"> </a>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="alert alert-success" id="CartMsg"></div>
        <div class="checkout-left">	
            <div class="col-md-4 checkout-left-basket">
                <h4>Total Calculation</h4>
                <ul>
                    <?php
                             $subtotal = str_replace(",", "", Cart::subtotal());
                             $vat = $subtotal * 0.15; 
                             $total = $vat + $subtotal;
                         ?>
                    <li>Total <i>-</i> <span>{{ $subtotal.' Tk.' }} </span></li>
                    <li>Tax(15%) <i>-</i> <span>{{ $vat.' Tk.' }}</span></li>
                    <li>Grand Total <i>-</i> <span>{{ $total.' Tk.' }}</span></li>
                </ul>
            </div>
            <div class="col-md-4 address_form_agile">
                <div class="checkout-right-basket">
                    <a href="{{ url('/checkout') }}">Checkout From Cart <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
                </div>
            </div>
            <div class="col-md-4 address_form_agile">
                <div class="checkout-right-basket">
                    <a href="{{ url('/') }}"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Back To Shopping</a>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        @else
        <h1>Cart is Empty!</h1>
        @endif
    </div>
    <!-- //about -->
</div>
<div class="clearfix"></div>
</div>
@endsection

@section('brands')
<!--@include('frontEnd.includes.popularBrands')-->
@endsection
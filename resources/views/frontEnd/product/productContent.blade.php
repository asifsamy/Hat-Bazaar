@extends('frontEnd.master')

@section('title')
Product Details
@endsection

@section('homeMenu')
<!-- products-breadcrumb -->
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ url('/') }}">Home</a><span>|</span></li>
            <li>Product Details</li>
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
        <div class="agileinfo_single">
            <h5>{{ $productById->productName.' '. $productById->productQuantity.' '. $productById->productPerimeter }}</h5>
            <div class="col-md-4 agileinfo_single_left">
                <img id="example" src="{{ asset($productById->productImage) }}" alt=" " class="img-responsive" />
            </div>
            <div class="col-md-8 agileinfo_single_right">
                <div class="rating1">
                    <span class="starRating">
                        <input id="rating5" type="radio" name="rating" value="5">
                        <label for="rating5">5</label>
                        <input id="rating4" type="radio" name="rating" value="4">
                        <label for="rating4">4</label>
                        <input id="rating3" type="radio" name="rating" value="3" checked>
                        <label for="rating3">3</label>
                        <input id="rating2" type="radio" name="rating" value="2">
                        <label for="rating2">2</label>
                        <input id="rating1" type="radio" name="rating" value="1">
                        <label for="rating1">1</label>
                    </span>
                </div>
                <div class="w3agile_description">
                    <h4>Description :</h4>
                    <p>{!! $productById->productDescription !!}</p>
                </div>
                <div class="snipcart-item block">
                    <div class="snipcart-thumb agileinfo_single_right_snipcart">
                        <?php
                                   if($productById->discountFlag == 1){
                                        $discountAmount = $productById->productPrice * ($productById->productDiscount / 100);
                                        $newProductPrice = $productById->productPrice - $discountAmount;
                              ?>
                        <h4>{{ $newProductPrice.' Tk' }}<span>{{ $productById->productPrice.' Tk' }}</span></h4>
                        <?php } else { ?>
                        <h4>{{ $productById->productPrice.' Tk' }}</h4>
                        <?php } ?>
                    </div>
                    <div class="snipcart-details agileinfo_single_right_details">
<!--                        {!! Form::open(['url'=>'/cart/add/'.$productById->id, 'method'=>'POST']) !!}
                            <fieldset>
                                <input type="hidden" name="cmd" value="_cart" />
                                <input type="hidden" name="add" value="1" />
                                <input type="hidden" name="business" value=" " />
                                <input type="hidden" name="item_name" value="pulao basmati rice" />
                                <input type="hidden" name="amount" value="21.00" />
                                <input type="hidden" name="discount_amount" value="1.00" />
                                <input type="hidden" name="currency_code" value="USD" />
                                <input type="hidden" name="return" value=" " />
                                <input type="hidden" name="cancel_return" value=" " />
                                Quantity: <input type="number" name="or_qty" value="1" min="1" max="10" /><br><br>
                                <input type="submit" name="submit" value="Add to cart" class="button" />
                            </fieldset>
                        {!! Form::close() !!}-->
                        <a href="{{ url('/cart/add/'.$productById->id) }}" class="btn btn-danger btn-block">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
@endsection

@section('brands')
<!--@include('frontEnd.includes.popularBrands')-->
@endsection
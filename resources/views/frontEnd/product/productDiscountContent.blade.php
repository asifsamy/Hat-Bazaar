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
            <li>Today's Offer</li>
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
    <div class="w3ls_w3l_banner_nav_right_grid">
        <h3></h3>
        <div class="w3ls_w3l_banner_nav_right_grid1">
            @foreach($products as $product)
            <div class="col-md-3 w3ls_w3l_banner_left">
                <div class="hover14 column">
                    <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                        <div class="agile_top_brand_left_grid_pos">
<!--                            <img src="images/offer.png" alt=" " class="img-responsive" />-->
                        </div>
                        <div class="agile_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block">
                                    <div class="snipcart-thumb">
                                        <a href="{{ url('/product-details/'.$product->id) }}"><img src="{{ asset($product->productImage) }}" height="150px" width="200px" alt=" " /></a>
                                        <div style="text-align: center">
                                            <p>{{ $product->productName }}</p>
                                            <?php
                                                            $discountAmount = $product->productPrice * ($product->productDiscount / 100);
                                                            $newProductPrice = $product->productPrice - $discountAmount;
                                                       ?>
                                            <p>{{ $product->productQuantity.' '.$product->productPerimeter}}</p>
                                            <h4>{{ $newProductPrice.' Tk' }}<span>{{ $product->productPrice.' Tk' }}<span></h4>
                                        </div>
                                    </div>
                                    <div class="snipcart-details">
<!--                                        <form action="#" method="post">
                                            <fieldset>
                                                <input type="hidden" name="cmd" value="_cart" />
                                                <input type="hidden" name="add" value="1" />
                                                <input type="hidden" name="business" value=" " />
                                                <input type="hidden" name="item_name" value="knorr instant soup" />
                                                <input type="hidden" name="amount" value="3.00" />
                                                <input type="hidden" name="discount_amount" value="1.00" />
                                                <input type="hidden" name="currency_code" value="USD" />
                                                <input type="hidden" name="return" value=" " />
                                                <input type="hidden" name="cancel_return" value=" " />
                                                <input type="submit" name="submit" value="Add to cart" class="button" />
                                            </fieldset>
                                        </form>-->
                                        <a href="{{ url('/cart/add/'.$product->id) }}" class="btn btn-danger btn-block">Add to Cart</a>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="clearfix"> </div>
        </div>   
    </div>
</div>
<div class="clearfix"></div>
</div>
@endsection




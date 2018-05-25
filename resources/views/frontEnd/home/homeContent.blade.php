@extends('frontEnd.master')

@section('title')
  Grocery Store
@endsection   

@section('sidebar')
  @include('frontEnd.includes.sidebarSliderBanner')
@endsection


@section('body')
<div class="banner_bottom">
    <div class="wthree_banner_bottom_left_grid_sub">
    </div>
    <div class="wthree_banner_bottom_left_grid_sub1">
        <div class="col-md-4 wthree_banner_bottom_left">
            <div class="wthree_banner_bottom_left_grid">
                <img src="{{ asset('public/frontEnd/') }}/images/4.jpg" alt=" " class="img-responsive" />
                <div class="wthree_banner_bottom_left_grid_pos">
                    <h4>Discount Offer <span>25%</span></h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 wthree_banner_bottom_left">
            <div class="wthree_banner_bottom_left_grid">
                <img src="{{ asset('public/frontEnd/') }}/images/5.jpg" alt=" " class="img-responsive" />
                <div class="wthree_banner_btm_pos">
                    <h3>introducing <span>best store</span> for <i>groceries</i></h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 wthree_banner_bottom_left">
            <div class="wthree_banner_bottom_left_grid">
                <img src="{{ asset('public/frontEnd/') }}/images/6.jpg" alt=" " class="img-responsive" />
                <div class="wthree_banner_btm_pos1">
                    <h3>Save <span>Upto</span> 10%</h3>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="clearfix"> </div>
</div>
<!-- top-brands -->
<div class="top-brands">
    <div class="container">
        <h3>All Groceries</h3>
        <div class="agile_top_brands_grids">
            @foreach($publishedProducts as $publishedProduct)
            <div class="col-md-3 top_brand_left">
                <div class="hover14 column">
                    <div class="agile_top_brand_left_grid">
<!--                        <div class="tag"><img src="{{ asset('public/frontEnd/') }}/images/tag.png" alt=" " class="img-responsive" /></div>-->
                        <div class="agile_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block" >
                                    <div class="snipcart-thumb">
                                        <a href="{{ url('/product-details/'.$publishedProduct->id) }}"><img title=" " alt=" " src="{{ asset($publishedProduct->productImage) }}" height="150" width="200" /></a>		
                                        <div style="text-align: center">
                                            <p>{{ $publishedProduct->productName }}</p>
<!--                                        <h4>$3.00 <span>$5.00</span></h4>-->
                                            <p>{{ $publishedProduct->productQuantity.' '.$publishedProduct->productPerimeter}}</p>
                                            <?php
                                                            if($publishedProduct->discountFlag == 1){
                                                                $discountAmount = $publishedProduct->productPrice * ($publishedProduct->productDiscount / 100);
                                                                $newProductPrice = $publishedProduct->productPrice - $discountAmount;
                                                       ?>
                                            <h4>{{ $newProductPrice.' Tk' }}<span>{{ $publishedProduct->productPrice.' Tk' }}</span></h4>
                                            <?php } else { ?>
                                            <h4>{{ $publishedProduct->productPrice.' Tk' }}</h4>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details">
<!--                                        <form action="checkout.html" method="post">
                                            <fieldset>
                                                <input type="hidden" name="cmd" value="_cart" />
                                                <input type="hidden" name="add" value="1" />
                                                <input type="hidden" name="business" value=" " />
                                                <input type="hidden" name="item_name" value="Fortune Sunflower Oil" />
                                                <input type="hidden" name="amount" value="7.99" />
                                                <input type="hidden" name="discount_amount" value="1.00" />
                                                <input type="hidden" name="currency_code" value="USD" />
                                                <input type="hidden" name="return" value=" " />
                                                <input type="hidden" name="cancel_return" value=" " />
                                                <input type="submit" name="submit" value="Add to cart" class="button" />
                                            </fieldset>

                                        </form>-->
                                        <a href="{{ url('/cart/add/'.$publishedProduct->id) }}" class="btn btn-danger btn-block">Add to Cart</a>

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

@endsection
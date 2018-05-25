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
            <li>{{ $subCategory->subCategoryName }}</li>
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
    <div class="w3l_banner_nav_right_banner3_btm">
        <div class="col-md-4 w3l_banner_nav_right_banner3_btml">
            <div class="view view-tenth">
                <img src="{{ asset('public/frontEnd/') }}/images/13.jpg" alt=" " class="img-responsive" />
                <div class="mask">
                    <h4>Grocery Store</h4>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
                </div>
            </div>
            <h4>Utensils</h4>
            <ol>
                <li>sunt in culpa qui officia</li>
                <li>commodo consequat</li>
                <li>sed do eiusmod tempor incididunt</li>
            </ol>
        </div>
        <div class="col-md-4 w3l_banner_nav_right_banner3_btml">
            <div class="view view-tenth">
                <img src="{{ asset('public/frontEnd/') }}/images/14.jpg" alt=" " class="img-responsive" />
                <div class="mask">
                    <h4>Grocery Store</h4>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
                </div>
            </div>
            <h4>Hair Care</h4>
            <ol>
                <li>enim ipsam voluptatem officia</li>
                <li>tempora incidunt ut labore et</li>
                <li>vel eum iure reprehenderit</li>
            </ol>
        </div>
        <div class="col-md-4 w3l_banner_nav_right_banner3_btml">
            <div class="view view-tenth">
                <img src="{{ asset('public/frontEnd/') }}/images/15.jpg" alt=" " class="img-responsive" />
                <div class="mask">
                    <h4>Grocery Store</h4>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
                </div>
            </div>
            <h4>Cookies</h4>
            <ol>
                <li>dolorem eum fugiat voluptas</li>
                <li>ut aliquid ex ea commodi</li>
                <li>magnam aliquam quaerat</li>
            </ol>
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="w3ls_w3l_banner_nav_right_grid">
        <h3>{{ $subCategory->subCategoryName }}</h3>
        <div class="w3ls_w3l_banner_nav_right_grid1">
            @foreach($publishedSubCategoryProducts as $publishedSubCategoryProduct)
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
                                        <a href="{{ url('/product-details/'.$publishedSubCategoryProduct->id) }}"><img src="{{ asset($publishedSubCategoryProduct->productImage) }}" height="150px" width="200px" alt=" " /></a>
                                        <div style="text-align: center">
                                            <p>{{ $publishedSubCategoryProduct->productName }}</p>
                                            <p>{{ $publishedSubCategoryProduct->productQuantity.' '.$publishedSubCategoryProduct->productPerimeter}}</p>
                                            <?php
                                                            $discountAmount = 0; $newProductPrice = 0;
                                                            if($publishedSubCategoryProduct->discountFlag == 1){
                                                                $discountAmount = $publishedSubCategoryProduct->productPrice * ($publishedSubCategoryProduct->productDiscount / 100);
                                                                $newProductPrice = $publishedSubCategoryProduct->productPrice - $discountAmount;
                                                       ?>
                                            <h4>{{ $newProductPrice.' Tk' }}<span>{{ $publishedSubCategoryProduct->productPrice.' Tk' }}</span></h4>
                                            <?php } else {  ?>
                                            <h4>{{ $publishedSubCategoryProduct->productPrice.' Tk' }}</h4>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="snipcart-details">
<!--                                        <form action="#" method="post">
                                            <fieldset>
                                                <input type="hidden" name="cmd" value="_cart" />
                                                <input type="hidden" name="add" value="1" />
                                                <input type="hidden" name="business" value=" " />
                                                <input type="hidden" name="item_name" value="{{ $publishedSubCategoryProduct->productName }}" />
                                                <input type="hidden" name="amount" value="{{ $publishedSubCategoryProduct->productPrice }}" />
                                                <input type="hidden" name="discount_amount" value="{{ $discountAmount }}" />
                                                <input type="hidden" name="currency_code" value="USD" />
                                                <input type="hidden" name="return" value=" " />
                                                <input type="hidden" name="cancel_return" value=" " />
                                                <input type="submit" name="submit" value="Add to cart" class="button" />
                                            </fieldset>
                                        </form>-->
                                        <a href="{{ url('/cart/add/'.$publishedSubCategoryProduct->id) }}" class="btn btn-danger btn-block">Add to Cart</a>
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




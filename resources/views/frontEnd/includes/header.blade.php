<div class="agileits_header">
    <div class="w3l_offers">
        <a href="{{ url('/product/discount-offer') }}">Today's special Offers !</a>
    </div>
    <div class="w3l_search">
        <form action="{{ url('search') }}">
            <input type="text" name="searchData" value="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {
                        this.value = 'Search a product...';
                    }" required="">
            <input type="submit" value=" ">
        </form>
    </div>
<!--    <div class="product_list_header">  
        <form action="#" method="post" class="last">
            <fieldset>
                <input type="hidden" name="cmd" value="_cart" />
                <input type="hidden" name="display" value="1" />
                <input type="submit" name="submit" value="View your cart" class="button" />
            </fieldset>
        </form>
    </div>-->
    <div class="w3l_header_right1">
        <ul style="list-style-type:none">
            <li class="dropdown profile_details_drop">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
                <div class="mega-dropdown-menu">
                    <div class="w3ls_vegetables">
                        <ul class="dropdown-menu drp-mnu">
                            <?php
                                        $customerId = Session::get('customerId');
                                        //$customerName = Session::get('customerName');
                                        if($customerId != NULL) {
                                            $customer = DB::table('customers')
                                                             ->where('id', $customerId)
                                                             ->first();
                                   ?>
                            <li><a href="{{ url('/customer/profile') }}">{{ 'Hello '.$customer->lastName }}</a></li>
                            <li><a href="{{ url('/customer/logout') }}">Logout</a></li>
                            <?php } else { ?>         
                            <li><a href="{{ url('/customer/login') }}">Login</a></li> 
                            <li><a href="{{ url('/customer/login') }}">Sign Up</a></li>
                            <?php } ?>
                        </ul>
                    </div>                  
                </div>	
            </li>
        </ul>
    </div>
    <div class="w3l_header_right1">
        <h2><a href="{{ url('/cart') }}"><i class="fa fa-shopping-cart"> [{{ Cart::count() }}] Itemes in your cart</i></a></h2>
    </div>
    <div class="clearfix"> </div>
</div>
<!-- script-for sticky-nav -->
<script>
    $(document).ready(function () {
        var navoffeset = $(".agileits_header").offset().top;
        $(window).scroll(function () {
            var scrollpos = $(window).scrollTop();
            if (scrollpos >= navoffeset) {
                $(".agileits_header").addClass("fixed");
            } else {
                $(".agileits_header").removeClass("fixed");
            }
        });

    });
</script>
<!-- //script-for sticky-nav -->
<div class="logo_products">
    <div class="container">
        <div class="w3ls_logo_products_left">
            <h1><a href="{{ url('/') }}"><span>Hat </span> Bazaar</a></h1>
        </div>
        <div class="w3ls_logo_products_left1">
            <ul class="special_items">
                <li><a href="{{ url('/events') }}">Events</a><i>/</i></li>
                <li><a href="{{ url('/about') }}">About Us</a><i>/</i></li>
                <li><a href="{{ url('/contact') }}">Contact Us</a><i>/</i></li>
                <li><a href="{{ url('/services') }}">Services</a></li>
            </ul>
        </div>
        <div class="w3ls_logo_products_left1">
            <ul class="phone_email">
                <li><i class="fa fa-phone" aria-hidden="true"></i>(+880) 1737 887516</li>
                <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocery.com">hatbazaar@gmail.com</a></li>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
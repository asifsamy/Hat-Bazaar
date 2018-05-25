<div class="banner">
    <div class="w3l_banner_nav_left">
        <nav class="navbar nav_bottom">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header nav_2">
                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div> 
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul class="nav navbar-nav nav_1">
                   @foreach($publishedCategories as $publishedCategory)
                    <li class="dropdown mega-dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $publishedCategory->categoryName }}<span class="caret"></span></a>				
                        <div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
                            <div class="w3ls_vegetables">
                                <ul>
                                    <?php 
                                                  $publishedSubCategories = DB::table('sub_categories')
                                                             ->where('categoryId', $publishedCategory->id)
                                                             ->get();
                                                  if($publishedSubCategories){
                                             ?>
                                    @foreach($publishedSubCategories as $publishedSubCategory) <!--  from app.Providers.AppServiceProvider-->
                                    <li><a href="{{ url('/sub-category/front/'.$publishedSubCategory->id) }}">{{ $publishedSubCategory->subCategoryName }}</a></li>
                                    @endforeach
                                    <?php } ?>
                                </ul>
                            </div>                  
                        </div>				
                    </li>
                    @endforeach   
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>
    <div class="w3l_banner_nav_right">
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <div class="w3l_banner_nav_right_banner">
                            <h3>Make your <span>food</span> with Spicy.</h3>
                            <div class="more">
                                <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w3l_banner_nav_right_banner1">
                            <h3>Make your <span>food</span> with Spicy.</h3>
                            <div class="more">
                                <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w3l_banner_nav_right_banner2">
                            <h3>upto <i>50%</i> off.</h3>
                            <div class="more">
                                <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- flexSlider -->
        <link rel="stylesheet" href="{{ asset('public/frontEnd/') }}/css/flexslider.css" type="text/css" media="screen" property="" />
        <script defer src="{{ asset('public/frontEnd/') }}/js/jquery.flexslider.js"></script>
        <script type="text/javascript">
$(window).load(function () {
    $('.flexslider').flexslider({
        animation: "slide",
        start: function (slider) {
            $('body').removeClass('loading');
        }
    });
});
        </script>
        <!-- //flexSlider -->
    </div>
    <div class="clearfix"></div>
</div>

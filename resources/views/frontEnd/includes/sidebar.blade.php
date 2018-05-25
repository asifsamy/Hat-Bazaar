
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
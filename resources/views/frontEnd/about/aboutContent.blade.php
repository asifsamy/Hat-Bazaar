@extends('frontEnd.master')

@section('title')
About Us
@endsection

@section('homeMenu')
<!-- products-breadcrumb -->
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ url('/') }}">Home</a><span>|</span></li>
            <li>About Us</li>
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
            <h3>About Us</h3>
            <p class="animi">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis 
                praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias 
                excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui 
                officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem 
                rerum facilis est et expedita distinctio.</p>
            <div class="agile_about_grids">
                <div class="col-md-6 agile_about_grid_right">
                    <img src="{{ asset('public/frontEnd/') }}/images/31.jpg" alt=" " class="img-responsive" />
                </div>
                <div class="col-md-6 agile_about_grid_left">
                    <ol>
                        <li>laborum et dolorum fuga</li>
                        <li>corrupti quos dolores et quas</li>
                        <li>est et expedita distinctio</li>
                        <li>deleniti atque corrupti quos</li>
                        <li>excepturi sint occaecati cupiditate</li>
                        <li>accusamus et iusto odio</li>
                    </ol>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!-- //about -->
    </div>
    <div class="clearfix"></div>
</div>
@endsection
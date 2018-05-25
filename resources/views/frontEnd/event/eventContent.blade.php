@extends('frontEnd.master')

@section('title')
Events Page
@endsection

@section('homeMenu')
<!-- products-breadcrumb -->
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ url('/') }}">Home</a><span>|</span></li>
            <li>Events</li>
        </ul>
    </div>
</div>
<!-- //products-breadcrumb -->
@include('frontEnd.includes.sidebar')
@endsection

@section('body')
<div class="w3l_banner_nav_right">
    <!-- events -->
    <div class="events">
        <h3>Events</h3>
        <div class="w3agile_event_grids">
            <div class="col-md-6 w3agile_event_grid">
                <div class="col-md-3 w3agile_event_grid_left">
                    <i class="fa fa-bullhorn" aria-hidden="true"></i>
                </div>
                <div class="col-md-9 w3agile_event_grid_right">
                    <h4>cum soluta nobis eligendi</h4>
                    <p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis 
                        voluptatibus.</p>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-6 w3agile_event_grid">
                <div class="col-md-3 w3agile_event_grid_left">
                    <i class="fa fa-bullseye" aria-hidden="true"></i>
                </div>
                <div class="col-md-9 w3agile_event_grid_right">
                    <h4>rerum hic tenetur a sapiente</h4>
                    <p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis 
                        voluptatibus.</p>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="w3agile_event_grids">
            <div class="col-md-6 w3agile_event_grid">
                <div class="col-md-3 w3agile_event_grid_left">
                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                </div>
                <div class="col-md-9 w3agile_event_grid_right">
                    <h4>earum rerum tenetur sapiente</h4>
                    <p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis 
                        voluptatibus.</p>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-6 w3agile_event_grid">
                <div class="col-md-3 w3agile_event_grid_left">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
                <div class="col-md-9 w3agile_event_grid_right">
                    <h4>quibu aut officiis debitis</h4>
                    <p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis 
                        voluptatibus.</p>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="w3agile_event_grids">
            <div class="col-md-6 w3agile_event_grid">
                <div class="col-md-3 w3agile_event_grid_left">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                </div>
                <div class="col-md-9 w3agile_event_grid_right">
                    <h4>necessitatibus saepe eveniet</h4>
                    <p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis 
                        voluptatibus.</p>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-6 w3agile_event_grid">
                <div class="col-md-3 w3agile_event_grid_left">
                    <i class="fa fa-trophy" aria-hidden="true"></i>
                </div>
                <div class="col-md-9 w3agile_event_grid_right">
                    <h4>repudiandae sint et molestiae</h4>
                    <p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis 
                        voluptatibus.</p>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="events-bottom">
            <div class="col-md-6 events_bottom_left">
                <div class="col-md-4 events_bottom_left1">
                    <div class="events_bottom_left1_grid">
                        <h4>20</h4>
                        <p>July, 2016</p>
                    </div>
                </div>
                <div class="col-md-8 events_bottom_left2">	
                    <img src="{{ asset('public/frontEnd/') }}/images/15.jpg" alt=" " class="img-responsive" />
                    <h4>ut aut reiciendis facere possimus</h4>
                    <ul>
                        <li><i class="fa fa-clock-o" aria-hidden="true"></i>3:00 PM</li>
                        <li><i class="fa fa-user" aria-hidden="true"></i><a href="#">Admin</a></li>
                    </ul>
                    <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil 
                        impedit quo minus id quod maxime placeat facere possimus, omnis voluptas 
                        assumenda est.</p>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-6 events_bottom_left">
                <div class="col-md-4 events_bottom_left1">
                    <div class="events_bottom_left1_grid">
                        <h4>21</h4>
                        <p>July, 2016</p>
                    </div>
                </div>
                <div class="col-md-8 events_bottom_left2">	
                    <img src="{{ asset('public/frontEnd/') }}/images/19.jpg" alt=" " class="img-responsive" />
                    <h4>maxime placeat facere possimus</h4>
                    <ul>
                        <li><i class="fa fa-clock-o" aria-hidden="true"></i>3:30 PM</li>
                        <li><i class="fa fa-user" aria-hidden="true"></i><a href="#">Admin</a></li>
                    </ul>
                    <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil 
                        impedit quo minus id quod maxime placeat facere possimus, omnis voluptas 
                        assumenda est.</p>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //events -->
</div>
<div class="clearfix"></div>
</div>  
@endsection
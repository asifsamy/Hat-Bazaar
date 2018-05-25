<div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
        <li class="sidebar-search">
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
            <!-- /input-group -->
        </li>
        <li>
            <a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
        </li>
        @if(Auth::user()->level == 1)
        <li>
            <a href="#"><i class="fa fa-users"></i> User Info<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ url('/user/add') }}">Add User</a>
                </li>
                <li>
                    <a href="{{ url('/user/manage') }}">Manage User</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        @endif
        <li>
            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Category Info<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ url('/category/add') }}">Add Category</a>
                </li>
                <li>
                    <a href="{{ url('/category/manage') }}">Manage Category</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <li>
            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Sub-Category Info<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ url('/sub-category/add') }}">Add Sub-Category</a>
                </li>
                <li>
                    <a href="{{ url('/sub-category/manage') }}">Manage Sub-Category</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <li>
            <a href="#"><i class="far fa-building"></i> Manufacturer Info<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ url('/manufacturer/add') }}">Add Manufacturer</a>
                </li>
                <li>
                    <a href="{{ url('/manufacturer/manage') }}">Manage Manufacturer</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <li>
            <a href="#"><i class="fa fa-product-hunt"></i> Product Info<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ url('/product/add') }}">Add Product</a>
                </li>
                <li>
                    <a href="{{ url('/product/manage') }}">Manage Product</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <li>
            <a href="#"><i class="fa fa-cart-arrow-down"></i> Order Info<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ url('/order/manage') }}">Manage Order</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        
    </ul>
</div>
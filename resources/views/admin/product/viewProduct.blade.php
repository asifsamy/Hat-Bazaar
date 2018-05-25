@extends('admin.master')

@section('body')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Product Information</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover">
                    <tr>
                        <th>Product ID</th>
                        <th>{{ $product->id }}</th> 
                    </tr>
                    <tr>
                        <th>Product Name</th>
                        <th>{{ $product->productName }}</th> 
                    </tr>
                    <tr>
                        <th>Sub-Category Name</th>
                        <th>{{ $product->subCategoryName }}</th> 
                    </tr>
                    <tr>
                        <th>Category Name</th>
                        <th>{{ $category->categoryName }}</th> 
                    </tr>
                    <tr>
                        <th>Manufacturer Name</th>
                        <th>{{ $product->manufacturerName }}</th> 
                    </tr>
                    <tr>
                        <th>Product Price</th>
                        <th>{{ $product->productPrice }}</th> 
                    </tr>
                    <tr>
                        <th>Product Quantity</th>
                        <th>{{ $product->productQuantity }}</th> 
                    </tr>
                    <tr>
                        <th>Product Perimeter</th>
                        <th>{{ $product->productPerimeter }}</th> 
                    </tr>
                    <tr>
                        <th>Product Description</th>
                        <th>{!! $product->productDescription !!}</th> 
                    </tr>
                    <tr>
                        <th>Product Image</th>
                        <th><img src="{{ asset($product->productImage) }}" alt="{{ $product->productName }}" height="300px" width="300px"></th> 
                    </tr>
                    <tr>
                        <th>Publication Status</th>
                        <th>{{ $product->publicationStatus == 1 ? 'Published':'Unpublished' }}</th> 
                    </tr>
                    <tr>
                        <th>Have Discount</th>
                        <th>{{ $product->discountFlag == 1 ? 'Yes':'No' }}</th> 
                    </tr>
                    <tr>
                        <th>Discount Rate</th>
                        <th>{{ $product->productDiscount }}</th> 
                    </tr>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

@endsection

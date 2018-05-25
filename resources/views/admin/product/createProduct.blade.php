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
            <div class="panel-heading">
                <h4 class="text-center text-success">{{ Session::get('message') }}</h4>
                Add a New Product
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['url'=>'product/save', 'method'=>'POST',  'enctype'=>'multipart/form-data', 'role'=>'form']) !!}
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" class="form-control" name="productName">
                            <span class="text-danger">
                                {{ $errors->has('productName') ? $errors->first('productName') : '' }}
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Sub-Category Name</label>
                            <select name="subCategoryId" class="form-control">
                                <option>Select Sub-Category Name</option>
                                @foreach($subCategories as $subCategory)
                                <option value="{{ $subCategory->id }}">{{ $subCategory->subCategoryName }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                                {{ $errors->has('subCategoryId') ? $errors->first('subCategoryId') : '' }}
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Manufacturer Name</label>
                            <select name="manufacturerId" class="form-control">
                                <option>Select Manufacturer Name</option>
                                @foreach($manufacturers as $manufacturer)
                                <option value="{{ $manufacturer->id }}">{{ $manufacturer->manufacturerName }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                                {{ $errors->has('manufacturerId') ? $errors->first('manufacturerId') : '' }}
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Product Price</label>
                            <input type="number" class="form-control" name="productPrice">
                            <span class="text-danger">
                                {{ $errors->has('productPrice') ? $errors->first('productPrice') : '' }}
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Product Quantity</label>
                            <input type="number" class="form-control" name="productQuantity">
                            <span class="text-danger">
                                {{ $errors->has('productQuantity') ? $errors->first('productQuantity') : '' }}
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Perimeter Type</label>
                            <select name="productPerimeter" class="form-control">
                                <option>Select Perimeter Type</option>
                                <option value="pc">pc</option>
                                <option value="pcs">pcs</option>
                                <option value="kg">kg</option>
                                <option value="gm">gm</option>
                                <option value="ltr">ltr</option>
                            </select>
                            <span class="text-danger">
                                {{ $errors->has('productPerimeter') ? $errors->first('productPerimeter') : '' }}
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Product Description</label>
                            <textarea class="form-control" rows="3" name="productDescription"></textarea>
                            <span class="text-danger">
                                {{ $errors->has('productDescription') ? $errors->first('productDescription') : '' }}
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Product Image</label>
                            <input type="file" name="productImage" accept="image/*">
                            <span class="text-danger">
                                {{ $errors->has('productImage') ? $errors->first('productImage') : '' }}
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Publication Status</label>
                            <select name="publicationStatus" class="form-control">
                                <option>Select Publication Status</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                            <span class="text-danger">
                                {{ $errors->has('publicationStatus') ? $errors->first('publicationStatus') : '' }}
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Special Offers and Discount</label>
                            <select name="discountFlag" class="form-control">
                                <option>Select Discount Status</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            <label>Discount Rate</label>
                            <input type="number" class="form-control" name="productDiscount" placeholder="Discount Rate" min="0" max="100">
                        </div>
                        <button type="submit" name="btn" class="btn btn-default">Save Product Info</button>
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
@endsection
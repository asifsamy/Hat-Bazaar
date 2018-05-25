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
                Update a Product
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['url'=>'product/update', 'method'=>'POST',  'enctype'=>'multipart/form-data', 'name'=>'editProductForm', 'role'=>'form']) !!}
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="hidden" name="productId" value="{{ $product->id }}">
                            <input type="text" name="productName" value="{{ $product->productName }}" class="form-control">
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
                            <input type="number" name="productPrice" value="{{ $product->productPrice }}" class="form-control">
                            <span class="text-danger">
                                {{ $errors->has('productPrice') ? $errors->first('productPrice') : '' }}
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Product Quantity</label>
                            <input type="number" name="productQuantity" value="{{ $product->productQuantity }}" class="form-control">
                            <span class="text-danger">
                                {{ $errors->has('productQuantity') ? $errors->first('productQuantity') : '' }}
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Perimeter Type</label>
                            <select name="productPerimeter" class="form-control">
                                <option value="{{ $product->productPerimeter }}">{{ $product->productPerimeter }}</option>
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
                            <textarea class="form-control" rows="3" name="productDescription">{{ $product->productDescription }}</textarea>
                            <span class="text-danger">
                                {{ $errors->has('productDescription') ? $errors->first('productDescription') : '' }}
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Product Image</label>
                            <input type="file" name="productImage" accept="image/*">
                            <img src="{{ asset($product->productImage) }}" alt="{{ $product->productName }}" height="200px" width="200px">

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
                            <input type="number" name="productDiscount" value="{{ $product->productDiscount }}" placeholder="Discount Rate" min="0" max="100" class="form-control">
                        </div>
                        <button type="submit" name="btn" class="btn btn-default">Update Product Info</button>
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

<script>
    document.forms['editProductForm'].elements['discountFlag'].value = {{ $product -> discountFlag }}    
    document.forms['editProductForm'].elements['publicationStatus'].value = {{ $product -> publicationStatus }}
    document.forms['editProductForm'].elements['subCategoryId'].value = {{ $product -> subCategoryId }}
    document.forms['editProductForm'].elements['manufacturerId'].value = {{ $product -> manufacturerId }}
</script>
@endsection


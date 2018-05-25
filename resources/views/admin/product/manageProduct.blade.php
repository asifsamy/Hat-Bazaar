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
                Details of All Product
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Sub-Category Name</th>
                            <th>Manufacturer Name</th>
                            <th>Product Price</th>
                            <th>Publication Status</th>
                            <th width='115px'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr class="odd gradeX">
                            <td>{{ $product->productName  }}</td>
                            <td>{{ $product->subCategoryName }}</td>
                            <td>{{ $product->manufacturerName }}</td>
                            <td>{{ $product->productPrice .'Tk. per '.$product->productQuantity.$product->productPerimeter }}</td>
                            <td>{{ $product->publicationStatus == 1 ? 'Published':'Unpublished' }}</td>
                            <td>
                                <a href="{{ url('/product/view/'.$product->id) }}" title="Product Info" class="btn btn-info">
                                    <span class="glyphicon glyphicon-info-sign"></span>
                                </a>
                                <a href="{{ url('/product/edit/'.$product->id) }}" title="Product Edit" class="btn btn-success">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="{{ url('/product/delete/'.$product->id) }}" title="Product Delete" onclick="return confirm('Are You Sure to Delete!');" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

@endsection

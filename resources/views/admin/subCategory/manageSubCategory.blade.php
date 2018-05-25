@extends('admin.master')

@section('body')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Sub-Category Information</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center text-success">{{ Session::get('message') }}</h4>
                Details of All Sub-Categories
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Sub-Category Name</th>
                            <th>Category Name</th>
                            <th>Sub-Category Description</th>
                            <th>Publication Status</th>
                            <th width='65px'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subCategories as $subCategory)
                        <tr class="odd gradeX">
                            <td>{{ $subCategory->subCategoryName }}</td>
                            <td>{{ $subCategory->categoryName }}</td>
                            <td>{!! $subCategory->subCategoryDescription !!}</td>
                            <td>{{ $subCategory->publicationStatus == 1 ? 'Published':'Unpublished' }}</td>
                            <td>
                                <a href="{{ url('/sub-category/edit/'.$subCategory->id) }}" class="btn btn-info">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="{{ url('/sub-category/delete/'.$subCategory->id) }}" onclick="return confirm('Are You Sure to Delete!');" class="btn btn-danger">
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

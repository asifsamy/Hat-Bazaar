@extends('admin.master')

@section('body')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Forms</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center text-success">{{ Session::get('message') }}</h4>
                Add a New Category
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['url'=>'sub-category/save', 'method'=>'POST', 'role'=>'form']) !!}
                            <div class="form-group">
                                <label>Sub-Category Name</label>
                                <input type="text" class="form-control" name="subCategoryName">
                                <span class="text-danger">
                                    {{ $errors->has('subCategoryName') ? $errors->first('subCategoryName') : '' }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Category Name</label>
                                <select name="categoryId" class="form-control">
                                    <option>Select Category Name</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                    {{ $errors->has('categoryId') ? $errors->first('categoryId') : '' }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Sub-Category Description</label>
                                <textarea class="form-control" rows="3" name="subCategoryDescription"></textarea>
                                <span class="text-danger">
                                    {{ $errors->has('subCategoryDescription') ? $errors->first('subCategoryDescription') : '' }}
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
                            <button type="submit" name="btn" class="btn btn-default">Save Sub-Category Info</button>
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

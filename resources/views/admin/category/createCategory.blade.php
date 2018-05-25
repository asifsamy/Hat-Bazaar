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
                        {!! Form::open(['url'=>'category/save', 'method'=>'POST', 'role'=>'form']) !!}
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" class="form-control" name="categoryName">
                                <span class="text-danger">
                                    {{ $errors->has('categoryName') ? $errors->first('categoryName') : '' }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Category Description</label>
                                <textarea class="form-control" rows="3" name="categoryDescription"></textarea>
                                <span class="text-danger">
                                    {{ $errors->has('categoryDescription') ? $errors->first('categoryDescription') : '' }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Select Publication Status</label>
                                <select name="publicationStatus" class="form-control">
                                    <option>Select Publication Status</option>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                            </div>
                            <button type="submit" name="btn" class="btn btn-default">Save Category Info</button>
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
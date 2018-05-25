@extends('admin.master')

@section('body')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Manufacturer Information</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center text-success">{{ Session::get('message') }}</h4>
                Add a New Manufacturer
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['url'=>'manufacturer/save', 'method'=>'POST', 'role'=>'form']) !!}
                            <div class="form-group">
                                <label>Manufacturer Name</label>
                                <input type="text" class="form-control" name="manufacturerName">
                                <span class="text-danger">
                                    {{ $errors->has('manufacturerName') ? $errors->first('manufacturerName') : '' }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Manufacturer Description</label>
                                <textarea class="form-control" rows="3" name="manufacturerDescription"></textarea>
                                <span class="text-danger">
                                    {{ $errors->has('manufacturerDescription') ? $errors->first('manufacturerDescription') : '' }}
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
                            <button type="submit" name="btn" class="btn btn-default">Save Manufacturer Info</button>
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

@extends('admin.master')

@section('body')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Manufacturer's Information</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Manufacturer's Information
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['url'=>'manufacturer/update', 'method'=>'POST', 'name'=>'editManufacturerForm', 'role'=>'form']) !!}
                            <div class="form-group">
                                <label>Manufacturer Name</label>
                                <input type="hidden" name="manufacturerId" value="{{ $manufacturerById->id }}">
                                <input type="text" name="manufacturerName" value="{{ $manufacturerById->manufacturerName }}" class="form-control">
                                <span class="text-danger">
                                    {{ $errors->has('manufacturerName') ? $errors->first('manufacturerName') : '' }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Manufacturer Description</label>
                                <textarea name="manufacturerDescription" class="form-control" rows="3">{{ $manufacturerById->manufacturerDescription }}</textarea>
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
                            <button type="submit" name="btn" class="btn btn-default">Update Manufacturer Info</button>
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
    document.forms['editManufacturerForm'].elements['publicationStatus'].value={{ $manufacturerById->publicationStatus }}
</script>
@endsection

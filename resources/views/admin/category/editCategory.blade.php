@extends('admin.master')

@section('body')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Category Information</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Category Information
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['url'=>'category/update', 'method'=>'POST', 'name'=>'editCategoryForm', 'role'=>'form']) !!}
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="hidden" name="categoryId" value="{{ $categoryById->id }}">
                                <input type="text" name="categoryName" value="{{ $categoryById->categoryName }}" class="form-control">
                                <span class="text-danger">
                                    {{ $errors->has('categoryName') ? $errors->first('categoryName') : '' }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Category Description</label>
                                <textarea name="categoryDescription" class="form-control" rows="3">{{ $categoryById->categoryDescription }}</textarea>
                                <span class="text-danger">
                                    {{ $errors->has('categoryDescription') ? $errors->first('categoryDescription') : '' }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Publication Status</label>
                                <select name="publicationStatus" class="form-control">
                                    <option>Select Publication Status</option>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                            </div>
                            <button type="submit" name="btn" class="btn btn-default">Update Category Info</button>
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
    document.forms['editCategoryForm'].elements['publicationStatus'].value={{ $categoryById->publicationStatus }}
</script>
@endsection

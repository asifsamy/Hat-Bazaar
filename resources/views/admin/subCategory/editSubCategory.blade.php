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
                Edit Sub-Category Information
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['url'=>'sub-category/update', 'method'=>'POST', 'name'=>'editSubCategoryForm', 'role'=>'form']) !!}
                            <div class="form-group">
                                <label>Sub-Category Name</label>
                                <input type="hidden" name="subCategoryId" value="{{ $subCategoryById->id }}">
                                <input type="text" name="subCategoryName" value="{{ $subCategoryById->subCategoryName }}" class="form-control">
                                <span class="text-danger">
                                    {{ $errors->has('subCategoryName') ? $errors->first('subCategoryName') : '' }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Category Name</label>
                                <select name="categoryId" class="form-control">
                                    <option value="{{ $subCategoryById->categoryId }}">{{ $subCategoryById->categoryName }}</option>
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
                                <textarea name="subCategoryDescription" class="form-control" rows="3">{{ $subCategoryById->subCategoryDescription }}</textarea>
                                <span class="text-danger">
                                    {{ $errors->has('subCategoryDescription') ? $errors->first('subCategoryDescription') : '' }}
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
                            <button type="submit" name="btn" class="btn btn-default">Update Sub-Category Info</button>
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
    document.forms['editSubCategoryForm'].elements['publicationStatus'].value={{ $subCategoryById->publicationStatus }}
</script>
@endsection

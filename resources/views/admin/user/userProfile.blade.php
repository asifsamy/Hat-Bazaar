@extends('admin.master')

@section('body')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">My Profile</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                My Profile Info
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['url'=>'user/change-password', 'method'=>'POST', 'role'=>'form']) !!}
                            <div class="form-group">
                                <label>Name</label>
                                <input type="hidden" name="userId" value="{{ $user->id }}" class="form-control">
                                <input type="text" name="name" disabled value="{{ $user->name }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="email" disabled value="{{ $user->email }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="email" name="email" disabled value="{{ $user->address }}" class="form-control">
<!--                                <textarea name="address" disabled class="form-control" rows="3">{{ $user->address }}</textarea>-->
                            </div>
                            <div class="form-group">
                                <label>Access Level</label>
                                <input type="email" name="email" disabled value="{{ $user->level == 1 ? 'Admin':'Employee' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Change Password</label>
                                <input type="password" name="password" placeholder="Enter a New Password" required class="form-control">
                            </div>
                            <button type="submit" name="btn" class="btn btn-primary">Change Password</button>
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

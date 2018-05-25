@extends('admin.master')

@section('body')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">User Information</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center text-success">{{ Session::get('message') }}</h4>
                Details of All {{$users->total()}} Users ({{ $users->count() }} in this page)
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Serial #</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th width='65px'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach($users as $user)
                        <tr class="odd gradeX">
                            <td>{{ $i++  }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{!! $user->address !!}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ url('/user/edit/'.$user->id) }}" class="btn btn-info">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="{{ url('/user/delete/'.$user->id) }}" onclick="return confirm('Are You Sure to Delete!');" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $users->links() }}
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

@endsection

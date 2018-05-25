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
                <h4 class="text-center text-success">{{ Session::get('message') }}</h4>
                Details of All Manufacturers
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Manufacturer ID</th>
                            <th>Manufacturer Name</th>
                            <th>Manufacturer Description</th>
                            <th>Publication Status</th>
                            <th width='65px'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($manufacturers as $manufacturer)
                        <tr class="odd gradeX">
                            <td>{{ $manufacturer->id  }}</td>
                            <td>{{ $manufacturer->manufacturerName }}</td>
                            <td>{{ $manufacturer->manufacturerDescription }}</td>
                            <td>{{ $manufacturer->publicationStatus == 1 ? 'Published':'Unpublished' }}</td>
                            <td>
                                <a href="{{ url('/manufacturer/edit/'.$manufacturer->id) }}" class="btn btn-info">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="{{ url('/manufacturer/delete/'.$manufacturer->id) }}" onclick="return confirm('Are You Sure to Delete!');" class="btn btn-danger">
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

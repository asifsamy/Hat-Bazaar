@extends('admin.master')

@section('body')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Order Information</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center text-success">{{ Session::get('message') }}</h4>
                All Orders
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Order Total</th>
                            <th>Order Date</th>
                            <th>Order Status</th>
                            <th>Payment Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customerOrders as $customerOrder)
                        <tr class="odd gradeX">
                            <td>{{ $customerOrder->id  }}</td>
                            <td>{{ $customerOrder->firstName.' '.$customerOrder->lastName }}</td>
                            <td>{{ $customerOrder->orderTotal.' Tk.' }}</td>
                            <td>{{ $customerOrder->created_at }}</td>
                            <td>{{ $customerOrder->orderStatus }}</td>
                            <td>{{ $customerOrder->paymentType }}</td>
                            <td>
                                <a href="{{ url('/order/invoice/'.$customerOrder->id) }}" title="See Invoice" class="btn btn-info">
                                    <span class="glyphicon glyphicon-info-sign"></span>
                                </a>
                                @if($customerOrder->orderStatus == 'Pending')
                                <a href="{{ url('/order/edit/'.$customerOrder->id) }}" title="Make It Confirm" class="btn btn-success">
                                    <span class="glyphicon glyphicon-unchecked"></span>
                                </a>
                                <a href="{{ url('/order/delete/'.$customerOrder->id) }}" title="Cancel Order" onclick="return confirm('Are You Sure You want to make it Cancel! After Cancelling it will be deleted from Database');" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                                @elseif($customerOrder->orderStatus == 'Confirmed')
<!--                                <a href="{{ url('/order/edit/'.$customerOrder->id) }}" title="Make It Pending" class="btn btn-success">
                                    <span class="glyphicon glyphicon-check"></span>
                                </a>-->
                                <a href="{{ url('/order/delete/'.$customerOrder->id) }}" title="Order Sold" onclick="return confirm('Are You Sure You want to make it Sold!');" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                                @endif
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


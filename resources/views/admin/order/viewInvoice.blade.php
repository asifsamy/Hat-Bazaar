@extends('admin.master')

@section('body')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Invoice</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel-body">
                <style>
                    td, th{
                        font-size: 17px;
                        font-family: Arial, Helvetica, sans-serif;
                    }
                    td{
                        padding-left: 8px;
                        padding-right: 8px;
                    }
                    .rightTextAlign{
                        text-align: right;
                    }
                    .mypadding{
                        padding: 8px;
                    }
                </style>
                <table width="100%">
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td rowspan="3"><img src="{{ asset('public/admin/') }}/images/logo.jpg" width="200px" height="90px" alt="Logo"></td>
                        <td>&nbsp;</td>
                        <td><div class="rightTextAlign">Invoice ID: {{ $order->id }}</div></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><div class="rightTextAlign">Created: {{ $order->created_at }}</div></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><div class="rightTextAlign">Due: {{ $order->updated_at }}</div></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><h3>Customer Info:</h3></td>
                        <td>&nbsp;</td>
                        <td><div class="rightTextAlign"><h3>Shipping Info:</h3></div></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>{{ $order->firstName. ' ' .$order->lastName}}</td>
                        <td>&nbsp;</td>
                        <td><div class="rightTextAlign">{{ $shippingInfo->firstName. ' ' .$shippingInfo->lastName}}</div></td>
                    </tr>
                    <tr>
                        <td>{{ $order->address }}</td>
                        <td>&nbsp;</td>
                        <td><div class="rightTextAlign">{{ $shippingInfo->address }}</div></td>
                    </tr>
                    <tr>
                        <td>{{ $order->phoneNumber }}</td>
                        <td>&nbsp;</td>
                        <td><div class="rightTextAlign">{{ $shippingInfo->phoneNumber }}</div></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr style="background-color: #ddd;">
                        <th><div class="mypadding">Payment Method</div></th>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>{{ $order->paymentType }}</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr style="background-color: #ddd;">
                        <th><div class="mypadding">Item</div></th>
                        <th><div class="mypadding">Quantity</div></th>
                        <th><div class="rightTextAlign"><div class="mypadding">Price</div></div></th>
                    </tr>
                    @foreach($orderDetails as $orderDetail)
                    <tr  class="page-header">
                        <td>{{ $orderDetail->productName }}</td>
                        <td>{{ $orderDetail->productSalesQuantity }}</td>
                        <td><div class="rightTextAlign">{{ $orderDetail->productPrice.' Tk.' }}</div></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <th  class="page-header"><div class="rightTextAlign"><div class="mypadding">Total: {{ $order->orderTotal.' Tk.' }}</div></div></th>
                    </tr>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

@endsection




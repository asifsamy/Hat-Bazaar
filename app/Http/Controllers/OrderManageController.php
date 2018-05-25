<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\OrderDetail;
use App\Order;

class OrderManageController extends Controller
{
    public function index()
    {
        /*$customerOrders = DB::table('orders')
                ->join('customers', 'customers.id', '=', 'orders.customerId')
                ->join('payments', 'payments.id', '=', 'orders.paymentId')
                ->where('orders.orderStatus', 'Pending')
                ->orWhere('orders.orderStatus', 'Confirmed')
                ->select('orders.*', 'customers.firstName', 'customers.lastName', 'payments.paymentType')
                ->get();*/
        $customerOrders = DB::table('orders')
                ->join('customers', 'customers.id', '=', 'orders.customerId')
                ->join('payments', 'payments.id', '=', 'orders.paymentId')
                ->select('orders.*', 'customers.firstName', 'customers.lastName', 'payments.paymentType')
                ->get();
        return view('admin.order.manageOrder', ['customerOrders'=>$customerOrders]);
    }
    
    public function viewInvoice($id)
    {
        $order = DB::table('orders')
                ->join('customers', 'orders.customerId', '=', 'customers.id')
                ->join('payments', 'orders.paymentId', '=', 'payments.id')
                ->where('orders.id', $id)
                ->select('orders.*', 'customers.firstName', 'customers.lastName', 
                        'customers.phoneNumber', 'customers.address',  'payments.paymentType')
                ->first();
        $shippingInfo = DB::table('orders')
                ->join('shippings', 'orders.shippingId', '=', 'shippings.id')
                ->where('orders.id', $id)
                ->select('shippings.*')
                ->first();
        $orderDetails = OrderDetail::where('orderId', $id)->get();
        //return view('admin.order.viewInvoice', ['order'=>$order]);
        return view('admin.order.viewInvoice', ['order'=>$order, 'shippingInfo'=>$shippingInfo, 'orderDetails'=>$orderDetails]);
    }
    
    public function editOrder($id)
    {
        $order = Order::where('id', $id)->first();
        if($order->orderStatus == 'Pending'){
            $order->orderStatus = 'Confirmed';
        }/*elseif($order->orderStatus == 'Confirmed'){
            $order->orderStatus = 'Pending';
        }*/
        $order->save();
        return redirect('/order/manage');
    }
    
    public function deleteOrder($id)
    {
        $order = Order::where('id', $id)->first();
        if($order->orderStatus == 'Pending'){
            $order->delete();
        }elseif($order->orderStatus == 'Confirmed'){
            $order->orderStatus = 'Sold';
            $order->save();
        }
        return redirect('/order/manage');
    }
}

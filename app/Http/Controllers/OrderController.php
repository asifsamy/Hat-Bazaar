<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Payment;
use App\Order;
use App\OrderDetail;
use Cart;
use DB;

class OrderController extends Controller {

    public function showPaymentForm() {
        $customerId = Session::get('customerId');
        $shippingId = Session::get('shippingId');
        if ($customerId != NULL && $shippingId != NULL) {
            return view('frontEnd.order.paymentContent');
        } elseif ($customerId != NULL && $shippingId == NULL) {
            return redirect('/checkout/shipping');
        } else {
            return redirect('/checkout');
        }
    }

    public function saveOrderInfo(Request $request) {
        $paymentType = $request->paymentType;

        if ($paymentType == 'cashOnDelivery') {
            $paymentId = $this->savePaymentInfo($paymentType);
            $orderId = $this->saveOrder($paymentId);
            $this->saveOrderDetails($orderId);
            return redirect('/order/order-success');
        } elseif ($paymentType == 'bkash') {
            return 'Under Construction bkash payment type! Please use Cash On Delivery';
        } elseif ($paymentType == 'debitCredit') {
            //return view('frontEnd.order.something');
            return 'Under Construction Debit/Credit payment type! Please use Cash On Delivery';
        }
    }
    
    private function savePaymentInfo($paymentType)
    {
        $payment = new Payment();
        $payment->paymentType = $paymentType;
        $payment->save();
        return $payment->id;
    }
    
    private function saveOrder($paymentId)
    {
        $order = new Order();
        $order->customerId = Session::get('customerId');
        $order->shippingId = Session::get('shippingId');
        $order->paymentId = $paymentId;
        /* Calculate Total From Cart */
        $subtotal = str_replace(",", "", Cart::subtotal());
        $vat = $subtotal * 0.15; 
        $total = $vat + $subtotal;
        //
        $order->orderTotal = $total;
        $order->save();
        return $order->id;
    }
    
    private function saveOrderDetails($orderId)
    {
        $contents = Cart::content();
        $orderData = array();
        foreach ($contents as $content) {
            $orderData['orderId'] = $orderId;
            $orderData['productId'] = $content->id;
            $orderData['productName'] = $content->name;
            $orderData['productPrice'] = $content->price;
            $orderData['productSalesQuantity'] = $content->qty;
            DB::table('order_details')->insert($orderData);
        }
    }
    
    public function orderSuccess()
    {
        $customerId = Session::get('customerId');
        $shippingId = Session::get('shippingId');
        if ($customerId != NULL && $shippingId != NULL) {
            return view('frontEnd.order.successOrder');
        } else {
            return redirect('/cart');    
        }
    }
}

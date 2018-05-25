<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Customer;
use Session;
use App\Shipping;

use DB;

class CheckoutController extends Controller {

    public function index() {
        $customerId = Session::get('customerId'); 
        $shippingId = Session::get('shippingId'); 
        if($customerId != NULL && $shippingId != NULL){
            return redirect('/order/payment'); 
        } elseif($customerId != NULL && $shippingId == NULL) {
            return redirect('/checkout/shipping'); 
        } else {
            return view('frontEnd.checkout.checkoutContent'); 
        }  
     }
    
    public function emailCheck($emailAddress=null)
    {
        $customerInfo = DB::table('customers')
                         ->where('emailAddress', $emailAddress)
                         ->first();
        if($customerInfo){
          echo 'Already Exists!';
        } else{
          echo 'Available';
        }
    }
    
    public function customerLogin(Request $request)
    {
        $this->validate($request, [
            'emailAddress' => 'required',
            'password' => 'required',
        ]);
        
        $chkEmailAddress = DB::table('customers')
                              ->where('emailAddress', $request->emailAddress)
                              ->first();
        if($chkEmailAddress)
        {
            if(Hash::check($request->password, $chkEmailAddress->password))
            {
                $customerId = $chkEmailAddress->id;
                Session::put('customerId', $customerId);
                return redirect('/checkout/shipping');                
            } else {
                return redirect('/checkout')->with('message', 'Email or Password missmathed!');
            }
        } else {
            return redirect('/checkout')->with('message', 'Email or Password missmathed!');
        }
    }

    public function customerRegistration(Request $request) {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'emailAddress' => 'required',
            'password' => 'required',
            'phoneNumber' => 'required',
            'address' => 'required',
        ]);

         $chkEmailAddress = DB::table('customers')
                              ->where('emailAddress', $request->emailAddress)
                              ->first();
          if($chkEmailAddress){
              return redirect('/checkout')->with('message', 'This Email is Existed! Try with another Email.');
          } else {
              $this->saveCustomerInfo($request);
              return redirect('/checkout/shipping');
          }
    }
    
    private function saveCustomerInfo($request)
    {
        $customer = new Customer();
        $customer->firstName =  $request->firstName;
        $customer->lastName =  $request->lastName;
        $customer->emailAddress =  $request->emailAddress;
        $customer->password = bcrypt($request->password);
        $customer->phoneNumber =  $request->phoneNumber;
        $customer->address =  $request->address;
        $customer->save();

        $customerId = $customer->id;
        Session::put('customerId', $customerId);
    }

    public function showShippingForm() {
        $customerId = Session::get('customerId');
        $customerById = Customer::find($customerId);
        return view('frontEnd.checkout.shippingContent', ['customerById' => $customerById]);
    }

    public function saveShippingInfo(Request $request) {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'emailAddress' => 'required',
            'phoneNumber' => 'required',
            'address' => 'required',
        ]);

        $shipping = new Shipping();
        $shipping->firstName = $request->firstName;
        $shipping->lastName = $request->lastName;
        $shipping->emailAddress = $request->emailAddress;
        $shipping->phoneNumber = $request->phoneNumber;
        $shipping->address = $request->address;
        $shipping->save();

        $shippingId = $shipping->id;
        Session::put('shippingId', $shippingId);
        return redirect('/order/payment');
    }

}

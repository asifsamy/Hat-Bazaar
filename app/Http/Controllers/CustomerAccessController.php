<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Session;
use App\Customer;
use DB;

class CustomerAccessController extends Controller
{
    public function loginCustomer()
    {
        return view('frontEnd.login.loginContent');
    }
    public function logoutCustomer()
    {
        session()->forget('customerId');
        return redirect('/');
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
    
    public function signInCustomer(Request $request)
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
                return redirect('/');                
            } else {
                return redirect('/customer/login')->with('message', 'Email or Password missmathed!');
            }
        } else {
            return redirect('/customer/login')->with('message', 'Email or Password missmathed!');
        }
    }
    
    public function registerCustomer(Request $request)
    {
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
              return redirect('/customer/login')->with('message', 'This Email is Existed! Try with another Email.');
          } else {
              $this->saveCustomerInfo($request);
              return redirect('/');
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
    
    public function customerProfile()
    {
        $customerId = Session::get('customerId');
        if($customerId != NULL) {
            $customer = Customer::where('id', $customerId)->first();
            return view('frontEnd.login.customerProfile', ['customer'=>$customer]);
        } else {
            return redirect('/');    
        }
    }
    
    public function editCustomerProfile()
    {
        $customerId = Session::get('customerId');
        if($customerId != NULL) {
            $customer = Customer::where('id', $customerId)->first();
            return view('frontEnd.login.editCustomerProfile', ['customer'=>$customer]);
        } else {
            return redirect('/');    
        }
    }
    
    public function updateCustomerInfo(Request $request)
    {
        $customerId = Session::get('customerId');
        if($customerId != NULL) {
            $customer = Customer::where('id', $customerId)->first();
            $customer->firstName = $request->firstName;
            $customer->lastName = $request->lastName;
            $customer->emailAddress = $request->emailAddress;
            $customer->phoneNumber = $request->phoneNumber;
            $customer->address = $request->address;
            
            $customer->save();
            return redirect('/customer/profile')->with('message', 'Customer Info Updated Successfully!');   
        } else {
            return redirect('/');    
        }
    }
    
    public function changeCustomerPassword()
    {
        $customerId = Session::get('customerId');
        if($customerId != NULL) {
            return view('frontEnd.login.changeCustomerPassword');
        } else {
            return redirect('/');    
        }
    }
    
    public function updateCustomerPassword(Request $request)
    {
        $customerId = Session::get('customerId');
        if($customerId != NULL) {
            $chkPasswordById = Customer::where('id', $customerId)->first();                   
            if(Hash::check($request->oldPassword, $chkPasswordById->password) && $request->password == $request->password2) {
                $chkPasswordById->password = bcrypt($request->password);
                $chkPasswordById->save();
                $request->session()->flush();
                return redirect('/customer/login')->with('message', 'Password Updated Successfully! Please Login');
            } else {
                return redirect('/customer/change-password')->with('message', 'Old Password is Incorrect!');
            }   
        } else {
            return redirect('/');    
        }
    }
}

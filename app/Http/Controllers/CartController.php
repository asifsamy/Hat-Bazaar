<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::content();
        return view('frontEnd.cart.cartContent', ['cartData'=>$cart]);
    }
    
    /*public function addToCart($id, Request $request=NULL)
    {
        $product = Product::find($id);
        if($request->or_qty == NULL){
          Cart::add(['id' => $product->id, 'name' => $product->productName, 'qty' => 1,
            'price' => $product->productPrice,
            'options'=> [
                'img' => $product->productImage,
                'perimeter' => $product->productPerimeter,
                'pdQty' => $product->productQuantity,
            ]
          ]);  
        } else {
          Cart::add(['id' => $product->id, 'name' => $product->productName, 'qty' => $request->or_qty,
            'price' => $product->productPrice,
            'options'=> [
                'img' => $product->productImage,
                'perimeter' => $product->productPerimeter,
                'pdQty' => $product->productQuantity,
            ]
          ]);  
        }
        return back();
    }*/
    
    public function addToCart($id)
    {
        $product = Product::find($id);
        Cart::add(['id' => $product->id, 'name' => $product->productName, 'qty' => 1,
            'price' => $product->productPrice,
            'options'=> [
                'img' => $product->productImage,
                'perimeter' => $product->productPerimeter,
                'pdQty' => $product->productQuantity,
            ]
          ]);
        return back();
    }
    
    public function removeFromCart($id)
    {
        Cart::remove($id);
        return back();
    }
    
    public function updateCart(Request $request)
    {
        $qty = $request->newQty;
        $rowId = $request->rowId;
        //update Cart
        Cart::update($rowId, $qty);
        echo 'Cart Updated Successfully!';;
    }
}

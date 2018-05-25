<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\SubCategory;
use DB;

class MyController extends Controller {

    public function index() {
        $publishedProducts = Product::where('publicationStatus', 1)->get();
        return view('frontEnd.home.homeContent', ['publishedProducts' => $publishedProducts]);
    }

    public function subCategory($id) {
        //Eloquent ORM
        $subCategory = SubCategory::where('id', $id)
                ->where('publicationStatus', 1)
                ->first();
        $publishedSubCategoryProducts = Product::where('subCategoryId', $id)
                ->where('publicationStatus', 1)
                ->get();
        return view('frontEnd.subCategory.subCategoryContent', ['publishedSubCategoryProducts'
            => $publishedSubCategoryProducts, 'subCategory'=>$subCategory]);
    }

    public function productDetails($id) {
        $productById = Product::where('id', $id)
                ->first();
        return view('frontEnd.product.productContent', ['productById'=>$productById]);
    }
    
    public function productDiscount()
    {
        $products = Product::where('discountFlag', 1)
                ->where('publicationStatus', 1)
                ->get();
        return view('frontEnd.product.productDiscountContent', ['products'=>$products]);
    }
    
    public function searchData(Request $request)
    {
        $searchData = $request->searchData;
        
        $data = DB::table('products')
                ->where('products.publicationStatus', 1)
                ->where('products.productName', 'like', '%'. $searchData .'%')
                ->get();
        return view('frontEnd.product.searchProductContent', ['publishedSubCategoryProducts'
            => $data]);
    }

        public function event() {
        return view('frontEnd.event.eventContent');
    }

    public function about() {
        return view('frontEnd.about.aboutContent');
    }

    public function brandedProducts() {
        return view('frontEnd.brandedProducts.brandedPdContents');
    }

    public function services() {
        return view('frontEnd.services.serviceContents');
    }
    
    public function contact()
    {
        return view('frontEnd.contact.contactContents');
    }
    
    public function fourZeroPost()
    {
        return view('frontEnd.fourZero.404Contents');
    }
    
    public function fourZeroGet()
    {
        return view('frontEnd.fourZero.404Contents');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCategory;
use App\Manufacturer;
use App\Product;
use DB;

class ProductController extends Controller {

    public function createProduct() {
        $subCategories = SubCategory::where('publicationStatus', 1)->get();
        $manufacturers = Manufacturer::where('publicationStatus', 1)->get();
        return view('admin.product.createProduct', ['subCategories' => $subCategories, 'manufacturers' => $manufacturers]);
    }

    public function storeProduct(Request $request) {
        //return $request->all();
        $this->validate($request, [
            'productName' => 'required',
            'subCategoryId' => 'required',
            'manufacturerId' => 'required',
            'productPrice' => 'required',
            'productQuantity' => 'required',
            'productPerimeter' => 'required',
            'productDescription' => 'required',
            'productImage' => 'required',
            'publicationStatus' => 'required',
        ]);

        $productImage = $request->file('productImage'); //for retrieving image from form
        //echo '<pre>';
        //print_r($productImage);
        $imageName = $productImage->getClientOriginalName();
        $uploadPath = 'public/productImage/';
        $productImage->move($uploadPath, $imageName);
        $imageUrl = $uploadPath . $imageName;
        $this->saveProductInfo($request, $imageUrl);

        return redirect('/product/add')->with('message', 'Product Info Saved Successfully');
    }

    protected function saveProductInfo($request, $imageUrl) {
        //store ifo in DB using Eloquent ORM
        $product = new Product();
        $product->productName = $request->productName;
        $product->subCategoryId = $request->subCategoryId;
        $product->manufacturerId = $request->manufacturerId;
        $product->productPrice = $request->productPrice;
        $product->productQuantity = $request->productQuantity;
        $product->productPerimeter = $request->productPerimeter;
        $product->productDescription = $request->productDescription;
        $product->productImage = $imageUrl;
        $product->publicationStatus = $request->publicationStatus;
        $product->discountFlag = $request->discountFlag;
        $product->productDiscount = $request->productDiscount;

        $product->save();
    }

    public function manageProduct() {
        // join query of query builder
        $products = DB::table('products')
                ->join('sub_categories', 'sub_categories.id', '=', 'products.subCategoryId')
                ->join('manufacturers', 'manufacturers.id', '=', 'products.manufacturerId')
                ->select('products.*', 'sub_categories.subCategoryName', 'manufacturers.manufacturerName')
                ->get();

        return view('admin.product.manageProduct', ['products' => $products]);
    }

    public function viewProduct($id) {
        $productById = DB::table('products')
                ->join('sub_categories', 'sub_categories.id', '=', 'products.subCategoryId')
                ->join('manufacturers', 'manufacturers.id', '=', 'products.manufacturerId')
                ->select('products.*', 'sub_categories.subCategoryName', 'sub_categories.categoryId', 'manufacturers.manufacturerName')
                ->where('products.id', $id)
                ->first();

        $id2 = $productById->categoryId;

        $subCategoryById = DB::table('sub_categories')
                ->join('categories', 'categories.id', '=', 'sub_categories.categoryId')
                ->select('categories.*', 'sub_categories.*')
                ->where('categories.id', $id2)
                ->first();
        return view('admin.product.viewProduct', ['product' => $productById, 'category' => $subCategoryById]);
    }

    public function editProduct($id) {
        //Query Builder
        /*$productById = DB::table('products')
                ->join('sub_categories', 'sub_categories.id', '=', 'products.subCategoryId')
                ->join('manufacturers', 'manufacturers.id', '=', 'products.manufacturerId')
                ->select('products.*', 'sub_categories.subCategoryName', 'sub_categories.categoryId', 'manufacturers.manufacturerName')
                ->where('products.id', $id)
                ->first();
        */
        //Eloquent ORM
        $subCategories = SubCategory::where('publicationStatus', 1)->get();
        $manufacturers = Manufacturer::where('publicationStatus', 1)->get();
        $productById = Product::where('id', $id)->first();

        return view('admin.product.editProduct', ['product' => $productById, 'subCategories' => $subCategories, 'manufacturers' => $manufacturers]);
    }
    
    /* //my update codes
    public function updateProduct(Request $request) {
        $this->validate($request, [
            'productName' => 'required',
            'productPrice' => 'required',
            'productQuantity' => 'required',
            'productDescription' => 'required',
            'publicationStatus' => 'required',
        ]);

        if (!empty($request->file('productImage'))) {
            $productImage = $request->file('productImage'); //for retrieving image from form
            //echo '<pre>';
            //print_r($productImage);
            $imageName = $productImage->getClientOriginalName();
            $uploadPath = 'public/productImage/';
            $productImage->move($uploadPath, $imageName);
            $imageUrl = $uploadPath . $imageName;
            $this->updateProductInfoWithImage($request, $imageUrl);
        } else {
            $this->updateProductInfoWithoutImage($request);
        }

        return redirect('/product/manage')->with('message', 'Product Info Updated Successfully.');
    }

    private function updateProductInfoWithImage($request, $imageUrl) {
        $product = Product::find($request->productId);
        $product->productName = $request->productName;
        $product->subCategoryId = $request->subCategoryId;
        $product->manufacturerId = $request->manufacturerId;
        $product->productPrice = $request->productPrice;
        $product->productQuantity = $request->productQuantity;
        $product->productPerimeter = $request->productPerimeter;
        $product->productDescription = $request->productDescription;
        $product->productImage = $imageUrl;
        $product->publicationStatus = $request->publicationStatus;
        $product->save();
    }
    
    private function updateProductInfoWithoutImage($request) {
        $product = Product::find($request->productId);
        $product->productName = $request->productName;
        $product->subCategoryId = $request->subCategoryId;
        $product->manufacturerId = $request->manufacturerId;
        $product->productPrice = $request->productPrice;
        $product->productQuantity = $request->productQuantity;
        $product->productPerimeter = $request->productPerimeter;
        $product->productDescription = $request->productDescription;
        $product->publicationStatus = $request->publicationStatus;
        $product->save();
    }
    // End of My Update code
    */
    
    // BITM update Codes
    public function updateProduct(Request $request)
    {
        $this->validate($request, [
            'productName' => 'required',
            'productPrice' => 'required',
            'productQuantity' => 'required',
            'productDescription' => 'required',
            'publicationStatus' => 'required',
        ]);
        
        $imageUrl = $this->imageExistStatus($request);
        $this->updateProductInfo($request, $imageUrl);
        return redirect('/product/manage')->with('message', 'Product Info Updated Successfully.');
    }
    
    private function imageExistStatus($request)
    {
        $productById = Product::where('id', $request->productId)->first();
        $productImage = $request->file('productImage');
        if($productImage){
            unlink($productById->productImage);
            $imageName = $productImage->getClientOriginalName();
            $uploadPath = 'public/productImage/';
            $productImage->move($uploadPath, $imageName);
            $imageUrl = $uploadPath . $imageName;
        } else {
            $imageUrl = $productById->productImage;   
        }
        return $imageUrl;
    }
    private function updateProductInfo($request, $imageUrl) {
        $product = Product::find($request->productId);
        $product->productName = $request->productName;
        $product->subCategoryId = $request->subCategoryId;
        $product->manufacturerId = $request->manufacturerId;
        $product->productPrice = $request->productPrice;
        $product->productQuantity = $request->productQuantity;
        $product->productPerimeter = $request->productPerimeter;
        $product->productDescription = $request->productDescription;
        $product->productImage = $imageUrl;
        $product->publicationStatus = $request->publicationStatus;
        $product->discountFlag = $request->discountFlag;
        $product->productDiscount = $request->productDiscount;
        $product->save();
    }
    // End of BITM update Codes

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        unlink($product->productImage);
        $product->delete();
        return redirect('/product/manage')->with('message', 'Product deleted Successfully.');
    }

}

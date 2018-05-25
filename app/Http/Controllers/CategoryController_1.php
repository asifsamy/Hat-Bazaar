<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category; // for Eloquent ORM
use DB; //for Query Builder

class CategoryController extends Controller
{
    public function createCategory()
    {
        return view('admin.category.createCategory');
    }
    
    public function storeCategory(Request $request)
    {
        $this->validate($request, [
            'categoryName'=>'required|max:255',
            'categoryDescription'=>'required',
            
        ]);
        //return $request->all();
        /*$category = new Category();
        $category->categoryName = $request->categoryName;
        $category->save();
        return ; */
        
        Category::create($request->all());
        return redirect('/category/add')->with('message', 'Category Info Save Successfully');
        
        /*DB:table('categories')->insert([
           'categoryName'=>$request->categoryName,
           'categoryDescription'=>$request->categoryDescription,
           'publicationStatus'=>$request->publicationStatus, 
        ]);
        return ;*/
    }
    
    public function manageCategory()
    {
        $categories = Category::all();
        return view('admin.category.manageCategory', ['categories'=>$categories]);
    }
    
    public function editCategory($id)
    {
        $categoryById = Category::where('id', $id)->first();
        return view('admin.category.editCategory', ['categoryById'=>$categoryById]);
    }
    
    public function updateCategory(Request $request)
    {
        //dd($request->all());
        $category = Category::find($request->categoryId);
        $category->categoryName = $request->categoryName;
        $category->categoryDescription = $request->categoryDescription;
        $category->publicationStatus = $request->publicationStatus;
        $category->save();
        
        return redirect('/category/manage')->with('message', 'Category Info Updated Successfully');
    }
    
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/category/manage')->with('message', 'Category Deleted Successfully.');
    }
}

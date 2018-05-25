<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SubCategory;
use App\Category;
use DB;

class SubCategoryController extends Controller
{
    public function createSubCategory()
    {
        $categories = Category::where('publicationStatus', 1)->get();
        return view('admin.subCategory.createSubCategory', ['categories'=>$categories]);
    }
    
    public function storeSubCategory(Request $request)
    {
        $this->validate($request, [
            'subCategoryName'=>'required|max:255',
            'subCategoryDescription'=>'required',
            'publicationStatus'=>'required',
            'categoryId'=>'required',  
        ]);
        SubCategory::create($request->all());
        return redirect('/sub-category/add')->with('message', 'Sub-Category Info Save Successfully');
    }
    
    public function manageSubCategory()
    {
        // join query of query builder
        $subCategories = DB::table('sub_categories')
            ->join('categories', 'categories.id', '=', 'sub_categories.categoryId')
            ->select('sub_categories.*', 'categories.categoryName')
            ->get();
        return view('admin.subCategory.manageSubCategory', ['subCategories'=>$subCategories]);
    }
    
    public function editSubCategory($id)
    {
        //Query Builder
        $subCategoryById = DB::table('sub_categories')
            ->join('categories', 'categories.id', '=', 'sub_categories.categoryId')
            ->select('sub_categories.*', 'categories.categoryName')
            ->where('sub_categories.id', $id)
            ->first();  
        
        //Eloquent ORM
        $categories = Category::where('publicationStatus', 1)->get();
        return view('admin.subCategory.editSubCategory', ['subCategoryById'=>$subCategoryById, 'categories'=>$categories]);
    }
    
    public function updateSubCategory(Request $request)
    {
        $subCategory = SubCategory::find($request->subCategoryId);
        $subCategory->subCategoryName = $request->subCategoryName;
        $subCategory->categoryId = $request->categoryId;
        $subCategory->subCategoryDescription = $request->subCategoryDescription;
        $subCategory->publicationStatus = $request->publicationStatus;
        $subCategory->save();
        
        return redirect('/sub-category/manage')->with('message', 'Sub-Category Info Updated Successfully');
    }
    
    public function deleteSubCategory($id)
    {
        $subCategory = SubCategory::find($id);
        $subCategory->delete();
        return redirect('/sub-category/manage')->with('message', 'Sub-Category Deleted Successfully.');
    }
}

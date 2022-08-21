<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parfum;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Admin;

class categoryController extends Controller
{
    public function index(){
        $data = Parfum::get();
        $databrand = Brand::get();
        $datacate = Category::get();
        //return $data;
        return view('category-list',compact('data','databrand','datacate'));
    }
    public function addCategory(){
        return view('add-category');
    }

    public function saveCategory(Request $request){

        $request->validate([
            'categoryName' => 'required',
            'categoryImage' => 'required'
           
        ]);
        $categoryName = $request->categoryName;
        $categoryImage = $request->categoryImage;
        $category = new Category();
        $category->categoryName = $categoryName;
        $category->categoryImage=$categoryImage;
        $category->save();

        return redirect()->back()->with('success','Category added successfully');
    }
   
    public function editCategory($id){
        $datacate = Category::where('categoryID','=',$id)->first();
        return view('edit-category',compact('datacate'));
    }
    public function updateCategory(Request $request){
        $request->validate([
            'categoryName' => 'required',
            'categoryImage' => 'required',
        ]);
        $id = $request->categoryID;
        $categoryName = $request->categoryName;
        $categoryImage = $request->categoryImage;

       Category::where('categoryID','=',$id)->update([
            'categoryID'=>$id,
            'categoryName' =>$categoryName,
            'categoryImage'=>$categoryImage
        ]);
        return redirect()->back()->with('success','Category updated successfully');
    }
    public function deleteCategory($id){
        Category::where('categoryID','=',$id)->delete();
        return redirect()->back()->with('success','Category deleted successfully');
    }

}
          
       
          
     


    
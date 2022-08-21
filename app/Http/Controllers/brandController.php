<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parfum;
use App\Models\Brand;
use App\Models\Category;

class brandController extends Controller
{
    public function index(){
        $data = Parfum::get();
        $databrand = Brand::get();
        $datacate = Category::get();
        //return $data;
        return view('brand-list',compact('data','databrand','datacate'));
    }
    public function addBrand(){
        return view('add-brand');
    }
    public function saveBrand(Request $request){

        $request->validate([
            'brandName' => 'required',
            'brandImage' => 'required'
           
        ]);
        $brandName = $request->brandName;
        $brandImage = $request->brandImage;
        $brand = new Brand();
        $brand->brandName = $brandName;
        $brand->brandImage=$brandImage;
        $brand->save();

        return redirect()->back()->with('success','Brand added successfully');
    }
   
    public function editBrand($id){
        $databrand = Brand::where('brandID','=',$id)->first();
        return view('edit-brand',compact('databrand'));
    }
    public function updateBrand(Request $request){
        $request->validate([
            'brandName' => 'required',
            'brandImage' => 'required',
        ]);
        $id = $request->brandID;
        $brandName = $request->brandName;
        $brandImage = $request->brandImage;

        Brand::where('brandID','=',$id)->update([
            'brandID'=>$id,
            'brandName' =>$brandName,
            'brandImage'=>$brandImage
        ]);
        return redirect()->back()->with('success','Brand updated successfully');
    }
    public function deleteBrand($id){
        Brand::where('brandID','=',$id)->delete();
        return redirect()->back()->with('success','Brand deleted successfully');
    }


          
        }


    
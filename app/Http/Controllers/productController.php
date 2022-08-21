<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parfum;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Admin;

class productController extends Controller
{
    public function index(){
        $data = Parfum::get();
        $databrand = Brand::get();
        $datacate = Category::get();
        //return $data;
        return view('product-list',compact('data','databrand','datacate'));
    }
    public function addProduct(){
        return view('add-product');
    }
    public function saveProduct(Request $request){

        $request->validate([
            'prodName' => 'required',
            'prodPrice' => 'required',
            'prodDes' => 'required',
            'brandID' => 'required',
            'categoryID' => 'required',
            'prodImage' => 'required'
        ]);

        $prodName = $request->prodName;
        $prodPrice = $request->prodPrice;
        $prodDes = $request->prodDes;
        $brandID = $request->brandID;
        $categoryID = $request->categoryID;
        $prodImage = $request->prodImage;
        $prod = new Parfum();
        $prod->prodName = $prodName;
        $prod->prodPrice= $prodPrice;
        $prod->prodDes=$prodDes;
        $prod->brandID=$brandID;
        $prod->categoryID=$categoryID;
        $prod->prodImage=$prodImage;
        $prod->save();

        return redirect()->back()->with('success','Product added successfully');
    }
   
    public function editProduct($id){
        $data = Parfum::where('id','=',$id)->first();
        return view('edit-product',compact('data'));
    }
    public function updateProduct(Request $request){
        $request->validate([
            'prodName' => 'required',
            'prodPrice' => 'required',
            'prodDes' => 'required',
            'brandID' => 'required',
            'categoryID' => 'required',
            'prodImage' => 'required',
        ]);
        $id = $request->id;
        $prodName = $request->prodName;
        $prodPrice = $request->prodPrice;
        $prodDes = $request->prodDes;
        $brandID = $request->brandID;
        $categoryID = $request->categoryID;
        $prodImage = $request->prodImage;

        Parfum::where('id','=',$id)->update([
            'prodName' =>$prodName,
            'prodPrice'=>$prodPrice,
            'prodDes'=>$prodDes,
            'brandID'=>$brandID,
            'categoryID'=>$categoryID,
            'prodImage'=>$prodImage
        ]);
        return redirect()->back()->with('success','Product updated successfully');
    }
    public function deleteProduct($id){
        Parfum::where('id','=',$id)->delete();
        return redirect()->back()->with('success','Product deleted successfully');
    }
    function readdata()
        {
            $pdata = parfum::all();
            return view('insert',['ndata'=>$pdata]);
        }
        function selectedBrand(){
            alert("hello world");
        }
        public function details($id){
      
            $data = Parfum::all();
            $databrand = Brand::all();
        }
          
        }


    
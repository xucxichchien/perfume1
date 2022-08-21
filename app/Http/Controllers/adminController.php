<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parfum;
use App\Models\Brand;
use App\Models\Category;


class adminController extends Controller
{
    public function index(){
        $data = Parfum::get();
        $databrand = Brand::get();
        $datacate = Category::get();
        $dataadmin = Admin::get();
        //return $data;
        return view('admin-list',compact('data','databrand','datacate','dataadmin'));
    }
    public function addAdmin(){
        return view('add-admin');
    }
    public function saveAdmin(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $name = $request->name;
        $email = $request->email;
        $admin = new Admin();
        $admin->name = $name;
        $admin->email= $email;
        $admin->save();

        return redirect()->back()->with('success','Admin added successfully');
    }
   
    public function editAdmin($id){
        $dataadmin = Admin::where('id','=',$id)->first();
        return view('edit-admin',compact('dataadmin'));
    }
    public function updateAdmin(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $id = $request->id;
        $name = $request->name;
        $email = $request->email;

        Admin::where('id','=',$id)->update([
            'name' =>$name,
            'email'=>$email,
        ]);
        return redirect()->back()->with('success','Admin updated successfully');
    }
    public function deleteAdmin($id){
        Admin::where('id','=',$id)->delete();
        return redirect()->back()->with('success','Admin deleted successfully');
    }
    function readdata()
        {
            $adata = parfum::all();
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


    
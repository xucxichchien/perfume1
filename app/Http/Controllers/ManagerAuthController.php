<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manager;
use Hash;
use Session;


class ManagerAuthController extends Controller
{
    public function login()
    {
        return view("manager-login");
    }
    public function registration()
    {
        return view("manager-registration");
    }
    public function registerManager(Request $request)
    {
       $request->validate([
        'name'=>'required',
        'email'=>'required|email|unique:users',
        'password'=>'required|min:5 max:12'

       ]);
       $manager =new Manager();
       $manager->name = $request->name;
       $manager->email = $request->email;
       $manager->password =Hash::make($request->password);
       $res = $manager->save();
       if($res){
        return redirect()-> back()->with('success','you have resigtered successfully');
       }else{
        return redirect()-> back()->with('fail','Oh no!! something Wrong');
       }
    }
    public function loginManager(Request $request)
    {
        $request->validate([
            
            'email'=>'required|email',
            'password'=>'required|min:5 max:12'
        ]   );
     
    $manager = Manager::where('email','=',$request->email)->first();
       if($manager)
        {
            if (hash::check($request->password, $manager->password))
            {
                $request->session()->put('loginId', $manager->id);
                return redirect('product-list');
            }else
            {
                return back()->with('fail','Password not matches');
            }

        }else
        {
            return back()->with('fail','This email is not registered');
        }
        }

    public function logout()
    {
        if(Session::has('loginId'))
        {
            Session::pull('loginId');
            return redirect('login');
        }
    }
  
    
    public function deleteManager($id){
        Manager::where('id','=',$id)->delete();
        return redirect()->back()->with('success','Manager deleted successfully');
    }
    }


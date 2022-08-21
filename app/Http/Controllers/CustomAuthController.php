<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;


class CustomAuthController extends Controller
{
    public function login()
    {
        return view("login");
    }
    public function registration()
    {
        return view("registration");
    }
    public function registerUser(Request $request)
    {
       $request->validate([
        'name'=>'required',
        'email'=>'required|email|unique:users',
        'password'=>'required|min:5 max:12'

       ]);
       $user =new User();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password =Hash::make($request->password);
       $res = $user->save();
       if($res){
        return redirect()-> back()->with('success','you have resigtered successfully');
       }else{
        return redirect()-> back()->with('fail','Oh no!! something Wrong');
       }
    }
    public function loginUser(Request $request)
    {
        $request->validate([
            
            'email'=>'required|email',
            'password'=>'required|min:5 max:12'
        ]   );
     
    $user = User::where('email','=',$request->email)->first();
       if($user)
        {
            if (hash::check($request->password, $user->password))
            {
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
            }else
            {
                return back()->with('fail','Password not matches');
            }

        }else
        {
            return back()->with('fail','This email is not registered');
        }
        }
    public function dashboard()
    {   
        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view('dashboard',compact('data'));
    }
    
    public function logout()
    {
        if(Session::has('loginId'))
        {
            Session::pull('loginId');
            return redirect('login');
        }
    }
    public function information($id){
        $user = User::where('id','=',Session::get('loginId'))->first();
        return view('information',compact('user'));
    }
    public function saveinformation(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        User::where('id','=',$id)->update([
            'name' =>$name,
            'email'=>$email,
        ]);
        return redirect()->back()->with('success','Customer updated successfully');
    }
    public function deleteUser($id){
        Parfum::where('id','=',$id)->delete();
        return redirect()->back()->with('success','Product deleted successfully');
    }
    }


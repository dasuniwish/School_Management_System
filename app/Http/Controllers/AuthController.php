<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view('Auth.register');
    }

    public function registerPost(Request $request){
        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();
        return redirect('/teacher')->with('success','Register successfully');
    }

    public function login(){
        return view('Auth.login');
    }

    public function loginPost(Request $request){
        $credetials=[
            'email'=> $request->email,
            'password'=>$request->password,
        ];
        
        if(Auth::attempt($credetials)){
            return redirect('/teachers')->with('success','Login successfully');
        }
        return back()->with('error','Invalid Email or Password');
    }
    
}

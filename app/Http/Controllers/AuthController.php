<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show Register Page
    public function register()
    {
        return view('Auth.register');
    }

    // Handle Register Form Submit
    public function registerPost(Request $request)
    {
        // Validate fields with CUSTOM error messages
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ], [
            'email.unique' => 'Email already exists.', 
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'name.required' => 'Name is required.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 6 characters.',
        ]);
    
        // Create new user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
    
        return redirect('/teachers')->with('success', 'Registered successfully');
    }
    

    // Show Login Page
    public function login()
    {
        return view('Auth.login');
    }

    // Handle Login Form Submit
    public function loginPost(Request $request)
    {
        // Validate fields
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect('/teachers')->with('success', 'Login successfully');
        }

        return back()->with('error', 'Invalid Email or Password');
    }
}

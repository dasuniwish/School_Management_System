<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show Register Page
   /* public function register()
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
            'role' => 'required|in:admin,teacher,student',
        ], [
            'email.unique' => 'Email already exists.', 
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'name.required' => 'Name is required.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 6 characters.',
            'role.required' => 'Role is required.',

        ]);
    
        // Create new user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role; 
        $user->save();
    
Auth::login($user);
return redirect()->route('dashboard')->with('success', 'Welcome!');
    }*/
    

    // Show Login Page
    public function login()
    {
        return view('Auth.login');
    }

    // Handle Login Form Submit
    public function loginPost(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
    return redirect()->route('dashboard')->with('success', 'Welcome!');
}
    return back()->with('error', 'Invalid email or password.');
}

}

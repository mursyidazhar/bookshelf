<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // public function __construct()
    // {
    //    $this->middleware('guest'); 
    // }
    public function create()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:users'],
            'name' => ['required', 'string', 'min:6'],
            'password' => ['required', 'min:6'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        
        return redirect('/login')->with('account_created', 'Your account has been created successfully!');
    }
}

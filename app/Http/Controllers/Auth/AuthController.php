<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        // Illuminate\Auth\Middleware;
    	return view('auth.admin-login');
    }

    public function authenticate(Request $request)
    {
    	$this->validate($request,[
    		'email' => 'required|string|email|max:255|exists:users,email',
    		'password' => 'required',
    	]);

    	$credentials = $request->only('email', 'password');

        if (\Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }
        return back()->with('msg', 'Somethings went wrong!!');
    }

    public function logout(Request $request)
    {
    	\Auth::logout();
    	return redirect()->route('login');
    }
}

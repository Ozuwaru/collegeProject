<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login(){
        if(Auth::check()){
            return redirect()->intended('/');
        }
        return view('login');
    }
    public function loginF(Request $request){

        $request->validate([
        'email'=>'required|email|max:255|exists:users,email',
        'password'=>'required|string|min:8']);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
            //Auth::error_log
        }
    }
}

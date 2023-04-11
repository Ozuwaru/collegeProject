<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function register(){
        if(Auth::check()){
            return redirect()->intended('');
        }
        return view('register');
    }
    public function registerF(Request $request){
        
        $request->validate(['name'=>'required|string|max:255',
        'email'=>'required|email|max:255|unique:users',
        'password'=>'required|string|min:8']);

        $user= User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        
        //$credentials = $request->only('email', 'password');
        
        Auth::login($user);
        return redirect()->intended('');
    }
}

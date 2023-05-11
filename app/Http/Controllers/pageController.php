<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pageController extends Controller
{
    public function dashboard(){
        $user= User::find(Auth::id());
        
        if($user->hasRole("student")){
            $student= student::where('user_id',$user->id)->get();
            return redirect('courses');


        }else{
            return view('dashboard',['user'=>$user,'student'=>NULL]);  
            
        }
        
        //return view('dashboard',['user'=>$user]);  
    }
}

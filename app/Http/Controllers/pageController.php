<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pageController extends Controller
{
    public function dashboard(){
        $user= Auth::user();
        if($user->isStudent==true){
            $student= student::where('user_id',$user->id)->get();
            //dd($student->student_id);
            //$student= student::where('email',$user->email);
            return view('dashboard',['user'=>$user,'student'=>$student]);  


        }else{
            return view('dashboard',['user'=>$user,'student'=>NULL]);  
            
        }
    }
}

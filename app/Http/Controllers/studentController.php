<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('roleCheck', ['except' => ['create','store','show','edit','destroy']]);
    }
    
    public function index()
    {
        $students = student::get();
        
        $studentInfo = array();
        $c=0;
        foreach($students as $s){
            $name = User::where("id",$s['id'])->pluck("name")->first();
            $studentInfo[$c]=[
                "name"=>$name,
                "id"=>$s['id'],
                "semester"=>$s['semestre']
            ];
            $c++;
        }
        //dd($studentInfo);
        return view("general.students",["students"=>$studentInfo]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $user = User::find(Auth::id());
        if($user->isStudent==false){
            
            $student = new Student;
            $user->isStudent= true;
            $user->assignRole('student');
            $user->save();
            $student->semestre = 1;
            $student->user_id = $user->id;
            $student->save();
        }
        
        return redirect()->route('courses.create',['userID'=>$user->id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

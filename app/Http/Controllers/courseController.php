<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CoursePerStudent;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class courseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function save(Request $request,$id){
        $course = CoursePerStudent::find($id);
        $total=0;
        foreach($request->all("first_cut","second_cut","third_cut") as $key=> $value){
            if($value>20){
                $value = 20;
            }
            $course->$key= $value;
            $total+=$value;
        }
        $course->total = ($total)/3;
        $course->save();
        return redirect('courses');
    }

    public function index()
    {
        
        //$id= Auth::id();
        
        $student= student::where('user_id',Auth::id())->first();
        if($student!=NULL){

            //$studentCourses= CoursePerStudent::where('student_id', $student->id)->get();
            $studentCourses= CoursePerStudent::select('id','course_id','first_cut','second_cut','third_cut','total')->where('student_id', $student->id)->get();
            $c=0;
            $studentData= array();
            foreach($studentCourses as $data){
                $course = Course::where('id',$data->course_id)->first();
                $studentData[$c]= [
                        "id"=>$data->id,
                        "name"=>$course->course,
                        "seccion"=>$course->seccion,
                        "fir"=>$data->first_cut,
                        "sec"=>$data->second_cut,
                        "thi"=>$data->third_cut,
                        "total"=>$data->total,
                ];
                ++$c;
            }
            //dd($studentData);
            
            return view('courses.grades',['studentData'=>$studentData]);
        }else{
            return redirect('student.create');
        }
        //dd($studentCourses);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($userID=NULL)
    {
        if($userID==NULL){
            $userID = Auth::id();
        }
        $student= student::where('user_id',$userID)->first();
        $courses= Course::where('semestre',$student->semestre)->get();
        
        return view('courses/register',['courses'=>$courses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd();
        $id= Auth::id();
        $student = student::where('user_id',$id)->first();
        //dd($request);
        //dd($student);
        foreach($request->except('_token') as $course){


            $courseD = Course::where('id',$course)->first();
            $courseD->cupos--;
            $courseD->save();

            
            $registerCourses = new CoursePerStudent;

            $registerCourses->student_id = $student->id;
            $registerCourses->course_id = $course;
            $registerCourses->first_cut = 0;
            $registerCourses->second_cut = 0;
            $registerCourses->third_cut = 0;
            $registerCourses->total = 0;

            $registerCourses->save();
        }

        return $this->index($id);
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
        //dd($id);
        $course = CoursePerStudent::find($id);
        //dd($course);
        return view('courses.edit',['course'=>$course]);
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
        return $this->save($request,$id);
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

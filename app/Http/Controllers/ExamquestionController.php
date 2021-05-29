<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Exam;
use App\Match;
use App\Question;
use Illuminate\Support\Facades\DB;

class ExamquestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course)
    {
        $exam = Exam::all();
        return view('examquestion.index')->with('exams' ,$exam)
        ->with('questions',Question::all())->with("matches",Match::all())-with('course',$course);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show(Course $course , Exam $exam )
    {

       /* $exam = DB::table('exam')->join('course' , 'course.code' , '=', 'exam.course_code' )
        ->where('exam.course_code' , '=' ,$course->code)->select('exam.idexam')->get();
        */
        return view('examquestion.index', ['course'=>$course ,'exam'=>$exam]);
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

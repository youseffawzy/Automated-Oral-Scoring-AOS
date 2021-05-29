<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Course;
use App\User;
use App\Exam;
class CourseController extends Controller
{
    public function show(Request $request)
    {
  
            $course_code =$request->code;
            $course=DB::table('course')->join('exam','exam.course_code','=','course.code')
            ->join('make','make.exam_idexam','=','exam.idexam')
            ->join('users','users.id','=','make.users_id')
            ->select( 'exam.duration' ,'exam.ex_start' ,'exam.ex_end','exam.idexam' , 'exam.degree',
            DB::raw('(exam.name) as exam_name') , DB::raw('(users.fname) as fname'),
            DB::raw('(users.mname) as mname'),DB::raw('(users.lname) as lname'),'exam.num_of_mcq_e'
            ,'exam.num_of_mcq_n','exam.num_of_mcq_h','exam.num_of_match_e','exam.num_of_match_n'
            ,'exam.num_of_match_h','exam.num_of_complete_e','exam.num_of_complete_n','exam.num_of_complete_h')
            ->where('course.code',$course_code)->get();
            return response()->json($course[0] ,200);

    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
class StudentDoctorController extends Controller
{
    public function index(Request $request)
    {
       
         $code = $request->course_code;
        $users = $request->users_id;
        $student = DB::table('users')
        ->join('make','make.users_id','=','users.id')
        ->join('exam','exam.idexam','=','make.exam_idexam')
        ->join('exams_degree' , 'exams_degree.id_exam', '=' ,'exam.idexam')
        ->join('student' , 'student.id', '=','exams_degree.id_student')
        ->join('program','program.idprogram','=','student.program_idprogram')
        ->select('student.fname','student.mname','student.lname','program.name','student.id','exams_degree.degree_student')
        ->where('make.users_id',$users )
        ->where('exam.course_code',$code)->orderBy('exams_degree.degree_student', 'desc')->get();
        return response()->json($student ,200);
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Routing\ResponseFactory;
use App\Student;
use App\Program;
use App\study;
use App\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
class StudentController extends Controller
{
    public function show(Request $request)
  {
      
     
      $email=$request->email;
      $password=$request->password;
     
      $student = DB::table('student')->join('program','program.idprogram','=','student.program_idprogram')
      ->join('department','department.id','=','program.id_department')
            ->select('student.id','student.fname','student.lname','student.mname','student.photo','student.GPA','student.level', 'student.email','student.password','student.phone',DB::raw('(program.name) as program_name') , DB::raw('(department.name) as department_name'))->where('student.email',$email)->where('student.password',$password)->get();
            $course=DB::table('course')->join('study','course.code','=','study.course_code')->join('student','student.id','=','study.id_student')->select('course.code' , 'course.name')->where('study.id_student',$student[0]->id)->get();
            $st = $course->key = $course;
            $student[0]->course = $course;
            $arr = array_merge((array)$st, (array)$student[0]);
            return response()->json($student[0] ,200);

  }
  
}

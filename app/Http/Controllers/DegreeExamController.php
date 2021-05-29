<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Exams_degree;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
class DegreeExamController extends Controller
{
 public function index(Request $request)
  {
    $id_exam =$request->id_exam; 
    $id_student = $request->id_student;
    $degree_student = DB::table('exams_degree')
          ->select('exams_degree.degree_student')
          ->where('id_exam' , $id_exam)
          ->where('id_student',$id_student)
          ->exists();
    return response()->json($degree_student,200);  
  }
    public function store(Request $request)
    {
        $id_exam= $request->id_exam;
      $id_student = $request->id_student;
        $degree_student = $request->degree_student;
       
       $degree_student= DB::table('exams_degree')->insert([
           'id_exam' => $id_exam,
           'id_student' =>$id_student,
           'degree_student'=>$degree_student 
           ]);
        return response()->json($degree_student[0],200);
    }
}

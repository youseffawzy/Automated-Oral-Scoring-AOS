<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Match;

class MatchDoctorController extends Controller
{
    public function index(Request $request)
    {
        $course_code=$request->course_code;
        $users = $request->id;
        
       
    $match = DB::table('users')->join('make' ,'make.users_id','=','users.id')
    ->join('exam' , 'exam.idexam', '=' ,'make.exam_idexam')
    ->join('match' ,'match.exam_idexam' ,'=' ,'exam.idexam')
    ->join('course' ,'course.code','=','exam.course_code')
    ->select('exam.idexam','match.name','match.id_component')
    ->where('exam.course_code',$course_code)->where('users.id',$users)->get();
        
 foreach($match as $match1)
 {
        $match_question = DB::table('match')->join('match_true_answer' , 'match_true_answer.component_id' ,'=' , 'match.id_component')
        ->select( 'match_true_answer.question','match_true_answer.answer','match_true_answer.id_match')
        ->where('match_true_answer.component_id' , $match1->id_component)->get();
        $match1->questions = $match_question;
 }
 return response()->json($match ,200);
    }
    public function destroy(Request $request , Match $match)
    {
    
        $match->delete();
        return response()->json(null,204);
    }
}

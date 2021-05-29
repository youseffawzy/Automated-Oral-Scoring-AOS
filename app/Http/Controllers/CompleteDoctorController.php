<?php

namespace App\Http\Controllers;
use App\Question;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class CompleteDoctorController extends Controller
{
    public function destroyy(Request $request , Question $question)
    {
        $question->delete();
        return response()->json(null ,204);
    }
    public function index(Request $request)
    {
        
        $course_code=$request->course_code;
        $users = $request->id;
        
       
    $question = DB::table('users')->join('make' ,'make.users_id','=','users.id')
    ->join('exam' , 'exam.idexam', '=' ,'make.exam_idexam')
    ->join('question' , 'question.id_exam','=','exam.idexam')
    
    ->join('course' ,'course.code','=','exam.course_code')
    ->select('question.q_text' ,'question.id' )
    ->where('exam.course_code',$course_code)->where('question.type' , 1)
    ->where('users.id',$users)->get();
    
    foreach($question as $question1)
    {
    $choices = DB::table('question')
    ->join('true_answer' , 'true_answer.question_id' , '=' , 'question.id')
    ->select('true_answer.answer_text' , 'true_answer.or' , 'true_answer.answer_id' )
    ->where('true_answer.question_id', $question1->id)->get();
    $question1->true_answer = $choices;
    
    }
    return response()->json($question ,200);
    
    }
    
}

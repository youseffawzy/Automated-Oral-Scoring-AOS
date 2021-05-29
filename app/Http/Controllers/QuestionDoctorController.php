<?php

namespace App\Http\Controllers;
use App\Question;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class QuestionDoctorController extends Controller
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
    ->join('true_answer' , 'true_answer.question_id' , '=' , 'question.id')
    ->join('course' ,'course.code','=','exam.course_code')
    ->select('exam.idexam','question.q_text' ,'question.id' ,'true_answer.answer_text')
    ->where('exam.course_code',$course_code)->where('question.type' , 2)->where('users.id',$users)->get();
    
    foreach($question as $question1)
    {
    $choices = DB::table('question')->join('choices' , 'choices.question_id' ,'=','question.id')
    ->select('choices.choices_text' )->where('choices.question_id', $question1->id)->get();
    
    $arrasdtring=[];
     foreach( $choices as  $choice)
        {
             $choice= $choice->choices_text;
              array_push($arrasdtring,$choice);
           
        }
         $question1->choices =$arrasdtring ;
         
    }
    return response()->json($question ,200);
    
    }
    
}

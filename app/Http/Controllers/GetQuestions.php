<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Question;
use App\Exam;
class GetQuestions extends Controller
{
    public function getquestion(Request $request)
    {
     $id_exam = $request->id_exam;

    $num_of_mcq_e = $request->num_of_mcq_e;
    $num_of_mcq_n = $request->num_of_mcq_n;
    $num_of_mcq_h = $request->num_of_mcq_h;
    
    $question = DB::table('exam')
    ->join('question' , 'question.id_exam','=','exam.idexam')
    ->join('true_answer' , 'true_answer.question_id' , '=' , 'question.id')
    ->select('exam.idexam','question.q_text' ,'question.id' ,'true_answer.answer_text','question.pority' )
    ->where('question.id_exam',$id_exam)->where('question.type' , 2)->where('question.pority' , 'easy')
    ->inRandomOrder()->limit($num_of_mcq_e)->get();

    foreach($question as $question1)
    {
        $choices = DB::table('question')
        ->join('choices' , 'choices.question_id' ,'=','question.id')
        ->select('choices.choices_text' )
        ->where('choices.question_id', $question1->id)->get();

        $arrasdtring=[];
        foreach( $choices as  $choice)
            {
                $choice= $choice->choices_text;
                array_push($arrasdtring,$choice);
            
            }
            $question1->choices =$arrasdtring ;
    }
    $questionn = DB::table('exam')
    ->join('question' , 'question.id_exam','=','exam.idexam')
    ->join('true_answer' , 'true_answer.question_id' , '=' , 'question.id')
    ->select('exam.idexam','question.q_text' ,'question.id' ,'true_answer.answer_text','question.pority' )
    ->where('question.id_exam',$id_exam)->where('question.type' , 2)->where('question.pority' , 'normal')
    ->inRandomOrder()->limit($num_of_mcq_n)->get();

    foreach($questionn as $question1)
    {
    $choicess = DB::table('question')
    ->join('choices' , 'choices.question_id' ,'=','question.id')
    ->select('choices.choices_text' )
    ->where('choices.question_id', $question1->id)->get();

    $arrasdtring=[];
    foreach( $choicess as  $choice)
        {
            $choice= $choice->choices_text;
            array_push($arrasdtring,$choice);
        
        }
        $question1->choices =$arrasdtring ;
        
    }

        $questionn1 = DB::table('exam')
    ->join('question' , 'question.id_exam','=','exam.idexam')
    ->join('true_answer' , 'true_answer.question_id' , '=' , 'question.id')
    ->select('exam.idexam','question.q_text' ,'question.id' ,'true_answer.answer_text','question.pority' )
    ->where('question.id_exam',$id_exam)->where('question.type' , 2)->where('question.pority' , 'hard')
    ->inRandomOrder()->limit($num_of_mcq_h)->get();

    foreach($questionn1 as $question1)
    {
    $choicess1 = DB::table('question')
    ->join('choices' , 'choices.question_id' ,'=','question.id')
    ->select('choices.choices_text' )
    ->where('choices.question_id', $question1->id)->get();

    $arrasdtring=[];
    foreach( $choicess1 as  $choice)
        {
            $choice= $choice->choices_text;
            array_push($arrasdtring,$choice);
        
        }
        $question1->choices =$arrasdtring ;
        
    }
    $k=[];
    $m=[];
    foreach($question as $k)
        {
        array_push($m,$k);
        }
        foreach($questionn as $k)
        {
        array_push($m,$k);
        }
        foreach($questionn1 as $k)
        {
        array_push($m,$k);
        }
        return response()->json($m ,200);
        }
    }

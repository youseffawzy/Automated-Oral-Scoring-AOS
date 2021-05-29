<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class getmatchController extends Controller
{
    public function index(Request $request)
    {
       $num_of_match_e= $request->num_of_match_e;
       $num_of_match_n= $request->num_of_match_n;
       $num_of_match_h= $request->num_of_match_h;
        
        $idexam = $request->id_exam;
       $match = DB::table('exam')->join('match' ,'match.exam_idexam' ,'=' ,'exam.idexam')
       ->select('match.name' , 'match.id_component','match.priority' )->where('exam.idexam',$idexam)
       ->where('match.priority' ,'easy')->inRandomOrder()->limit($num_of_match_e)->get();
       foreach($match as $match1)
       {
              $match_question = DB::table('match')->join('match_true_answer' , 'match_true_answer.component_id' ,'=' , 'match.id_component')->select( 'match_true_answer.question','match_true_answer.answer','match_true_answer.id_match')->where('match_true_answer.component_id' , $match1->id_component)->get();
              $match1->questions = $match_question;
       }
   
       $matchn = DB::table('exam')->join('match' ,'match.exam_idexam' ,'=' ,'exam.idexam')
       ->select('match.name' , 'match.id_component','match.priority' )->where('exam.idexam',$idexam)->where('match.priority' ,'normal')
       ->inRandomOrder()->limit($num_of_match_n)->get();
       foreach($matchn as $match1)
       {
              $match_question = DB::table('match')->join('match_true_answer' , 'match_true_answer.component_id' ,'=' , 'match.id_component')->select( 'match_true_answer.question','match_true_answer.answer','match_true_answer.id_match')->where('match_true_answer.component_id' , $match1->id_component)->get();
              $match1->questions = $match_question;
       }
   
       $matchn1 = DB::table('exam')->join('match' ,'match.exam_idexam' ,'=' ,'exam.idexam')
       ->select('match.name' , 'match.id_component','match.priority' )->where('match.priority' ,'hard')
       ->where('exam.idexam',$idexam)->inRandomOrder()->limit($num_of_match_h)->get();
       foreach($matchn1 as $match1)
       {
              $match_question = DB::table('match')->join('match_true_answer' , 'match_true_answer.component_id' ,'=' , 'match.id_component')->select( 'match_true_answer.question','match_true_answer.answer','match_true_answer.id_match')->where('match_true_answer.component_id' , $match1->id_component)->get();
              $match1->questions = $match_question;
       }
    
       $k=[];
       $m=[];
    foreach($match as $k)
    {
     array_push($m,$k);
    }
     foreach($matchn as $k)
    {
     array_push($m,$k);
    }
     foreach($matchn1 as $k)
    {
     array_push($m,$k);
    }
    return response()->json($m ,200);
    }
    
}

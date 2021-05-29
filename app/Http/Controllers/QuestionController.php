<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Exam;
use App\Course;
use App\Choices;
use App\True_answer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Question\Question as QuestionQuestion;

class QuestionController extends Controller
{
    public function __construct()
    {

        $this->middleware('CheckExam')->only('create');
    }
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Course $course,Exam $exam )
    {
        
        $search=request()->query('search');
        if($search)
        {
           $question = DB::table('exam')
           ->join('question' ,'question.id_exam' ,'=' ,'exam.idexam')
           ->where('exam.idexam','=',$exam->idexam)
           ->where('question.q_text','LIKE',"%{$search}%")
           ->where('question.type' ,'=',2)
           ->get(); 
        }
        else
        {
            $question= Question::all()
            ->where('id_exam' ,'=',$exam->idexam)
            ->where('type' ,'=',2);
        }
        return view('questions.index', ['course'=>$course ,'exam'=>$exam , 'questions'=>$question]);
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course,Exam $exam )
    {
        return view ('questions.create',['course'=>$course , 'exam'=>$exam],compact('exam'))->with('questions', Question::all());
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Course $course, Exam $exam, Request $request)
    {
        $this->validate(request(),[
            'q_text'=>'required',
            
            'pority'=>'required',
            'choices_text'=>'required',
            'answer_text'=>'required',
            ['type'=>2],
        ]);
        $type = 2;
        $data = request()->all();
        $question = new Question();
        $question->q_text=$data['q_text'];
        $question->pority=$data['pority'];
        $question->type = $type;
        $question->id_exam=$exam->idexam;
        $question->save();
        foreach($request->choices_text as $item=>$v)
           {
               $choices = DB::table('choices')->join('question' , 'question.id' ,'=','choices.question_id')->insert([
                   'choices.choices_text'=>$request->choices_text[$item],
                   'question_id'=>$question->id
               ]);
           }
           $true = DB::table('true_answer')->insert([
            'answer_text'=>$request->answer_text,
            'question_id'=>$question->id
        ]);
         
      
         session()->flash('sucess' , 'question created sucess');
        return redirect('/course/'.$course->code.'/exams/'.$exam->idexam.'/examquestion/questions');
    }


    

    public function edit(Course $course,Exam $exam , Question $question)
    {
        $choices  = DB::table('choices')->where('choices.question_id',$question->id )->get();
        $true_answer = DB::table('true_answer')->where('true_answer.question_id',$question->id )->get();        
        return view('questions.update', ['course'=>$course, 'exam'=>$exam,'questions'=>$question ,'choices'=>$choices,'true_answer'=>$true_answer ]);     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Course $course, Exam $exam , Question $question, Choices $choices,True_answer $true_answer)
    {
        
            $this->validate($request,[
            'pority'=>'required',
            'q_text'=>'required',
            'choices_text'=>'required',
            'answer_text'=>'required'
            ]);
            $data = request()->all();
        
            $question1 = Question::where('id',$question->id)->update([
                  'q_text'=>$request->input('q_text'),
                  'pority'=>$request->input('pority')
              ]);
              $choices1 =DB::table('choices')->
              join('question' ,'question.id' , '=' ,'choices.question_id')->
              where('choices.question_id',$question->id)->delete();
           
        
             foreach($request->choices_text as $index => $value)
             {
                $choices = DB::table('choices')->join('question' , 'question.id' ,'=','choices.question_id')->insert([
                    'choices.choices_text'=>$request->choices_text[$index],
                    'question_id'=>$question->id
                ]);
            //    $choices =DB::table('choices')
            //    ->join('question' ,'question.id' , '=' ,'choices.question_id')
            //    ->where('choices.idchoices',$choices1[$index]->idchoices)->update([
                   
            //       'choices_text'=>$request->choices_text[$index]
      

        
               
             
          }
          $true_answer =DB::table('true_answer')->
          join('question' ,'question.id' , '=' ,'true_answer.question_id')
          ->where('true_answer.question_id',$question->id)->update([
              
             'answer_text'=>$request->answer_text
 
             
          ]);
      
        
          session()->flash('sucess' , 'question updated sucess');


        return redirect('/course/'.$course->code.'/exams/'.$exam->idexam.'/examquestion/questions');
      
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course,Exam $exam , Question $question)
    {
      
        $question->delete();
        session()->flash('success', 'question deleted successfuly');
        return redirect('/course/'.$course->code.'/exams/'.$exam->idexam.'/examquestion/questions');
       
    }
}

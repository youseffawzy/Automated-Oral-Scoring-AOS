<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Course;
use App\Exam;
use App\Question;
use App\True_answer;

class CompleteController extends Controller
{
    public function indexx(Request $request)
    {
        $id_exam = $request->id_exam;
        $num_of_complete_e = $request->num_of_complete_e;
        $num_of_complete_n = $request->num_of_complete_n;
        $num_of_complete_h = $request->num_of_complete_h;
        $complete = DB::table('exam')->join('question' ,'question.id_exam','=','exam.idexam')
        ->select('question.q_text' , 'question.id' ,'question.type' , 'question.pority')
        ->where('question.id_exam',$id_exam)
        ->where('question.type','=',1)->where('pority' , 'easy')->inRandomOrder()->limit($num_of_complete_e)->get();
        foreach($complete as $complete1)
        {
            $true_answer=DB::table('question')->join('true_answer' ,'true_answer.question_id' ,'=' ,'question.id')->select('true_answer.answer_text', 'true_answer.or','answer_id')->where('true_answer.question_id',$complete1->id)->get();
        
            $complete1->true_answer = $true_answer;
        }
        $completen = DB::table('exam')->join('question' ,'question.id_exam','=','exam.idexam')->select('question.q_text'  , 'question.id' ,'question.type' ,'question.pority')->where('question.id_exam',$id_exam)->where('question.type','=',1)->where('pority' , 'normal')->inRandomOrder()->limit($num_of_complete_n)->get();
        foreach($completen as $complete1)
        {
            $true_answer=DB::table('question')->join('true_answer' ,'true_answer.question_id' ,'=' ,'question.id')->select('true_answer.answer_text', 'true_answer.or','answer_id')->where('true_answer.question_id',$complete1->id)->get();
        
            $complete1->true_answer = $true_answer;
        }
        
        $completen1 = DB::table('exam')->join('question' ,'question.id_exam','=','exam.idexam')->select('question.q_text'  , 'question.id' ,'question.type','question.pority')->where('question.id_exam',$id_exam)->where('question.type','=',1)->where('pority' , 'hard')->inRandomOrder()->limit($num_of_complete_h)->get();
        foreach($completen1 as $complete1)
        {
            $true_answer=DB::table('question')->join('true_answer' ,'true_answer.question_id' ,'=' ,'question.id')->select('true_answer.answer_text', 'true_answer.or','answer_id')->where('true_answer.question_id',$complete1->id)->get();
        
            $complete1->true_answer = $true_answer;
        }
        $s=[];
$k=[];
$m=[];
  foreach($complete as $k)
    {
     array_push($m,$k);
    }
     foreach($completen as $k)
    {
     array_push($m,$k);
    }
     foreach($completen1 as $k)
    {
     array_push($m,$k);
    }
    return response()->json($m ,200);

        

    }
    public function index(Course $course , Exam $exam)
    {
      
        $search=request()->query('search');
        if($search)
        {
            $question = DB::table('exam')->join('question' ,'question.id_exam' ,'=' ,'exam.idexam')
           ->where('exam.idexam','=',$exam->idexam)->where('question.q_text','LIKE',"%{$search}%")->where('question.type' ,'=',1)->get();
        }
        else
        {
            $question= Question::all()->where('id_exam' , '=',$exam->idexam)->where('type' ,'=',1);
        }
        return view ( 'completes.index',['course'=>$course,'questions'=>$question],compact('exam') , compact('question'))->with('exams',Exam::all());
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course , Exam $exam )
    {
        //
        //$exam = Exam::all();
        return view ('completes.create',['course'=>$course],compact('exam'))->with('questions', Question::all())->with('exams' ,Exam::all());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Course $course ,  Exam $exam, Request $request)
    {
        $this->validate(request(),[
            'q_text'=>'required',
            
            'pority'=>'required',
            'answer_text'=>'required',
            'or'=>'required',
            ['type'=>1],
        ]);
        $type = 1;
        $data = request()->all();
        $question = new Question();
        $question->q_text=$data['q_text'];

        $question->pority=$data['pority'];
        $question->type = $type;
        $question->id_exam=$exam->idexam;
        $question->save();
      foreach($request->answer_text as $item=>$v)
           {
            $true = DB::table('true_answer')->insert([
                'answer_text'=>$request->answer_text[$item],
                'question_id'=>$question->id,
                'or'=>$request->or[$item],
            ]);
             
           }
           

           
      
         session()->flash('sucess' , 'completes question created sucess');
        return redirect('/course/'.$course->code.'/exams/'.$exam->idexam.'/examquestion/completes');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course , Exam $exam , Question $question)
    {
        
        $true_answer = DB::table('true_answer')->where('true_answer.question_id',$question->id )->get();
        return view('completes.update', ['course'=>$course, 'exam'=>$exam,'questions'=>$question,'true_answer'=>$true_answer]);     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Course $course ,  Exam $exam , Question $question,True_answer $true_answer)
    {
        $this->validate($request,[
            'pority'=>'required',
            'q_text'=>'required',
            'or'=>'required',
            'answer_text'=>'required'
            ]);
            $data = request()->all();
        
            $question1 = Question::where('id',$question->id)->update([
                  'q_text'=>$request->input('q_text'),
                  'pority'=>$request->input('pority')
              ]);
            //   $true_answer1 =DB::table('true_answer')->
            //   join('question' ,'question.id' , '=' ,'true_answer.question_id')->
            //   where('true_answer.question_id',$question->id)->get();
                $true_answer1 =DB::table('true_answer')->
               join('question' ,'question.id' , '=' ,'true_answer.question_id')->
               where('true_answer.question_id',$question->id)->delete();
        
             foreach($request->answer_text as $index => $value)
             {
              
               
        //        $true_answer =DB::table('true_answer')->
        //   join('question' ,'question.id' , '=' ,'true_answer.question_id')
        //   ->where('true_answer.answer_id',$true_answer1[$index]->answer_id)->update([
              
        //      'answer_text'=>$request->answer_text[$index],
        //      'or'=>$request->or[$index]             
        
        $true = DB::table('true_answer')->insert([
            'answer_text'=>$request->answer_text[$index],
            'question_id'=>$question->id,
            'or'=>$request->or[$index],
        ]);
             
          }
          
        return redirect('/course/'.$course->code.'/exams/'.$exam->idexam.'/examquestion/completes');
      
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course , Exam $exam , Question $question)
    {
      
        $question->delete();
        session()->flash('success', 'completes deleted successfuly');
        return redirect('/course/'.$course->code.'/exams/'.$exam->idexam.'/examquestion/completes');
       
    }



}

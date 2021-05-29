<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Course;
use App\Match;
use App\Exam;
use App\Match_true_answer;
use App\Http\Controllers\Controller;
class MatchController extends Controller
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
    public function index(Course $course , Exam $exam)
    {
        $search=request()->query('search');
        if($search)
        {

        $match = DB::table('exam')->join('match' ,'match.exam_idexam' ,'=' ,'exam.idexam')
        ->where('exam.idexam',$exam->idexam)->where('match.name','LIKE',"%{$search}%")->get();
                }
        else{
            $match=Match::all()->where('exam_idexam' , '=',$exam->idexam);;
        }
        return view ( 'matches.index',compact('exam'),['matches'=>$match , 'course'=>$course])
        ->with('matches' ,$match)->with('exams' , Exam::all());
     

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course , Exam $exam)
    {
        $true_match = Match_true_answer::all();
        return view ('matches.create',[ 'course'=>$course],compact('exam'))
        ->with('exams' ,Exam::all())->with('matches',Match::all())
        ->with('match_true_answer',$true_match);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,Course $course , Exam $exam)
    {
        $this->validate(request(),[
            'name'=>'required',
            'priority'=>'required',
            'question'=>'required',
            'answer'=>'required',
        ]);
        $data = request()->all();
       $match = new Match;
       $match->name=$data['name'];
       $match->priority=$data['priority'];
       $match->exam_idexam=$exam->idexam;
       $match->save();
       foreach($request->question as $item=>$v)
       {
           
        $data2=array(
            'question'=>$request->question[$item],
            'answer'=>$request->answer[$item],

            'component_id'=>$match->id_component,
        );
          Match_true_answer::insert($data2);
    }
       
     session()->flash('sucess' , 'match question created sucess');
    return redirect('/course/'.$course->code.'/exams/'.$exam->idexam.'/examquestion/matches');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course , Exam $exam ,Match $match)
    {
        $match_true_answer = DB::table('match_true_answer')->where('match_true_answer.component_id',$match->id_component)->get();
        return view('matches.update' , ['match' => $match , 'course'=>$course, 'match_true_answer'=>$match_true_answer ,
        'exam'=>$exam]);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , Course $course , Exam $exam ,Match $match , Match_true_answer $match_true_answer)
    {
       
        $this->validate(request(),[
            'name'=>'required',
            'priority'=>'required',
            'question'=>'required',
            'answer'=>'required',   
        ]);
        $data = request()->all();
        
  
      $match1 = Match::where('id_component',$match->id_component)->update([
            'name'=>$request->input('name'),
            'priority'=>$request->input('priority')
        ]);
        // $match_true_answer1 =DB::table('match_true_answer')->
        //  join('match' ,'match.id_component' , '=' ,'match_true_answer.component_id')->
        //  where('match_true_answer.component_id',$match->id_component)->get();
        $match_true_answer1 =DB::table('match_true_answer')->
          join('match' ,'match.id_component' , '=' ,'match_true_answer.component_id')->
          where('match_true_answer.component_id',$match->id_component)->delete();
         
     
       foreach($request->question as $index => $value)
       {
        
        //  $match_true_answer =DB::table('match_true_answer')->
        //  join('match' ,'match.id_component' , '=' ,'match_true_answer.component_id')
        //  ->where('match_true_answer.id_match',$match_true_answer1[$index]->id_match)->update([
        //      'question'=>$request->question[$index],
        //     'answer'=>$request->answer[$index]
            
        //  ]);
        $data2=array(
            'question'=>$request->question[$index],
            'answer'=>$request->answer[$index],

            'component_id'=>$match->id_component,
        );
          Match_true_answer::insert($data2);
         
       
    }

       
     session()->flash('sucess' , 'match question created sucess');
    return redirect('/course/'.$course->code.'/exams/'.$exam->idexam.'/examquestion/matches');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course , Exam $exam , Match $match)
    {
      
        $match->delete();
        session()->flash('success', 'question deleted successfuly');
        return redirect('/course/'.$course->code.'/exams/'.$exam->idexam.'/examquestion/matches');
       
    }
}

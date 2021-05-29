<?php

namespace App\Http\Controllers;
use App\Http\Requests\ExamRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exam;
use App\Course;
use App\Make;
use App\Http\Controllers\Controller;
class ExamController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course)
    {
      
       
        $search=request()->query('search');
        if($search)
        {
            $exam=Exam::where('name','LIKE',"%{$search}%")->get();
        }
        else
        {
            $users = auth()->user()->id;
            $exam = DB::table('users')->join('make' , 'users.id' , '=' , 'make.users_id')->join('exam' , 'exam.idexam' , '=' , 'make.exam_idexam')
            ->where('users.id', '=', $users)->where('exam.course_code','=',$course->code)->get();

            if(is_null($exam))
            {
                return null;
            }
        }
       
       return view('exams.index',['exams'=>$exam , 'course'=>$course]);
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        //
        return view('exams.create',[ 'course'=>$course])->with('exams',Exam::all());
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Course $course)
    {
        $this->validate(request(),[
            'name'=>'required',
            'degree'=>'required',
            'duration'=>'required',
            'ex_start'=>'required',
            'ex_end'=>'required',
            'num_of_mcq_e'=>'required',
            'num_of_match_e'=>'required',
            'num_of_complete_e'=>'required',
            'num_of_mcq_n'=>'required',
            'num_of_match_n'=>'required',
            'num_of_complete_n'=>'required',
            'num_of_mcq_h'=>'required',
            'num_of_match_h'=>'required',
            'num_of_complete_h'=>'required',
        ]);
        $data = request()->all();
      $exam = new Exam;
      $exam->name=$data['name'];
      $exam->degree=$data['degree'];
      $exam->duration=$data['duration'];
      $exam->ex_start=$data['ex_start'];
      $exam->ex_end=$data['ex_end'];
      $exam->course_code=$course->code;
      $exam->num_of_mcq_e=$data['num_of_mcq_e'];
      $exam->num_of_match_e=$data['num_of_match_e'];
      $exam->num_of_complete_e=$data['num_of_complete_e'];
      $exam->num_of_mcq_n=$data['num_of_mcq_n'];
      $exam->num_of_match_n=$data['num_of_match_n'];
      $exam->num_of_complete_n=$data['num_of_complete_n'];
      $exam->num_of_mcq_h=$data['num_of_mcq_h'];
      $exam->num_of_match_h=$data['num_of_match_h'];
      $exam->num_of_complete_h=$data['num_of_complete_h'];
      $exam->save();
      $lastid1 = auth()->user()->id;
 
    $make = new Make;
    $make->exam_idexam = $exam->idexam;
    $make->users_id=$lastid1;
    $make->save();

         session()->flash('sucess' , 'exams created sucess');
        return redirect('/course/'.$course->code.'/exams/'.$exam->idexam.'/examquestion/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course, Exam $exam)
    {
      
         $route1= view('examquestion.show',['course'=> $course],compact('exams',$exam));
          return $route1; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course,Exam $exam)
    {
       // $route1= view('examquestion.show',['course'=> $course],compact('exams',$exam));

        return view('exams.update',['course'=>$course])->with('exam',$exam);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course , Exam $exam)
    {
        
        $exam->update([
            'name' => $request->name, 
            'duration' =>$request->duration,
            'ex_start' =>$request->ex_start,
            'ex_end' =>$request->ex_end,
            'pority' =>$request->pority,
            'num_of_mcq_e'=>$request->num_of_mcq_e,
            'num_of_match_e'=>$request->num_of_match_e,
            'num_of_complete_e'=>$request->num_of_complete_e,
            'num_of_mcq_n'=>$request->num_of_mcq_n,
            'num_of_match_n'=>$request->num_of_match_n,
            'num_of_complete_n'=>$request->num_of_complete_n,
            'num_of_mcq_h'=>$request->num_of_mcq_h,
            'num_of_match_h'=>$request->num_of_match_h,
            'num_of_complete_h'=>$request->num_of_complete_h,
        ]);
       

        session()->flash('success', 'exam updated successfuly');
        return redirect('/course/'.$course->code.'/exams/');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course , Exam $exam)
    {
        $exam->delete();
        session()->flash('success', 'exam deleted successfuly');
        return redirect('/home/');
    }
}

<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCourseRequest;
use App\Course;
use DB;
use View;
use Auth;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        
     


        $user_id = Auth::user()->id;
        $course= DB::table('course')
        ->join('teach', 'course.code', '=', 'teach.course_code')
        ->join('users', 'users.id', '=', 'teach.users_id')
        ->select('course.name','course.code')
        ->where('users.id','=',$user_id)
        ->get();
         
       if(count ($course)>0){
            foreach ($course as $course1) {                
            $user = DB::table('exam')->join('course' ,'course.code','=','exam.course_code')
            ->join('teach' ,'teach.course_code' ,'=' ,'course.code')
            ->join('users' ,'users.id','=','teach.users_id')
            ->where('users.id' , $user_id)->where('course.code',$course1->code)->exists();
            $course1->user = $user;
            }
         return view('home',['user'=>$user,'course'=>$course])->with($user_id);
        }
        else
        {
            return view('home',['course'=>$course])->with($user_id);
        }
    
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        session()->flash('success','deleted successfuly');
        return redirect(route('home'));
    }
    

}

/*
<!-- for login form validation -->
    public function create()
    {
        return view('login');
    }
  
    public function store(Request $request)
    {
        $request->validate([
                'password' => 'required|min:5',
                'email' => 'required|email|unique:users'
            ], [
                'email.required' => 'Name is required',
                'password.required' => 'Password is required'
            ]);
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
    
        return back()->with('success', 'User created successfully.');
    }
*/


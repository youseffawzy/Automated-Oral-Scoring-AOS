<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Client;

class DoctorController extends Controller
{
    public function index()
    {
        return view('users.index')->with('users' ,User::all());
    }
    public function makeAdmin(User $user) {
        $user->role = "admin";
        $user->save();
        return redirect(route('users.index'));
      }
    
      public function edit(User $user) {
        $profile = $user->profile;
        return view('users.profile', ['user' => $user, 'profile' => $profile]);
      }
    
      public function update(User $user, Request $request) {
        $profile = $user->profile;
        $data = $request->all();
        if ($request->hasFile('picture')) {
          $picture = $request->picture->store('profilesPicture', 'public');
          $data['picture'] = $picture;
        }
        $profile->update($data);
        return redirect(route('home'));
      }
      private $client;
      public function __construct()
      {
        $this->client=Client::find(1);
      }
      public function show(Request $request)
      {
          $validatedata = $request->validate([
            'email'=>'email|required',
            'password'=>'required'
          ]);
          $param=[
            'grant_type'=>'password',
            'client_id'=>$this->client->id,
            'client_secret'=>$this->client->secret,
            'email'=>request('email'),
            'password'=>request('password'),
            'scope'=>'*'

          ];
          $request->request->add($param);
          if(!auth()->attempt($validatedata))
          {
            return response(['message'=>'invalid credentails']);
          }
          $accessToken=auth()->user()->createToken('authToken')->accessToken;
       
          
               
        $users = DB::table('users')->join('profiles','profiles.id','=','profiles.users_id')
        ->join('department','department.id','=','users.id_department')
        ->join('program','program.idprogram','=','program.id_department')
        ->select('users.id','users.fname','users.lname','users.mname','profiles.picture',
         'users.email',DB::raw('(program.name) as program_name') ,
          DB::raw('(department.name) as department_name'))->where('users.email',auth()->user()->email)->get();
              $course=DB::table('course')
              ->join('teach','course.code','=','teach.course_code')
              ->join('users','users.id','=','teach.users_id')
              ->select('course.code' , 'course.name')
              ->where('teach.users_id',$users[0]->id)->get();
              $st = $course->key = $course;
              $users[0]->course = $course;
              $arr = array_merge((array)$st, (array)$users[0]);

              
              return response()->json($users[0] ,200);  
      }
      public function refresh(Request $request)
      {
         $this->validate($request,['refresh_token'=>'required']);
        
        
        $param=[
          'grant_type'=>'refresh_token',
          'client_id'=>$this->client->id,
          'client_secret'=>$this->client->secret,
          'email'=>request('email'),
          'password'=>request('password')

        ];
        $request->request->add($param);
        
        $proxy = Request::create('oauth/token', 'POST');
  
        return Route::dispatch($proxy);
        
      }
      public function logout(Request $request)
      {
        $accessToken=Auth::user()->token();
        DB::table('oauth_access_tokens')->where('id',$accessToken->id)
        ->update(['revoked'=>true]);
        $accessToken->revoke();
        return response()->json([],204);

      }
    
} 

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;
use App\Question;
use App\Match;
use App\Course;

class AdminController extends Controller
{
    public function courses(Coures $course , Exam $exam )
    {
        $user_id = Auth::user()->id;
        return view ('home')-with('user',$user_id);

    }

    
}

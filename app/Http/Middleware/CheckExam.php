<?php

namespace App\Http\Middleware;

use Closure;
use App\Exam;

class CheckExam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $count = Exam::all()->count();
        if($count ==0)
        {
            session()->flash('error','first you need to add exams');
            return redirect('exams/create');
        }
        return $next($request);
    }
}

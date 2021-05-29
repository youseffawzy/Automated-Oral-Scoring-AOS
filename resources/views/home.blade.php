@extends('layouts.master')
@section('title')
AOS Dashboard-Home
@endsection
@section('content')
<!DOCTYPE html>
<html lang="en" style="width:100%; height: auto; min-width:1000px;">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--===============================================================================================-->
                                        <!-- styles -->
        <link rel="stylesheet" href="{{asset('Hover-master/css/hover.css')}}">
        <link rel="stylesheet" href="{{asset('Hover-master/css/hover-min.css')}}">
        <link href="{{asset('homepage/styles.css')}}" rel="stylesheet">
        <!--===============================================================================================-->
    </head>
<body>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Courses</h4>
        </div>
        <div class="card-body">           
             
            <ul style="list-style: none; margin: 0;padding: 0;">    
                @foreach($course as $course)
                    <li style="display:inline-block;padding:15px">
                        
                    @if($course->user == true)
                        <div class="ca" style="width:100%;">
                            <div class="ca-img">
                                <a class=" hvr-fade hvr-shutter-out-horizontal" style="background-color:#0C2543;border: none; color: white; height:70px;width:70%; padding: 15px; text-align: center;  text-decoration: none; display: inline-block; font-size: 16px;margin: 0px 0px;border-radius: 50%;position:relative;top:15px;left:5px" href="/course/{{$course->code}}/exams"  role="button"  >
                                    <span style="position:relative;bottom:5px;font-size:12px;"> Comp {{$course->code}}</span>
                                </a>
                            </div>
                            <div>
                            <a href="/course/{{$course->code}}/exams" style="position:relative;float:left;bottom:50px;left:15px;font-size:16px;font-weight:bold;;color:#0C2543;text-decoration:none;">{{$course->name}}</a>
                            </div>
                        </div> 
                                  
                        @else
                            <div class="ca" style="width:100%;">
                            <div class="ca-img">
                            <a class=" hvr-fade hvr-shutter-out-horizontal" style="background-color:#0C2543;border: none; color: white; height:70px;width:70%; padding: 15px; text-align: center;  text-decoration: none; display: inline-block; font-size: 16px;margin: 0px 0px;border-radius: 50%;position:relative;top:15px;left:5px" href="/course/{{$course->code}}/exams/create"  role="button"  >
                                <span style="position:relative;bottom:5px;font-size:12px;">  Comp {{$course->code}} </span>
                            </a>
                                <div>
                                    <a   href="/course/{{$course->code}}/exams/create" style="position:relative;float:left;top:35px;left:15px;font-size:16px;font-weight:bold;color:#0C2543;text-decoration:none;">{{$course->name}}</a>
                                </div>
                            </div>   
                        @endif
                           
                    </li>           
                @endforeach
                </ul>
        </div>
    </div>       
    
</body>
</html>
@endsection
@section('scripts')
@endsection
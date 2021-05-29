@extends('layouts.master')
@section('title')
Exam Questions` types
@endsection
@section('content')
<!DOCTYPE html>
<html lang="en" style="width:100%; height: auto; min-width:1000px;">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--===============================================================================================-->	
                                        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <!--===============================================================================================-->
                                        <!-- Styles -->	
        <link rel="stylesheet" href="{{asset('examques/e.css')}}" type="text/css"> 
        <!--===============================================================================================-->
                                        <!-- packages -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->                                    
    </head>

<body>
    <div class="card card-default " style="background-color:#fff">
        <div class="card-header " style="background-color:#fff;font-size:22px;"> Choose type of questions in Exam  </div>
            <div class="card-body " style="background-color:#fff	">
                <div class="section" style="background-color:#fff">
	                <div class="section__item">
		                <div class="section__box">
                            <a href="/course/{{$course->code}}/exams/{{$exam->idexam}}/examquestion/questions" class="r-link ai-element ai-element_type3 ai-element9" style="position: absolute;left: 220px;bottom:200px;border-radius: 12px;">
                                <span class="ai-element__label">TF || MCQ</span>
                            </a>
                            <a href="/course/{{$course->code}}/exams/{{$exam->idexam}}/examquestion/matches" class="r-link ai-element ai-element_type3 ai-element9" style="left:65px;bottom:65px;border-radius: 12px;">
                                <span class="ai-element__label">Match</span>
                            </a>
                            <a href="/course/{{$course->code}}/exams/{{$exam->idexam}}/examquestion/completes" class="r-link ai-element ai-element_type3 ai-element9"style="left:160px;right:80px;bottom:65px;border-radius: 12px;">
                                <span class="ai-element__label">Complete</span>
                            </a>
		                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
@endsection
@section('scripts')
@endsection

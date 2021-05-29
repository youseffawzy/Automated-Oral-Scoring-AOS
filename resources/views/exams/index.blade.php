@extends('layouts.master')
@section('title')
All Exams
@endsection
@section('content')
<!DOCTYPE html>
<html lang="en" style="width:100%; height: auto; min-width:1000px;">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--===============================================================================================-->
                                        <!-- Styles -->
        <link href="{{asset('exaam/styles.css')}}" rel="stylesheet">
        <!--===============================================================================================-->
                                        <!-- packages -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> 
        <!--===============================================================================================-->
    </head>
<body class="bo">
    <div class="ca" style="width:50%;margin:15px;position:relative;left:250px;bottom:50px">
      <div class="ca-img"></div>
      <div div class="ca-txt">
        @if(count($exams)>0)
          @foreach ($exams as $exam)
          <table class="table" style="color:#131d38;">

            <tr><td><span class="first"> Exam Name :    </span><span class="second">{{ $exam->name }} </span></td></tr>
            <tr><td><span class="first"> Course Code :  </span><span class="second">{{ $exam->course_code }}</span></td></tr>
            <tr><td><span class="first"> degree :       </span><span class="second" style="position:relative;right:6px">{{ $exam->degree }} </span></td></tr>
            <tr><td><span class="first"> duration :     </span><span class="second" style="position:relative;right:12px">{{ $exam->duration }}</span></td></tr>
            <tr><td><span class="first"> Exam start :   </span><span class="second">{{ $exam->ex_start }}</span></td></tr>
            <tr><td><span class="first"> Exam end :     </span><span class="second">{{ $exam->ex_end }} </span></td></tr>

 
      
            <tr>
                <td colspan="2">
                    <p data-toggle="popover" data-container="body" data-content="
                    <span> easy :</span> {{ $exam->num_of_mcq_e }} &nbsp;&nbsp;
                    <span> normal :   </span>  {{ $exam->num_of_mcq_n }} &nbsp;&nbsp;
                    <span> hard : </span> {{ $exam->num_of_mcq_h }}" data-html="true" data-placement="right" style="float:left; position:relative;left:0px; top:8px;font-weight:bolder"> Number of TF | MCQ Questions</p>
                </td>
            
            </tr>
            <tr>
                <td colspan="2" >
                    <p  data-toggle="popover" data-container="body" data-content="
                        <span> easy :</span> {{ $exam->num_of_match_e }} &nbsp;&nbsp;
                        <span> normal :   </span>  {{ $exam->num_of_match_n }} &nbsp;&nbsp;
                        <span> hard : </span> {{ $exam->num_of_match_h }}" data-html="true" data-placement="right" style="float:left; position:relative;left:0px; top:8px;font-weight:bolder"> Number of Match Questions</p>

                </td>
            </tr>
            
            <tr>
              <td>
                    <p  data-toggle="popover" data-container="body" data-content="
                        <span> easy :</span> {{ $exam->num_of_complete_e }} &nbsp;&nbsp;
                        <span> notmal :   </span>  {{ $exam->num_of_complete_n }} &nbsp;&nbsp;
                        <span> hrad : </span> {{ $exam->num_of_complete_h }}" data-html="true" data-placement="right" style="float:left; position:relative;left:0px; top:8px;font-weight:bolder"> Number of Complete Questions</p>                   
              </td>
            </tr>
            
                  @endforeach
        </table>
            <div class="table-responsive">
                  @else
                    <table class="card-body">
                        <thead><tr><th> no have exams </th></tr></thead>
                    </table>
                  @endif
            </div> 
    </div>
    
      <div class="ca-sts">
        <div class="stat">
          <div class="value">
              @if(count($exams)>0)
          <a class="btn float-right d-inline" style="background-color:#2fb8c0;color:#fff;" href="/course/{{$course->code}}/exams/{{$exam->idexam}}/examquestion/">Enter</a>                  
              
                  
              @else
              <div>
                <a href="/course/{{$course->code}}/exams" style="position:relative;float:left;bottom:50px;left:15px;font-size:16px;font-weight:bold;;color:#0C2543;text-decoration:none;">{{$course->name}}</a>
                </div>
                  
              @endif
          </div>
          
          
        </div>
        
          <div class="value">
          <a href="/course/{{$course->code}}/exams/{{$exam->idexam}}/edit" class="btn  d-inline" style="position:relative;top:30px;background-color:#2fb8c0;color:#fff;">Edit</a>
          
        </div>
        <div class="stat">
          <div class="value">
            <form class="float-right ml-2" action="/course/{{$course->code}}/exams/{{$exam->idexam}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn" style="background-color:#2fb8c0;color:#fff;">
                    Delete
                </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    

</div>
    </div>
<!--===============================================================================================-->
                                    <!--- scripts -->
    <script>
//to popover the course when moving on it
$(function () {
  $('[data-toggle="popover"]').popover('show')
})
$(function () {
  $('.example-popover').popover({
    container: 'body'
  })
})
</script>
<!--===============================================================================================-->

</body>
</html>

@endsection
@section('scripts')
@endsection
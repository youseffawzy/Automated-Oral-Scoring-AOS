@extends('layouts.master')
@section('title')
Update MCQ || TF Question
@endsection
@section('content')
<!DOCTYPE html>
<html lang="en" style="width:100%; height: auto; min-width:1000px;">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>All Exams</title>
        <!--===============================================================================================-->
                                        <!-- packages --> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
    </head>
<body>
<div class="card card-default">
    <div class="card-header">
        {{ "Update questions"  }}
    </div>
    @if (session()->has('error'))
    <div class= "alert alert-danger">
    {{session()->get('error')}}
    </div>   
    @endif
    
    <div class="card-body">
    <form action="/course/{{$course->code}}/exams/{{$exam->idexam}}/examquestion/questions/{{$questions->id}}/" method="POST">
                   @csrf
            @if (isset($questions))
                    @method('PUT')
                @endif
            
            <div class="form-group">
            <label for="questions" style="color:#0C2543">question Name</label>
            <input id="q_text"  type="text" name="q_text" value="{{ isset($questions) ? $questions->q_text : old('q_text') }}" class=" @error('question.q_text') is-invalid @enderror form-control"  >
            
                @error('q_text')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
                    
        
            <div class="form-group">
                <label  type="text" for="exams">degree of defficult:</label>
            <input  name="pority" id="showTxt" value="{{ isset($questions) ? $questions->pority : old('pority') }}" class=" @error('question.pority') is-invalid @enderror form-control" placeholder="Enter the degree of diffcult of question " Readonly/>
                @error('pority')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="form-group">
                <label  type="text" for="exams" style="color:#0C2543">Update degree of defficult:</label>
                    <select name="pority" id="list" class="form-control" style="height:30%"  onchange="getSelectValue()"> 
                        <option value="easy" > easy </option>
                        <option value="normal" > normal </option>
                        <option value="hard" > hard </option>    
                    </select>
                    @error('pority')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
            
            <div class="container">
                <section>
                    <div class="panel panel-footer">
                        <div class="table-responsive">
                            <table class="table table-active">
                            <thead>
                            <th></th>
                            <th>
                                        <a href="#"  class="addRow btn" style="position: relative;top: 15px;left:25px;background-color: #0C2543;color:#fff;border-radius: 10px;width:22%"> <i class="glyphicon glyphicon-plus"></i>+</a>
                                    </th>   
                            </thead>
                                <tbody>
                                    @foreach($choices as $choice1 )
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label for="choices" style="color:#0C2543">text of  choices:</label>
                                                    <input type="text" id="ans1" name="choices_text[]"  value="{{$choice1->choices_text}}" class=" @error('choices.choices_text') is-invalid @enderror form-control"  >
                                                    @error('choices_text')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </td>                              
                                            <td>
                                                <a href="#" class="btn remove" style="position: relative; left: 30px;top: 15px;background-color: #0C2543;color:#fff;"> <i class="glyphicon glyphicon-remove"></i>x</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>

          
            @foreach($true_answer as $true_answer1)
                <div class="form-group">
                    <label  type="text" for="answer_text">true answer:</label>
                    <input  name="answer_text" type="text" value="{{$true_answer1->answer_text}}" class=" @error('true_answer.answer_text') is-invalid @enderror form-control" placeholder="Enter the answer of question " >
                    @error('answer_text')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            @endforeach

            <div class="form-group">
                <button class="btn" style="background-color:#2fb8c0;color:#fff">
                    {{ "Update"  }}
                </button>
            </div>
            
        </form>
    </div>
</div>


<script>
    function getSelectValue() {
        var s =document.getElementById("list").value;
        document.getElementById("showTxt").value = s ;
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> 
<script>
    flatpickr('#time',{
        enableTime:true
    })
</script>

<!-- to add and remove choices on mcq question -->
<script>
        $('.addRow').on('click',function() {
        addRow();
    })
    function addRow() {
        var len=$('tbody tr').length;
        if(len < 6){
            var tr='<tr>' +
                 '<td><div class="form-group"><label for="choices" style="color:#0C2543">text of  choices:</label><input type="text" name="choices_text[]"  class=" @error('choices.choices_text') is-invalid @enderror form-control"  >@error('choices_text')<div class="alert alert-danger">{{ $message }}</div>@enderror</div> </td>' + 
                 '<td> <a href="#" class="btn remove" style="position: relative; left: 30px;top: 15px;background-color: #0C2543;color:#fff;"> <i class="glyphicon glyphicon-remove"></i>x</a> </td>' +
               '</tr>' ;
        $('tbody').append(tr);
        }
        else{
            alert("you can`t add more choices");
        }
        
    };
    $('.remove').live('click',function () {
        var last=$('tbody tr').length;
        if(last == 2){
            alert("can`t be less than 2 choices");
        }
        else{
            $(this).parent().parent().remove();
        }

    });


// to control hiding the plus icon and toggle between Mcq and TF question
document.getElementById("joe").style.display = 'none';
document.getElementById('ans1').value='true';
document.getElementById('ans2').value='false';
function jam() {
    if(document.getElementById("tf").checked==true){
    $("#joe").hide();
    location.reload(true);
    document.getElementById('ans1').value='true';
    document.getElementById('ans2').value='false';     
}
    else{
        document.getElementById("joe").style.display = 'block';
        document.getElementById('ans1').value='';
        document.getElementById('ans2').value='';
        }
}
</script>
</body>
</html>
@endsection
@section('scripts')
@endsection
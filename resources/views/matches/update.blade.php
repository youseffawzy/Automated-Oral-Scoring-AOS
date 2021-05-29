@extends('layouts.master')
@section('title')
 Update Match-question
@endsection
@section('content')
<!DOCTYPE html>
<html lang="en" style="width:100%; height: auto; min-width:1000px;">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--===============================================================================================-->
                                        <!-- fonts -->
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
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
        {{  "Update match questions"  }}
    </div>
    
    <div class="card-body">
        <form action="/course/{{$course->code}}/exams/{{$exam->idexam}}/examquestion/matches/{{$match->id_component}}/" method="POST">
            @csrf
            @if (isset($match))
                    @method('PUT')
            @endif        
                <div class="container" >
                    <section>
                        <div class="panel panel-footer">
                            <div class="table-responsive">
                                                <table class="table table-active">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="3">                                    
                                                                <div class="form-group">
                                                                    <label for="questions" style="color: #0C2543;font-size:100%">match-component Name:</label>
                                                                        <input id="name"  type="text" name="name" value="{{ isset($match) ? $match->name :old('name') }}" class=" @error('name') is-invalid @enderror form-control" placeholder="Enter the component-name Of Match question" >
                                                                            @error('name')
                                                                            <div class="alert alert-danger">
                                                                            {{ $message }}
                                                                            </div>
                                                                            @enderror
                                                                </div>                                                               
                                                            </th>
                                                        </tr>      
                                                    </thead>
                                                    <tbody class="t1">                                                         
                                                        <tr>
                                                            <td colspan="3">
                                                                <div class="form-group">
                                                                    <label  type="text"  for="exams">degree of defficult</label>
                                                                    <input  name="priority" id="showTxt" value="{{ isset($match) ? $match->priority : old('priority') }}" class=" @error('priority') is-invalid @enderror form-control" placeholder="Enter the degree of diffcult of question " Readonly/>
                                                                        @error('priority')
                                                                        <div class="alert alert-danger">
                                                                        {{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label  type="text" for="exams"  style="color: #0C2543;font-size:100%">Update degree of defficult</label>
                                                                        <select name="priority" id="list" class="form-control" style="height:30%" onchange="getSelectValue()"> 
                                                                            <option value="easy" > easy </option>
                                                                            <option value="normal" > normal </option>
                                                                            <option value="hard" > hard </option>                                                                                
                                                                        </select>
                                                                        @error('priority')
                                                                        <div class="alert alert-danger">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            
                                                            </td>
                                                        </tr>
                                                       <tr>
                                                       <td></td>
                                                       <td></td>
                                                            <td>
                                                                <a href="#" class="btn addRow1" style="position: relative;left: 15px;top: 15px;background-color: #0C2543;color:#fff;border-radius: 12px;"> <i class="glyphicon glyphicon-plus"></i>+</a>
                                                            </td>
                                                       </tr>
                                                        @foreach($match_true_answer as $match_true_answer1)
                                                        <tr>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label for="match_true_answer" style="color: #0C2543;font-size:100%">question</label>
                                                                        <input type="text" name="question[]" value="{{$match_true_answer1->question}}"  class=" @error('match_true_answer.question') is-invalid @enderror form-control" placeholder="Enter the question "  style="width:100%">  
                                                                            @error('question')
                                                                                <div class="alert alert-danger">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                </div>                                       
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label  type="text" for="answer" style="color: #0C2543;font-size:100%"> answer</label>
                                                                        <input  name="answer[]" value="{{$match_true_answer1->answer}}" class=" @error('match_true_answer.answer') is-invalid @enderror form-control" placeholder="Enter the answer Of question " style="width:100%" > 
                                                                            @error('answer')
                                                                                <div class="alert alert-danger">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>                                                                
                                                                
                                                            </td>
                                                            <td>
                                                                <a href="#" class="btn remove1" id="rem1" style="position: relative; left: 15px;top: 15px;background-color: #0C2543;color:#fff;border-radius: 12px;"> <i class="glyphicon glyphicon-remove"></i>x</a>
                                                              </td>
        
                                                   
                                                        </tr>   
                                                        @endforeach                                                                   
                                                    </tbody>                      
                                                </table>
                                    
                            </div>
                        </div>
                    </section>
                </div>
                                                                      

            <div class="form-group">
                <button class="btn" style="background-color:#2fb8c0;color:#fff">
                    update
                </button>
            </div>
            
        </form>
    </div>
</div>


<!--===============================================================================================-->
                                    <!--- scripts -->
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
   
<!-- to add row when clicking the plus icon to make the match component larger -->
<script>
        $('.addRow1').on('click',function() {
        addRow();
    })
    function addRow() {
        var len=$('.t1 tr').length;
        if(len < 10){
            var tr1='<tr>'+
                    '<td> <div class="form-group"> <label for="match_true_answer" style="color: #0C2543;font-size:100%">question</label> <input type="text" name="question[]" id="question"  class=" @error('question') is-invalid @enderror form-control" placeholder="Enter the question "  style="width:100%">   @error('question') <div class="alert alert-danger"> {{ $message }} </div> @enderror </div> </td> ' +
                    '<td> <div class="form-group"> <label  type="text" for="answer" style="color: #0C2543;font-size:100%"> answer</label> <input  name="answer[]" id="answer"  class=" @error('answer') is-invalid @enderror form-control" placeholder="Enter the answer Of question " style="width:100%" >  @error('answer') <div class="alert alert-danger"> {{ $message }} </div> @enderror </div>  </td>'+                    
                    '<td> <a href="#" class="btn remove1" id="rem1" style="position: relative; left: 15px;top: 15px;background-color: #0C2543;color:#fff;border-radius: 12px;"> <i class="glyphicon glyphicon-remove"></i>x</a> </td>'+
                    '</tr>' ;
            $('.t1').append(tr1);
        
        }
        else{
            alert("you can`t add more choices");
        }
        
    };
// to remove row when clicking the minus icon  
    $('.remove1').live('click',function () {
        var last=$('.t1 tr').length;
        if(last == 1){
            alert("can`t be less than 2 choices");
        }
        else{
            $(this).parent().parent().remove();
        }

    });
</script>
<!--===============================================================================================-->

</body>
</html>
@endsection
@section('scripts')
@endsection
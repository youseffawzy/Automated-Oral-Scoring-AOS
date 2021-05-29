@extends('layouts.master')
@section('title')
Update Complete-question
@endsection
@section('content')
<!DOCTYPE html>
<html lang="en" style="width:100%; height: auto; min-width:1000px;">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>All Exams</title>
         <!--===============================================================================================-->
                                        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('comp/c.css')}}" type="text/css">
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
            <form action="/course/{{$course->code}}/exams/{{$exam->idexam}}/examquestion/completes/{{$questions->id}}" method="POST">
            @csrf
            @if (isset($questions))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="questions" style="color: #0C2543;font-size:100%">question Name</label>
                <input id="q_text"  type="text" name="q_text" value="{{ isset($questions) ? $questions->q_text : old('q_text') }}" class=" @error('question.q_text') is-invalid @enderror form-control"  >            
                @error('q_text')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            
            <div class="form-group">
                <label  type="text" for="exams" style="color:#0C2543">degree of defficult</label>
                <input  name="pority" id="showTxt" value="{{ isset($questions) ? $questions->pority : old('pority') }}" class=" @error('question.pority') is-invalid @enderror form-control" placeholder="Enter the degree of diffcult of question " Readonly/>
                @error('pority')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div> 

            <div class="form-group">
                    <label  type="text" for="exams" style="color:#0C2543">Update degree of defficult</label>
                    <select name="pority" id="list"  class="form-control" style="height:30%" onchange="getSelectValue()"> 
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
                    <table class="table table-active" id="myTableID">
                        <!-- <thead>
                                                   
                              <td></td><td></td>
                                <td><a href="#" id="joe" class="addRow1 btn" style="position: relative;top: 15px;left:10px;background-color: #0C2543;color:#fff;border-radius: 12px;width:50%"> <i class="glyphicon glyphicon-plus"></i>+</a></td>
                                                                                           
                        </thead> -->
                        <tbody>
                            @foreach($true_answer as $true_answer1) 
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label  type="text" for="answer" style="color:#0C2543"> answer</label>
                                        <input  name="answer_text[]" id="ans" value="{{$true_answer1->answer_text}}" class=" @error('true_answer.answer_text') is-invalid @enderror form-control" placeholder="Enter the answer_text of question " >
                                        @error('answer_text')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>                                                                                                                                                                                                                           
                                </td>

                                <td>
                                    <div id="pos1">
                                        <div class="form-group">
                                            <label for="or" type="number" style="color:#0C2543">enter position of answer</label>
                                            <input type="number" id="anspos" name="or[]"  value="{{$true_answer1->or}}" class=" @error('true_answer.or') is-invalid @enderror form-control"  Readonly/> <!-- Readonly/-->
                                                @error('or')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                        </div>    
                                    </div>                                                                    
                                </td>                               
                                <!-- <td>
                                    <a href="#" class="btn remove1" id="rem1" style="position: relative; left: 15px;top: 15px;background-color: #0C2543;color:#fff;heigth:150%"> <i class="glyphicon glyphicon-remove"></i>x</a>
                                </td> -->
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
                    {{ "Update"  }}
                </button>
            </div>
            
        </form>
    </div>
</div>
<!--===============================================================================================-->
                                    <!--- scripts -->
                                    <script>
    // change the selected value of degree of difficulty of what you want to update
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
    <script>
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// to add row when clicking the plus icon 
        $('.addRow1').on('click',function() {
        addRow();
    })
    function addRow() {
        var len=$('tbody tr').length;
        if(len < 6){
            var tr1='<tr>'+
                                '<td> <div class="form-group"> <label  type="text" for="answer" style="color:#0C2543"> answer</label> <input  name="answer_text[]" id="ans" value="" class=" @error('answer_text') is-invalid @enderror form-control" placeholder="Enter the answer_text of question " > @error('answer_text') <div class="alert alert-danger"> {{ $message }} </div> @enderror </div>                                                                                                                                                                                                                            </td>'+
                                '<td> <div id="pos1"> <div class="form-group"> <label for="or" type="number" style="color:#0C2543">enter position of answer</label> <input type="number" id="anspos" name="or[]"  value="0" class=" @error('or') is-invalid @enderror form-control"  > @error('or') <div class="alert alert-danger"> {{ $message }} </div> @enderror </div>     </div> </td>'+                               
                                '<td> <a href="#" class="btn remove1" id="rem1" style="position: relative; left: 15px;top: 15px;background-color: #0C2543;color:#fff;heigth:150%"> <i class="glyphicon glyphicon-remove"></i>x</a> </td>'+
                            '</tr>';
            
            
            // '<tr>' +
            //         '<td> <div class="form-group"> <label  type="text" for="answer" style="color:#0C2543"> answer</label> <input  name="answer_text[]" id="ans" class=" @error('answer_text') is-invalid @enderror form-control" placeholder="Enter the answer_text of question " > @error('answer_text') <div class="alert alert-danger"> {{ $message }} </div> @enderror </div> </td>'+
            //         '<td style="display:none;"> <div class="pos1"> <div class="form-group"> <label for="or" type="number" style="color:#0C2543">enter position of answer</label> <input type="number" id="anspos" name="or[]"  value="0" class=" @error('or') is-invalid @enderror form-control"  > @error('or') <div class="alert alert-danger"> {{ $message }} </div> @enderror </div> </div> </td>' +                               
            //         '<td> <a href="#" class="btn remove1" style="position: relative; float: right;left:120px;top: 15px;background-color: #0C2543;color:#fff;width:30%"> <i class="glyphicon glyphicon-remove"></i>x</a> </td>' +
            //         '</tr>' ;
            $('tbody').append(tr1);    
            changeAll();        
        
        }
        else{
            alert("you can`t add more answers");
        }
        
    };
    $('.remove1').live('click',function () {
        var last=$('tbody tr').length;
        if(last == 1){
            alert("can`t be less than one answer");
        }
        else{
            $(this).parent().parent().remove();
        }

    });
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   
    

</script>
  
</body>
</html>
@endsection
@section('scripts')
@endsection


@extends('layouts.master')
@section('title')
 Exam Creation
@endsection
@section('content')
<!DOCTYPE html>
<html lang="en" style="width:100%; height: auto; min-width:1000px;">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--===============================================================================================-->
                                        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('comp/c.css')}}" type="text/css">
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
<div class="card card-default">
    <div class="card-header">
        {{ isset($exam) ? "Update Exam" : "Add a new Exam" }}
    </div>
    @if (session()->has('error'))
    <div class= "alert alert-danger">
    {{session()->get('error')}}
    </div>
    @endif
    <div class="card-body">
        <form action=  "/course/{{$course->code}}/exams/ " method="POST">
                @csrf
                @if (isset($exam))
                    @method('PUT')
                @endif
            <div class="form-group">
                <label for="exams" style="color:#0C2543">Exam Name</label>
                <input type="text" name="name" value="{{ isset($exam) ? $exam->name : old('name') }}" class=" @error('name') is-invalid @enderror form-control" placeholder="Enter the name Of exam " >
                @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exams" style="color:#0C2543">degree</label>
                <input type="number" name="degree" value="{{ isset($exam) ? $exam->degree :  old('degree') }}" class=" @error('degree') is-invalid @enderror form-control" placeholder="Enter the exam`s degree " >
                @error('degree')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <table style="width:100%;position: static;">
                <div style="position: static;">
                <tr>
                    <td>
                        <div class="form-group" >
                            <label for="exams" style="color:#0C2543">Num_Of_MCQ </label>
                            <input type="number" name="num_of_mcq_e" value="{{ isset($exam) ? $exam->num_of_mcq_e :  old('num_of_mcq_e') }}" class=" @error('num_of_mcq_e') is-invalid @enderror form-control" style="width:90%;"  placeholder="Enter num_Of_easy MCQ" >
                            
                            @error('num_of_mcq_e')
                                <div class="alert alert-danger" style="position:relative;top:5px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                        <input type="number" name="num_of_mcq_n" value="{{ isset($exam) ? $exam->num_of_mcq_n :  old('num_of_mcq_n') }}" class=" @error('num_of_mcq_n') is-invalid @enderror form-control" style="position:relative;top:30px;float:right;right:15px;width:90%;" placeholder="Enter num_Of_normal MCQ" >
                        <br><br><br>
                            @error('num_of_mcq_n')
                                <div class="alert alert-danger" >
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </td>
                    <td>
                        <div class="form-group">                        
                        <input type="number" name="num_of_mcq_h" value="{{ isset($exam) ? $exam->num_of_mcq_h :  old('num_of_mcq_h') }}" class=" @error('num_of_mcq_h') is-invalid @enderror form-control" style="position:relative;top:30px;float:right;width:90%;" placeholder="Enter num_Of_hard MCQ" >
                        <br><br><br>
                            @error('num_of_mcq_h')
                                <div class="alert alert-danger" >
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </td>
                </tr>
                </div>
            </table>


            <table style="width:100%;position: static;">
            <div style="position: static;">
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="exams" style="color:#0C2543"> Num_Of_Match </label>
                            <input type="number" name="num_of_match_e" value="{{ isset($exam) ? $exam->num_of_match_e :  old('num_of_match_e') }}" class=" @error('num_of_match_e') is-invalid @enderror form-control" style="width:90%;"  placeholder="Enter num_Of_easy Match"  >
                            @error('num_of_match_e')
                                <div class="alert alert-danger" style="position:relative;top:5px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="number" name="num_of_match_n" value="{{ isset($exam) ? $exam->num_of_match_n :  old('num_of_match_n') }}" class=" @error('num_of_match_n') is-invalid @enderror form-control" style="position:relative;top:30px;float:right;right:15px;width:90%;" placeholder="Enter num_Of_normal Match" >
                            <br><br><br>
                            @error('num_of_match_n')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="number" name="num_of_match_h" value="{{ isset($exam) ? $exam->num_of_match_h :  old('num_of_match_h') }}" class=" @error('num_of_match_h') is-invalid @enderror form-control" style="position:relative;top:30px;float:right;width:90%;" placeholder="Enter num_Of_hard Match">
                            <br><br><br>
                            @error('num_of_match_h')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </td>
                </tr>
                </div>
            </table>

            <table style="width:100%;position: static;">
            <div style="position: static;">
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="exams" style="color:#0C2543">num_of_complete_e</label>
                            <input type="number" name="num_of_complete_e" value="{{ isset($exam) ? $exam->num_of_complete_e :  old('num_of_complete_e') }}" class=" @error('num_of_complete_e') is-invalid @enderror form-control" style="width:90%;"  placeholder="Enter num_Of_easy Complete">
                            @error('num_of_complete_e')
                                <div class="alert alert-danger" style="position:relative;top:5px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </td>
                <td>
                    <div class="form-group">
                        <input type="number" name="num_of_complete_n" value="{{ isset($exam) ? $exam->num_of_complete_n :  old('num_of_complete_n') }}" class=" @error('num_of_complete_n') is-invalid @enderror form-control" style="position:relative;top:30px;float:right;right:15px;width:90%;" placeholder="Enter num_Of_normal Match"  >
                        <br><br><br>
                        @error('num_of_complete_n')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </td>
                <td>    
                    <div class="form-group">
                        <input type="number" name="num_of_complete_h" value="{{ isset($exam) ? $exam->num_of_complete_h :  old('num_of_complete_h') }}" class=" @error('num_of_complete_h') is-invalid @enderror form-control" style="position:relative;top:30px;float:right;width:90%;" placeholder="Enter num_Of_hard Match" >
                        <br><br><br>
                        @error('num_of_complete_h')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </td>
            </tr>
            </div>
        </table>
            <div class="form-group">
                <label for="exams" style="color:#0C2543">Exam Duration</label>
                <input  type="number"  id="duration" name="duration" value="{{ isset($exam) ? $exam->duration :  old('duration') }}" class=" @error('duration') is-invalid @enderror form-control" placeholder="Enter the duration of exam " >
                @error('duration')
                    <div class="alert alert-danger" >
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label  type="datetime" for="exams" style="color:#0C2543">Exam start</label>
                <input  type="datetime" name="ex_start" id="ex_start" value="{{ isset($exam) ? $exam->ex_start :  old('ex_start') }}"class=" @error('ex_start') is-invalid @enderror form-control" placeholder="Enter the Start Time Of Exam  " >
                @error('ex_start')
                    <div class="alert alert-danger" >
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exams" style="color:#0C2543">Exam End </label>
                <input type="datetime" id="ex_end" name="ex_end" value="{{ isset($exam) ? $exam->ex_end :  old('ex_end') }}" class=" @error('ex_end') is-invalid @enderror form-control" placeholder="Enter the End Time Of Exam  " >
                @error('ex_end')
                    <div class="alert alert-danger" >
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn" style="background-color:#2fb8c0;color:#fff;">
                    {{ isset($exam) ? "Update" : "Add" }}
                </button>
            </div>
        </form>
    </div>
</div>
    
<!--===============================================================================================-->
                                    <!--- scripts -->  
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
        flatpickr('#ex_start',{
            enableTime:true
        })
</script>
<script>
        flatpickr('#ex_end',{
            enableTime:true
        })
</script>
<!--===============================================================================================-->
</body>
</html>
@endsection
@section('scripts')
@endsection
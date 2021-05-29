@extends('layouts.master')
@section('title')
All Match questions
@endsection
@section('content')
<!DOCTYPE html>
<html lang="en" style="width:100%; height: auto; min-width:1000px;">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--===============================================================================================-->
                                        <!-- packages --> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>        
        <!--===============================================================================================-->
    </head>
<body>
    <div class="card">
        <div class="card-body">     
            <div class="table-responsive">
                <table class="table" style="width:100%">
                    <thead style="background:#131d38;color:#fff"> 
                        <tr>
                            <th  style="text-align:center; padding:25px; width:40%"> All match questions</th>
                            <th style="text-align:center; width:35%">
                                <div class="clearfix">
                                    @if (session()->has('error'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('error') }}
                                    </div>
                                    @endif
                                    <nav class="navbar navbar-light d-inline" style="background:#131d38;width:50%;align:right;">
                                        <form class="form-inline input-group d-inline"  action="/course/{{$course->code}}/exams/{{$exam->idexam}}/examquestion/matches" method="GET">
                                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search"  value="{{request()->query('search')}}"> <!-- value="{{request()->query('search')}}" that is reason to make the course availble not deleted after refresh -->
                                            <button class="btn" type="submit" style="background-color:#2fb8c0;color:#fff">Search</button>
                                        </form>
                                    </nav>
                                    <a role="button" class="btn d-inline" href="/course/{{$course->code}}/exams/{{$exam->idexam}}/examquestion/matches/create" style="background-color:#2fb8c0	;color:#fff;margin: 0px 0px;font-size: 16px;padding: 7px 22px;">Add </a>
                                </div> 
                            </th>      
                        </tr>
                    </thead>
                    </table>
            </div>
            <div class="card">
                <div class="card-body"> 
                    <div class="table-responsive" >

        @if(count($matches)>0)
        <table class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="min-width: 40px;max-width: 60px;"><h5 class="text-dark" style="margin:5px;position: relative;left: 0px;">question Name </h5></th>
                                        <th style="min-width: 10px;max-width: 20px;"><h5 class="text-dark">level</h5></th>
                                        <th style="min-width: 10px;max-width: 20px;"><h5 class="text-dark text-sm-right" style="margin:5px;position: relative;right: 40px;">Action</h5></th>
                                    </tr>
                                
                                </thead>
                                <tbody>
                    @foreach ($matches as $match)
                    <tr>
                                        <td style="min-width: 40px;max-width: 60px;">
                                            <a class="font-weight-bold text-secondary text-center" style="margin:5px;text-decoration:none;" href="#">{{ $match->name }}</a>
                                        </td>

                                        <td style="min-width: 10px;max-width: 20px;">
                                            <a class="font-weight-bold text-secondary text-center" style="margin:5px;text-decoration:none;" href="#">{{ $match->priority }}</a>
                                        </td>

                                        <td style="min-width: 10px;max-width: 20px;">
                                            <form class="float-right ml-2" action="/course/{{$course->code}}/exams/{{$exam->idexam}}/examquestion/matches/{{$match->id_component}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger d-inline">
                                                    Delete
                                                </button>
                                            </form>
                                            <a href="/course/{{$course->code}}/exams/{{$exam->idexam}}/examquestion/matches/{{$match->id_component}}/edit" class="btn btn-primary float-right d-inline">Edit</a>
                                        </td>
                                    </tr>
                    @endforeach
                    </tbody>
                            </table></table>

                    <div class="table-responsive">
                        @else
                            <table class="card-body">
                                <thead><tr><th> no have match questions </th></tr></thead>
                            </table>
                        @endif
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
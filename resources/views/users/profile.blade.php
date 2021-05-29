@extends('layouts.master')
@section('title')
{{$user->name}} Profile
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
    <div class="card card-default">
        <div class="card-header">
            <h3 style="color:#0C2543">Profile</h3>
        </div>
        <div class="card-body">
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" style="color:#0C2543">first name</label>
                  <input type="text" name="fname" class="form-control" value="{{$user->fname}}">
                </div>
                <div class="form-group">
                    <label for="name" style="color:#0C2543">middle name</label>
                  <input type="text" name="mname" class="form-control" value="{{$user->mname}}">
                </div>
                <div class="form-group">
                    <label for="name" style="color:#0C2543">last name</label>
                  <input type="text" name="lname" class="form-control" value="{{$user->lname}}">
                </div>
                <!-- <div class="form-group">
                  <label for="name" style="color:#0C2543">phone</label>
                <input type="text" name="phone" class="form-control" value="{{$user->phone}}">
              </div> -->
                <div class="form-group">
                  <label for="email" style="color:#0C2543">Email</label>
                  <input type="text" name="email" class="form-control" value="{{$user->email}}">
                </div>
                
                <div class="form-group">
                  <label for="about" style="color:#0C2543">Summary</label>
                <textarea class="form-control" rows="2" name="about" placeholder="Tell us about you">{{ $profile->about }}</textarea>
                
                    <button class="btn" style="background-color:#2fb8c0;color:#fff">
                        Update Bio
                    </button>
                
                </div>
               
                
            </form>
        </div>
    </div>
    </body>
</html>

@endsection
@section('scripts')
@endsection

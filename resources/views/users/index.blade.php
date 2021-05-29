@extends('layouts.master')
@section('title')
Admin-control
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
                <table class="table" style="width:50%" align="center">
                    <thead style="background:#131d38;color:#fff"> 
                        <tr>
                            <th  style="text-align:center; padding:25px; width:40%"> All Users</th>
                        </tr>
                    </thead>
                </table>
            </div>
            
            
                    <div class="table-responsive" >
                        @if ($users->count() > 0)
                            <table class="card-body">
                            <table class="table" style="width:50%" align="center" >
                                <thead>
                                    <tr>
                                        <th><h5 class="text-dark text-center">username </h5></th>
                                        <th><h5 class="text-dark text-center">permissions</h5></th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td class="font-weight-bold text-secondary text-center" style="margin:30px">
                                            {{ $user->fname .' '.$user->mname.' '.$user->lname}}
                                        </td>
                                        <td class="font-weight-bold text-secondary text-center" style="margin:30px">
                                            @if (!$user->isAdmin())
                                              <form action="{{route('users.make-admin', $user->id)}}" method="post">
                                                @csrf
                                              <button class="btn" type="submit" style="margin:0px;background-color:#2fb8c0;color:#fff">Make admin</button>
                                              </form>
                                            @else
                                              {{ $user->role }}
                                            @endif
                                        </td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table></table>

                    <div class="table-responsive">
                        @else
                            <table class="card-body">
                                <thead><tr><th> No users Yet. </th></tr></thead>
                            </table>
                        @endif
                    </div>
            
    </div>
</div>

</body>
</html>

@endsection
@section('scripts')
@endsection

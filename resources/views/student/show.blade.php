@extends('layouts.app')
@section('content')
<div class="clearfix">
    @if (session()->has('error'))
      <div class="alert alert-danger">
        {{ session()->get('error') }}
      </div>
    @endif
</div>  
<div class="card card-default">
       <div class="card-header">All student</div>
       <div class="card-body">
       

        </div>
       
    </div>  
@endsection
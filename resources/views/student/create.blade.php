
@extends('layouts.app')
@section('content')
<div class="container">

{!! Form::open(['url' => 'student','method' => 'get'])!!}

	@if(count($errors) > 0)
      @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">{{$error}}</div>
      @endforeach
    @endif

    @if(session('response'))
        <div class="col-md-8 alert alert-success">
          {{session('response')}}
        </div>
    @endif
	
    <div class="form-group">
    <label for="email">Name:</label>
    {!!Form::text('name',null,['class'=>'form-control']);!!}

     
  </div>
  <div class="form-group">
    <label for="pwd">Address:</label>
    {!!Form::text('address',null,['class'=>'form-control']);!!}

  </div>
  <button type="submit" class="btn btn-default">Submit</button>
{!! Form::close() !!}

</div>
@stop 

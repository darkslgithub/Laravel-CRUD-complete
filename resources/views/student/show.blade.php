@extends('layouts.app')
@section('content')
<div class="col-md-6 col-md-offset-3">
<table class="table">
  
   @if(count($errors) > 0)
      @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">{{$error}}</div>
      @endforeach
    @endif

    @if(session('response'))
        <div class="alert alert-success">
          {{session('response')}}
        </div>
    @endif 

   <a href="{{url('student/create/')}}" class="btn btn-success">Add</a>

    <thead>
      <tr>
        <th>ID</th>
        <th>name</th>
        <th>Address</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($studentarray as $onestudent)
      <tr>
      	<th scope="row">{{$onestudent->id}}</th>
        <td>{{$onestudent->name}}</td>
        <td>{{$onestudent->address}}</td>
        <td>


             <!--<a href="localhost:8000/student/edit/{{$onestudent->id}}" class="btn btn-success">Edit</a>-->
         {!! Form::open(['url' => 'student/delete/'.$onestudent->id, 'method' => 'delete'])!!}
       
         <a href="{{url('student/edit/'.$onestudent->id)}}" class="btn btn-success">Edit</a>
         <!--we use the url method in laravel-->    
        
            <input type="submit" name="" value="delete" class="btn btn-danger">

         {!! Form::close() !!}

        </td>
      </tr>
 @endforeach     
    </tbody>
  </table>
</div>
@stop 
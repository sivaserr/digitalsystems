@extends('layouts.app')

@section('content')
<h1>Create post page</h1>

{!! Form::open(['action'=> 'PostController@index', 'method'=> 'POST']) !!}
  <div class="form-group">
      {{Form::label('title','Title')}}
      {{Form::text('title','',['class' => 'form-control','placeholder'=>'Tilte'])}}
  </div>
    <div class="form-group">
        {{Form::label('body','Body')}}
        {{Form::textarea('body','',['class'=>'form-control','placeholder'=>'Body Text'])}}
    </div>
    {{Form::submit('submit' ,['class' => 'btn- btn-primary'])}}
{!! Form::close() !!}
@endsection
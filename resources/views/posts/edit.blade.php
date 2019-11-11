@extends('layouts.app')

@section('content')
<h1>Create post page</h1>

{!! Form::open(['action'=> ['PostController@update',$post->id], 'method'=> 'POST']) !!}
  <div class="form-group">
      {{Form::label('title','Title')}}
      {{Form::text('title',$post->title,['class' => 'form-control','placeholder'=>'Tilte'])}}
  </div>
    <div class="form-group">
        {{Form::label('body','Body')}}
        {{Form::textarea('body',$post->body,['class'=>'form-control','placeholder'=>'Body Text'])}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('submit' ,['class' => 'btn- btn-primary'])}}
{!! Form::close() !!}
@endsection 
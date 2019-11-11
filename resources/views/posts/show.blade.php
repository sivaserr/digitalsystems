@extends('layouts.app')

@section('content')
<a href="/post" class="btn btn-default">Go back</a>
<div class="card bg-light p-3">
<h1>{{$post->title}}</h1>
<div>
{{$post->body}}
</div>
<hr>
<small>Written on{{$post->created_at}}</small>
<hr>
<a href="/post/{{$post->id}}/edit" class="btn btn-default">Edit</a>
</div>
{!!Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST','class' => 'pull-right'])!!}
{{Form::hidden('_method','DELETE')}}
{{Form::submit('Delete',['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
@endsection
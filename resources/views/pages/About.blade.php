@extends('layouts.app')
@section('content')
<h1>{{$title}}</h1>
@if(count($service) > 0)
  <ul class="list-group">
   @foreach($service as $serve)
   
   <li class="list-group-item">{{$serve}}</li>
   @endforeach
  </ul>
@endif
@endsection
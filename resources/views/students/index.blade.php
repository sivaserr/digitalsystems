@extends('layouts.app')

@section('content')
 
    @if(count($students) > 0)
     @foreach($students as $student)
     <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">S.no</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Reg_no</th>
                <th scope="col">Degree</th>
                <th scope="col">Department</th>
                <th scope="col">year</th>
                <th scope="col">semester</th>
                <th scope="col">section</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">{{$student->id}}</th>
              <td>{{$student->name}}</td>
                <td>{{$student->email}}</td>
                <td>{{$student->reg_no}}</td>
                <td>{{$student->degree}}</td>
                <td>{{$student->department}}</td>
                <td>{{$student->year}}</td>
                <td>{{$student->semester}}</td>
                <td>{{$student->section}}</td>
              </tr>
            </tbody>
          </table>
     @endforeach
    @endif
@endsection

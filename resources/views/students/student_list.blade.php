@extends('layouts.app')


@section('content')
<div class="container">
    <div class="jumbotron">
        <table class="table table-stripped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Reg_no</th>
                    <th scope="col">Degree</th>
                    <th scope="col">Department</th>
                    <th scope="col">Year</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Section</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                <th>{{$student->id}}</th>
                <th>{{$student->name}}</th>
                <th>{{$student->email}}</th>
                <th>{{$student->reg_no}}</th>
                <th>{{$student->degree}}</th>
                <th>{{$student->department}}</th>
                <th>{{$student->year}}</th>
                <th>{{$student->semester}}</th>
                <th>{{$student->section}}</th>
                <th> <a href="/editstudentprofile/{{$student->id}}">Edit</a> </th>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
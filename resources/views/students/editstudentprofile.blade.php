@extends('layouts.app')

@section('content')
      
<div class="container">
<form action="" method="POST" enctype="multipart/form-data">
   <div class="form-group">
     <label>Name</label>
   <input type="text" name="name" class="form-control" value="{{$students->name}}" placeholder="Enter Name" required>
   </div>

   <div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
  </div>
  
  <div class="form-group">
    <label>reg_no</label>
    <input type="text" name="reg_no" class="form-control" placeholder="Enter reg_no" required>
  </div>

  <div class="form-group">
    <label>degree</label>
    <input type="text" name="degree" class="form-control" placeholder="Enter degree" required>
  </div>

  <div class="form-group">
    <label>department</label>
    <input type="text" name="department" class="form-control" placeholder="Enter department" required>
  </div>

  <div class="form-group">
    <label>year</label>
    <input type="text" name="year" class="form-control" placeholder="Enter year" required>
  </div>

  <div class="form-group">
    <label>semester</label>
    <input type="text" name="semester" class="form-control" placeholder="Enter semester" required>
  </div>

  <div class="form-group">
    <label>section</label>
    <input type="text" name="section" class="form-control" placeholder="Enter section" required>
  </div>
  <button type="submit" class="btn btn-primary" >Save Data</button>
</form>
</div>


@endsection
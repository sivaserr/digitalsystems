@extends('layouts.master')
@section('navbar_brand')
    Bank Details
@endsection


@section('content')
<div class="row">
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="unit_title">
          <h4 class="card-title">Bank</h4>
      </div>
      <div class="bank_create">
          <a href="#" type="button" class="btn btn-primary btn-success" data-toggle="modal" data-target="#form" ><span class="glyphicon glyphicon-plus"></span> CREATE NEW BANK</a>
      </div>
    </div>
    
    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header border-bottom-0">
            <h5 class="modal-title" id="exampleModalLabel">Create new bank</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <form  action="{{route('addbank')}}" method="POST">
          {{ csrf_field()}} <!--security token-->

          <div class="modal-body">
                <div class="form-group">
                    <label for="bank">Bank name</label>
                    <input type="text" class="form-control" name="bankname" id="bankname" aria-describedby="bankname" placeholder="Enter name" required>
                </div>
                <div class="form-group">
                    <label for="bank">Short name</label>
                    <input type="text" class="form-control" name="shortname" id="shortname" aria-describedby="shortname" placeholder="Enter name" required>
                </div>
            </div>
            <div class="modal-footer border-top-0 d-flex justify-content-center">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>


    <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>S.No</th>
                  <th>Bank Name</th>
                  <th>Short Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </thead>
                <tbody>
                    <?php $id = 1; ?>
                    @foreach($banks as $bank)
                  <tr>
                  <td>{{$id}}</td>
                  <td>{{$bank->bank_name}}</td>
                  <td>{{$bank->short_name}}</td>
                  <td><a href="/bank-details/{{$bank->id}}" class="btn btn-sm btn-info">Edit <span class="glyphicon glyphicon-edit"></span></a></td>
                  <td><a href="/bank-details/{{$bank->id}}" class="btn btn-sm btn-danger">Delete</a></td>
                  </tr>
                  <?php $id++; ?>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
  </div>
</div>
</div>
@endsection
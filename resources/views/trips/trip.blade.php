@extends('layouts.master')

@section('navbar_brand')
    Trip Entry
@endsection
<style>
        .unit_title {
          display: inline-block;
      }
      .trip_create {
          display: inline-block;
          float: right;
      }
      </style>
@section('content')
<div class="row">
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="unit_title">
          <h4 class="card-title">Trips list </h4>
      </div>
      <div class="trip_create">
          <a href="#" type="button" class="btn btn-primary btn-success" data-toggle="modal" data-target="#form" ><span class="glyphicon glyphicon-plus"></span> CREATE NEW TRIP</a>
      </div>
    </div>
    
    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header border-bottom-0">
            <h5 class="modal-title" id="exampleModalLabel">Create new Trip</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <form  action="{{ route('addtrip') }}" method="POST">
          {{ csrf_field()}} <!--security token-->

          <div class="modal-body">
                <div class="form-group">
                    <label for="trip">Trip name</label>
                    <input type="text" class="form-control" name="tripname" id="tripname" aria-describedby="tripname" placeholder="Enter name" required>
                </div>
                <div class="form-group">
                    <label for="tripdate">Trip Date</label>
                    <input type="date" class="form-control" name="tripdate" id="tripdate" aria-describedby="tripdate" placeholder="Enter date" required>
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
                  <th>Trip</th>
                  <th>Date</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </thead>
                <tbody>
                    <?php $id = 1; ?>
                    @foreach($trips as $trip)
                  <tr>
                  <td>{{$id}}</td>
                  <td>{{$trip->trip_name}}</td>
                  <td>{{Carbon\Carbon::parse($trip->date)->format('d-m-Y')}}</td>
                  <td><a href="/trip_edit/{{$trip->id}}" class="btn btn-sm btn-info">Edit <span class="glyphicon glyphicon-edit"></span></a></td>
                  <td><a href="/trips/{{$trip->id}}" class="btn btn-sm btn-danger">Delete</a></td>
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
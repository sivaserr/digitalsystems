@extends('layouts.master')

@section('navbar_brand')
Trip Edit
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="customer_title">
              <h4 class="card-title">Trip details</h4>
          </div>

        <form  action="/trip_update/{{ $trip->id }}" method="POST">
                {{ csrf_field()}} <!--security token-->
                {{ method_field('PUT')}}

                <div class="modal-body">
                      <div class="form-group">
                          <label for="trip">Trip Name</label>
                          <input type="text" class="form-control" name="tripname" value="{{$trip->trip_name}}" id="tripname" aria-describedby="tripname" placeholder="Enter trip " required>
                        </div>
                      <div class="form-group">
                          <label for="date">Trip Date</label>
                          <input type="date" class="form-control" name="tripdate" value="{{$trip->date}}" id="tripdate" aria-describedby="tripdate" placeholder="Enter date " required>
                        </div>
                  </div>
                  <div class="modal-footer border-top-0 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Save</button>
                  </div>
                </form>
        </div>
        


      </div>
    </div>
  </div>

@endsection
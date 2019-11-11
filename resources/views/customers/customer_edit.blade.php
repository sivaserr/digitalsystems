@extends('layouts.master')

@section('content')
      
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="customer_title">
              <h4 class="card-title">Customers details</h4>
          </div>

        <form action="/customerupdate/{{ $customerss->id }}" method="POST">
           {{ csrf_field() }}
           {{ method_field('PUT')}}
              <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$customerss->name}}" id="name" aria-describedby="name" placeholder="Enter name">
                        {{-- <small id="name" class="form-text text-muted">Your information is safe with us.</small> --}}
                      </div>
                      <div class="form-group">
                          <label for="address">Address</label>
                          <input type="text" class="form-control" name="address" value="{{$customerss->address}}" id="address" aria-describedby="address" placeholder="Enter address">
                        </div>
                      <div class="form-group">
                          <label for="city">City</label>
                          <input type="text" class="form-control" name="city" value="{{$customerss->city}}" id="city" aria-describedby="city" placeholder="Enter city">
                        </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{$customerss->email}}" id="email" aria-describedby="email" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{$customerss->phone}}" id="phone" placeholder="phone">
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
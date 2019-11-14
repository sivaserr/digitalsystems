@extends('layouts.master')

@section('content')
      
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="customer_title">
              <h4 class="card-title">supplier details</h4>
          </div>

        <form action="/supplierupdate/{{ $supplier->id }}" method="POST">
           {{ csrf_field() }}
           {{ method_field('PUT')}}
              <div class="modal-body">
                    <div class="form-group">
                        <label for="supplier_name">supplier</label>
                    <input type="text" class="form-control" name="supplier_name" value="{{$supplier->supplier_name}}" id="supplier_name" aria-describedby="supplier_name" placeholder="Enter supplier name">
                        {{-- <small id="name" class="form-text text-muted">Your information is safe with us.</small> --}}
                      </div>
                      <div class="form-group">
                          <label for="short_name">short_name</label>
                          <input type="text" class="form-control" name="short_name" value="{{$supplier->short_name}}" id="short_name" aria-describedby="short_name" placeholder="Enter short_name">
                        </div>
                      <div class="form-group">
                          <label for="city">City</label>
                          <input type="text" class="form-control" name="city" value="{{$supplier->city}}" id="city" aria-describedby="city" placeholder="Enter city">
                        </div>
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{$supplier->phone}}" id="phone" placeholder="phone">
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
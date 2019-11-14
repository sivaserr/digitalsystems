@extends('layouts.master')

@section('navbar_brand')
unit List
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="customer_title">
              <h4 class="card-title">unit details</h4>
          </div>

        <form  action="/unit_update/{{ $unit->id }}" method="POST">
                {{ csrf_field()}} <!--security token-->
                {{ method_field('PUT')}}

                <div class="modal-body">
                      <div class="form-group">
                          <label for="unit">unit Name</label>
                          <input type="text" class="form-control" name="unit" value="{{$unit->unit_name}}" id="unit" aria-describedby="unit" placeholder="Enter unit " required>
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
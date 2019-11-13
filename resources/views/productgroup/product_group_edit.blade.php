@extends('layouts.master')

@section('navbar_brand')
Product Group List
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="customer_title">
              <h4 class="card-title">Customers details</h4>
          </div>

        <form  action="/product_group_update/{{ $product_group->id }}" method="POST">
                {{ csrf_field()}} <!--security token-->
                {{ method_field('PUT')}}

                <div class="modal-body">
                      <div class="form-group">
                          <label for="productgroup">Product Name</label>
                          <input type="text" class="form-control" name="productgroup" value="{{$product_group->product_group}}" id="productgroup" aria-describedby="productgroup" placeholder="Enter Product group" required>
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
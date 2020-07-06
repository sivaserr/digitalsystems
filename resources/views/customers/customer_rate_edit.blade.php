@extends('layouts.master')

@section('navbar_brand')
Customer Rate Fixing
@endsection

@section('content')
<?php
  $customers = DB::table('customer')->select('customer.*')->get();
  $products = DB::table('products')->select('products.*')->get();
// var_dump($status);

?>
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="customer_title">
              <h4 class="card-title">Customers details</h4>
          </div>

        <form action="/customerrateupdate/{{ $customerratefixing->id }}" method="POST">
           {{ csrf_field() }}
           {{ method_field('PUT')}}
              <div class="modal-body">
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="customer">Customer</label>
                            <select name="customer" id="customer" class="form-control">
                            @foreach ($customers as $customer)
                            @if($customer->id === $customerratefixing->customer_id )
                           <option value="{{$customer->id}}"> {{$customer->name}}</option>
                            @endif
                            <!-- <option value="{{$customer->id}}" >{{$customer->name}}</option> -->
                            @endforeach
                                </select>
                            </div>
                              <div class="form-group">
                                  <label for="product">Product</label>
                              <select name="product" id="product" class="form-control">
                                  @foreach ($products as $product)
                                  @if($product->id == $customerratefixing->product_id)
                                    <option value="{{$product->id}}">{{$product->product_name}}</option>
                                  @endif
                                <!-- <option value="{{$product->id}}"> {{$product->product_name}}</option> -->
                                  @endforeach
                                </select> 
                              </div>
                              <div class="form-group">
                                  <label for="rate">Rate</label>
                              <input type="text" class="form-control" name="rate" id="rate" aria-describedby="rate" value="{{$customerratefixing->fixing_rate}}" required>
                                </div>
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
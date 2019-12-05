@extends('layouts.master')

@section('navbar_brand')
products
@endsection
<?php
$product_groups = DB::table('product_group')->select('product_group.*')->get();
$units =DB::table('units')->select('units.*')->get();
//$grp_dec = json_decode($data,true);
//var_dump($grp_dec);
$user = DB::table('product_group')->select('product_group.*')->get();

?>
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="customer_title">
              <h4 class="card-title">Customers details</h4>
          </div>

        <form  action="/product_update/{{ $products ->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT')}}
            <div class="modal-body">
                  <div class="form-group">
                      <label for="productname">Product Name</label>
                      <input type="text" class="form-control" name="productname"  value="{{$products->product_name}}" id="product_name" aria-describedby="product_name" placeholder="Enter Product Name" required>
                    </div>
                    <div class="form-group">
                        <label for="productname">Group</label>
                          <select name="productgroupid" id="company" class="form-control">
                            @foreach($product_groups as $grp)
                            @if($grp->id === $products->product_group)
                            <option value="{{$grp->product_group}}">{{$grp->product_group}}</option>
                            @endif
                            @endforeach
                          </select> 
                    </div>
                    <div class="form-group">
                        <label for="unitname">Unit</label>
                          <select name="unitid" id="unit" class="form-control">
                            @foreach ($units as $unit)
                            @if($unit->id === $products->unit_id )
                           <option value="{{$unit->id}}"> {{$unit->unit_name}}</option>
                            @endif
                            @endforeach
                          </select> 
                    </div>
                    <div class="form-group">
                      <label for="price">Price</label>
                      <input type="number" class="form-control" name="price"  value="{{$products->price}}" id="Price" aria-describedby="Price" placeholder="Enter Price" required>
                    </div>
                    {{-- <div class="form-group">
                      <label for="weight">Weight</label>
                      <input type="number" class="form-control" name="weight" value="{{$products->weight}}" id="weight" aria-describedby="weight" placeholder="Enter Weight" required>
                    </div>
                    <div class="form-group">
                      <label for="netweight">Net Weight</label>
                      <input type="number" class="form-control" name="netweight"  value="{{$products->net_weight}}" id="net_weight" aria-describedby="net_weight" placeholder="Enter Net Weight" required>
                    </div> --}}
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
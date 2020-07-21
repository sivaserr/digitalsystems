@extends('layouts.master')

@section('navbar_brand')
  Dashboard | Digital system
@endsection


@section('content')
<?php 
  $supplier = DB::table('suppliers')->select('suppliers.id')->count();
  $customer = DB::table('customer')->select('customer.id')->count();
  $product = DB::table('products')->select('products.id')->count();
?>

<div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
<!--                   <div class="col-md-12 col-xl-8">
                      <div class="card sale-card">
                      <div class="card-header">
                      <h5>Deals Analytics</h5>
                      </div>

                      </div>
                      </div> -->

<div class="col-sm-4">
  <div class="card comp-card">
   <div class="card-body">
                        <h6 class="m-b-25">Suppliers</h6>
                        <h3 class="f-w-700 text-c-blue">{{$supplier}}</h3>
                        <p class="m-b-0"> Update Now</p>
 </div>
 </div>
</div>
<div class="col-sm-4">
    <div class="card comp-card">
   <div class="card-body">
                        <h6 class="m-b-25">Customers</h6>
                        <h3 class="f-w-700 text-c-blue">{{$customer}}</h3>
                        <p class="m-b-0"> Update Now</p>
 </div>
 </div>
</div>
<div class="col-sm-4">
      <div class="card comp-card">

   <div class="card-body">
                        <h6 class="m-b-25">Products</h6>
                        <h3 class="f-w-700 text-c-blue">{{$product}}</h3>
                        <p class="m-b-0"> Update Now</p>
 </div>
 </div>
</div>

      
<!--                       <div class="col-md-12 col-xl-4">
                        <div class="card comp-card">
                        <div class="card-body">
                        <div class="row align-items-center">
                        <div class="col">
                        <h6 class="m-b-25">Impressions</h6>
                        <h3 class="f-w-700 text-c-blue">1,563</h3>
                        <p class="m-b-0">May 23 - June 01 (2017)</p>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-eye bg-c-blue"></i>
                        </div>
                         </div>
                        </div>
                        </div>
                        <div class="card comp-card">
                        <div class="card-body">
                        <div class="row align-items-center">
                        <div class="col">
                        <h6 class="m-b-25">Goal</h6>
                        <h3 class="f-w-700 text-c-green">30,564</h3>
                        <p class="m-b-0">May 23 - June 01 (2017)</p>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-bullseye bg-c-green"></i>
                        </div>
                        </div>
                        </div>
                        </div>
                        <div class="card comp-card">
                        <div class="card-body">
                        <div class="row align-items-center">
                        <div class="col">
                        <h6 class="m-b-25">Impact</h6>
                        <h3 class="f-w-700 text-c-yellow">42.6%</h3>
                        <p class="m-b-0">May 23 - June 01 (2017)</p>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-hand-paper bg-c-yellow"></i>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div> -->

              </div>

          </div>
        </div>

      </div>
@endsection


@section('scripts')

@endsection
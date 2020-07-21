@extends('layouts.master')

@section('navbar_brand')
    Profit or Loss
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
<?php
   $set_trip = DB::table('set_trip')->select('set_trip.set_trip')->first();
   $trips = DB::table('trips')->select('trips.*')->get();

   $purchases = DB::table('purchases')->select('purchases.trip_id',DB::raw("SUM(current_balance) as purchase"))->where('purchases.trip_id','=',$set_trip->set_trip)->first();

   $sales = DB::table('sales')->select(DB::raw("SUM(current_balance) as sale"))->where('sales.trip_id','=',$set_trip->set_trip)->first();

 //var_dump($trips);exit;

?>

<div class="row">
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="unit_title">
          <h4 class="card-title">Profit or Loss</h4>
      </div>
    </div>
    
<div class="profit">
           <form  action="{{ route('addprofit') }}" method="POST">
          {{ csrf_field()}} <!--security token-->

          <div class="modal-body">
            <input type="hidden" name="trip" value="{{$purchases->trip_id}}">
            <div class="row">
              <div class="col-sm-3">
                <div class="form-group">
                    <label for="purchase">Purchase</label>
                    <input type="text" class="form-control" name="purchase" id="purchase" value="{{number_format($purchases->purchase)}}" required readonly>
                </div>                
              </div>
              <div class="col-sm-3">
                    <div class="form-group">
                    <label for="expense">Total expense</label>
                    <input type="text" class="form-control" name="expense" id="expense" oninput ="profitorloss()" required>
                </div> 
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                    <label for="sales">Sales</label>
                    <input type="text" class="form-control" name="sales" id="sales" value="{{number_format($sales->sale)}}" required readonly>
                </div> 
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                    <label for="sales">Profit</label>
                    <input type="text" class="form-control" name="profit" id="profit" required readonly>
                </div> 
              </div>
            </div>
            </div>
            <div class="modal-footer border-top-0 d-flex justify-content-center">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </form>
</div>
    <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>S.No</th>
                  <th>Trip</th>
                  <th>Purchase</th>
                  <th>Total expense</th>
                  <th>Sales</th>
                  <th>Profit</th>
<!--                   <th>Edit</th>
                  <th>Delete</th>
 -->                </thead>
                <tbody>
                    <?php $id = 1; ?>
                    @foreach($profits as $profit)
                  <tr>
                  <td>{{$id}}</td>
                  @foreach($trips as $trip)
                  @if($trip->id === $profit->trip_id)
                  <td>{{$trip->trip_name}}</td>
                  @endif
                  @endforeach
                  <td>{{number_format($profit->purchase_amount)}}</td>
                  <td>{{number_format($profit->total_expense)}}</td>
                  <td>{{number_format($profit->sale_amount)}}</td>
                  <td>{{number_format($profit->profit)}}</td>
<!--                   <td><a href="#" class="btn btn-sm btn-info">Edit <span class="glyphicon glyphicon-edit"></span></a></td>
                  <td><a href="#" class="btn btn-sm btn-danger">Delete</a></td> -->
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
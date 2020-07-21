@extends('layouts.master')
@section('navbar_brand')
Customer trip wise Consolidation report
@endsection

@section('content')
 <?php

   $customers = DB::table('customer')->select('customer.*')->get();
   $trips = DB::table('trips')->select('trips.*')->get();



//var_dump($productslist);exit;
   ?> 
<div class="row">
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="unit_title">
          <h4 class="card-title">Customer trip wise Consolidation report</h4>
      </div>

    </div>
    
    <div class="account_details">
      <form  action="/trip-wise-report" method="POST">
        {{ csrf_field() }}
      <div class="container">
        <div class="row">
    <div class="col-sm-6">
              <div class="form-group">
                    <label for="payment">Customer</label>
              <select id="customer" class="form-control" name="customer" >
              <option>Chosse</option>
              @foreach($customers as $customer)
              <option value="{{$customer->id}}">{{$customer->name}}</option>
              @endforeach
              </select>
              </div>
    </div>
    <div class="col-sm-6">

              <button type="submit" class="btn btn-success">Submit</button>
    </div>
  </div>

    </div>
    </form>
    </div>


    <div class="card-body">
            <div class="table-responsive">
              <table class="table consol_table">
                <thead class=" text-primary">

                  <tr scope="row">
                    <th colspan="20" style="text-align: center;">A.R.S TRADERS</th>
                  </tr>

                  <tr scope="row">
                  <th>S.no</th>
                  <th>Date</th>
                  <th>Trip</th>
                  <th>Bill Amount</th>
                  <th>Pending</th>
                  <th>Box</th>
                  <th>Pending Box</th>
<!--                   <th>Total-box</th>
                  <th>Taken-box</th>
                  <th>Remain-box</th> -->
                  </tr>

                </thead>
                <tbody>
                <?php $id = 1; ?>

@foreach($customertripreports as $customertripreport)
                  <tr>
                  <td>{{$id}}</td>
                  <td>{{$customertripreport->date}}</td>
                  @foreach($trips as $trip)
                  @if($trip->id == $customertripreport->trip_id)
                  <td>{{$trip->trip_name}}</td>
                  @endif
                  @endforeach
                  <td>{{$customertripreport->current_balance}}</td>
                  <td>{{$customertripreport->amount_pending}}</td>
                  <td>{{$customertripreport->today_box}}</td>
                  <td>{{$customertripreport->box_pending}}</td>
<!--                   <td></td>
                  <td></td>
                  <td></td> -->
                  </tr>
                  <?php $id++?>

@endforeach


                </tbody>
              </table>
            </div>
          </div>
  </div>
</div>
</div>
@endsection
@section('scripts')




@endsection
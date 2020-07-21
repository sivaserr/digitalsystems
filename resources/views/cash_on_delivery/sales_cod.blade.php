@extends('layouts.master')

@section('navbar_brand')
    Sales cash on delivery
@endsection
@section('content')
    <?php 
      $set_trip = DB::table('set_trip')->select('set_trip.set_trip')->first();
      $customers = DB::table('customer')->select('customer.*')->get();
      $sales =DB::table('sales')
              ->join('sales_cod','sales.id','=','sales_cod.sale_id')
              ->select('sales.sale_no','sales_cod.*')->where('sales.trip_id','=',$set_trip->set_trip)->get();
    ?>
<div class="row">
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="unit_title">
          <h4 class="card-title">Sales Cash Recived list </h4>
      </div>

    </div>
    



    <div class="card-body">
            <div class="table-responsive">
              <table class="table stock_table">
                <thead class=" text-primary">
                  <th>S.No</th>
                  <th>Bill No</th>
                  <th>Date</th>
                  <th>Customer</th>
                  <th>Bill Amount</th>
                  <th>Recived Amount</th>
                  <th>Balance</th>
                </thead>
                <tbody>
                    <?php $id = 1;?>
                    @foreach($sales as $sale)
                  <tr>
                  <td>{{$id}}</td>
                  <td>{{$sale->sale_no}}</td>
                  <td>{{Carbon\Carbon::parse($sale->date)->format('d-m-Y')}}</td>
                  @foreach($customers as $customer)
                  @if($customer->id == $sale->customer_id)
                  <td>{{$customer->name}}</td>
                  @endif
                  @endforeach
                  <td>{{$sale->bill_amount}}</td>
                  <td>{{$sale->recived_amount}}</td>
                  <td>{{$sale->balance}}</td>
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
@extends('layouts.master')

@section('navbar_brand')
    Purchases cash on delivery
@endsection
@section('content')
    <?php 
      $set_trip = DB::table('set_trip')->select('set_trip.set_trip')->first();
      $suppliers = DB::table('suppliers')->select('suppliers.*')->get();
      $purchases =DB::table('purchases')
                  ->join('purchase_cod','purchases.id','=','purchase_cod.bill_id')
                  ->select('purchases.bill_no','purchase_cod.*')->where('purchases.trip_id','=',$set_trip->set_trip)->get();
    
//   var_dump($purchases);exit;

    ?>
<div class="row">
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="unit_title">
          <h4 class="card-title">Purchase Cash Recived list </h4>
      </div>

    </div>
    



    <div class="card-body">
            <div class="table-responsive">
              <table class="table stock_table">
                <thead class=" text-primary">
                  <th>S.No</th>
                  <th>Bill No</th>
                  <th>Date</th>
                  <th>Supplier</th>
                  <th>Bill Amount</th>
                  <th>Recived Amount</th>
                  <th>Balance</th>
                </thead>
                <tbody>
                    <?php $id = 1;?>
                    @foreach($purchases as $purchases)
                  <tr>
                  <td>{{$id}}</td>
                  <td>{{$purchases->bill_no}}</td>
                  <td>{{Carbon\Carbon::parse($purchases->date)->format('d-m-Y')}}</td>
                  @foreach($suppliers as $supplier)
                  @if($supplier->id == $purchases->supplier_id)
                  <td>{{$supplier->supplier_name}}</td>
                  @endif
                  @endforeach
                  <td>{{$purchases->bill_amount}}</td>
                  <td>{{$purchases->recived_amount}}</td>
                  <td>{{$purchases->balance}}</td>
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
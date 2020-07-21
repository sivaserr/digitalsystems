@extends('layouts.master')

@section('navbar_brand')

Purchase Day Report
@endsection

<style type="text/css">
	#billcustomer {
    padding: 9px;
}
.button {
    text-align: center;
    padding-top: 10px;
}
.report_title {
    text-align: center;
}
.filterdate {
    width: 50%;
    margin: 0 auto;
}
.filterbutton {
    width: 50%;
    margin: 0 auto;
    text-align: center;
}
#submit {
    margin-top: 24px;
}
</style>
@section('content')
    <?php 
    $set_trip = DB::table('set_trip')->select('set_trip.set_trip')->first();
    $suppliers = DB::table('suppliers')->select('suppliers.*')->get();
    $purchases = DB::table('purchases')->select('purchases.*')->get();
    
    $payment =DB::table('purchases')
                  ->join('purchase_cod','purchases.id','=','purchase_cod.bill_id')
                  ->join('paid_details','purchases.id','=','paid_details.bill_id')
                  ->select('purchases.bill_no','purchase_cod.*')->where('purchases.trip_id','=',$set_trip->set_trip)->get();
    //$bills = DB::table('bills')->select('bills.*')->get();
    
    //var_dump($payment);
    ?>
          <div class="card">
            <div class="card-header">
              <div class="report_title">
                  <h4 class="card-title">Purchase Day wise report </h4>
              </div>

            </div>   




        <div class="container">

<form method="POST" action="/purchasepayment_day_report">
  {{ csrf_field() }}
  <div class="row">

    <div class="col-sm-6">
        <div class="form-group filterdate">
            <label for="Date">Date</label>
            <input type="Date" class="form-control" id="Date" name="data" value="">
          </div>
                <div class="filterbutton">
          <button type="submit" id="submit" class="btn btn-success">Submit</button>
      </div>
    </div>
    <div class="col-sm-6">

    </div>
  </div>


</form>

    </div>

<div class="report_body">

    
    <div class="output">


<div class="title">



</div>


     <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Bill no</th>
            <th scope="col">Suppliers</th>
            <th scope="col">Date</th>
            <th scope="col">Paid Amount</th>
            <th scope="col">Return Box</th>
          </tr>
        </thead>
        <tbody>
          <?php $id = 1?>
            @if(count($Purchasepayments) > 0)
            @foreach($Purchasepayments as $Purchasepayment)

          <tr>
          <th scope="row">{{$id}}</th>
          @foreach($purchases as $purchase)
          @if($purchase->id == $Purchasepayment->bill_id)
            <td>{{$purchase->bill_no}}</td>
          @endif
          @endforeach
            @foreach($suppliers as $supplier)
            @if($Purchasepayment->supplier_id == $supplier->id)
            <td>{{$supplier->supplier_name}}</td>
            @endif
            @endforeach
            <td>{{Carbon\Carbon::parse($Purchasepayment->date)->format('d-m-Y')}}</td>
            <td>{{number_format($Purchasepayment->debit + $Purchasepayment->recived_amount)}}</td>
            <td>{{$Purchasepayment->return_box}}</td>
          <td><a href="purchasepayment/{{$Purchasepayment->bill_id}}" class="btn btn-sm btn-info">View</a>
          </td>
          </tr>
          <?php $id++;?>

          @endforeach


          @endif

        </tbody>
      </table>
	</div>
</div>
        </div>

@endsection
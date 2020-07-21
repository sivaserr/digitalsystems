@extends('layouts.master')

@section('navbar_brand')

Purchase Payment Weekly and Monthly Report
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
    $suppliers = DB::table('suppliers')->select('suppliers.*')->get();
    $purchases = DB::table('purchases')->select('purchases.*')->get();

    //$bills = DB::table('bills')->select('bills.*')->get();
    
    // var_dump($bills);
    ?>
          <div class="card">
            <div class="card-header">
              <div class="report_title">
                  <h4 class="card-title">Purchase Payment Weekly and Monthly report </h4>
              </div>

            </div>   




        <div class="container">

<form method="POST" action="/purchasepayment_month_report">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-sm-5">
        <div class="form-group filterdate">
            <label for="fromDate">From Date</label>
            <input type="Date" class="form-control" id="fromDate" name="fromdate" value="">
          </div>
    </div>
      <div class="col-sm-5">
        <div class="form-group filterdate">
            <label for="toDate">To Date</label>
            <input type="Date" class="form-control" id="toDate" name="todate" value="">
          </div>
    </div>
    <div class="col-sm-2">
      <div class="filterbutton">
          <button type="submit" id="submit" class="btn btn-success">Submit</button>
      </div>
    </div>
  </div>


</form>


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
            @if(count($purchasepayments) > 0)
            @foreach($purchasepayments as $purchasepayment)

          <tr>
          <th scope="row">{{$id}}</th>
          @foreach($purchases as $purchase)
          @if($purchase->id == $purchasepayment->bill_id)
            <td>{{$purchase->bill_no}}</td>
          @endif
          @endforeach
            @foreach($suppliers as $supplier)
            @if($purchasepayment->supplier_id === $supplier->id)
            <td>{{$supplier->supplier_name}}</td>
            @endif
            @endforeach
            <td>{{Carbon\Carbon::parse($purchasepayment->date)->format('d-m-Y')}}</td>
            <td>{{number_format($purchasepayment->debit + $purchasepayment->recived_amount)}}</td>
            <td>{{$purchasepayment->return_box}}</td>
          <td><a href="purchasepayment/{{$purchasepayment->bill_id}}" class="btn btn-sm btn-info">View</a>
          </td>
          </tr>
          <?php $id++;?>

          @endforeach


          @endif

        </tbody>
      </table>

        </div>

@endsection
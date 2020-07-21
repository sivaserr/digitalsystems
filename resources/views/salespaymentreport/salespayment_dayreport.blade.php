@extends('layouts.master')

@section('navbar_brand')

Sales Payment Day Report
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
    $customers = DB::table('customer')->select('customer.*')->get();
    $sales = DB::table('sales')->select('sales.*')->get();
    //$bills = DB::table('bills')->select('bills.*')->get();
    
    // var_dump($bills);
    ?>
          <div class="card">
            <div class="card-header">
              <div class="report_title">
                  <h4 class="card-title">Sales Payment Day wise report </h4>
              </div>

            </div>   




        <div class="container">

<form method="POST" action="/salespayment_day_report">
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
            <th scope="col">Customers</th>
            <th scope="col">Date</th>
            <th scope="col">Paid Amount</th>
            <th scope="col">Return Box</th>
          </tr>
        </thead>
        <tbody>
          <?php $id = 1?>
            @if(count($Salespayments) > 0)
            @foreach($Salespayments as $Salespayment)

          <tr>
          <th scope="row">{{$id}}</th>
          @foreach($sales as $sale)
          @if($sale->id == $Salespayment->sale_id)
            <td>{{$sale->sale_no}}</td>
          @endif
          @endforeach
            @foreach($customers as $customer)
            @if($Salespayment->customer_id === $customer->id)
            <td>{{$customer->name}}</td>
            @endif
            @endforeach
            <td>{{Carbon\Carbon::parse($Salespayment->date)->format('d-m-Y')}}</td>
            <td>{{number_format($Salespayment->credit + $Salespayment->recived_amount)}}</td>
            <td>{{$Salespayment->return_box}}</td>
          <td><a href="salespayment/{{$Salespayment->sale_id}}" class="btn btn-sm btn-info">View</a>
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
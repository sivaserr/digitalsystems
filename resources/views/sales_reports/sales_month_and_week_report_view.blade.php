@extends('layouts.master')

@section('navbar_brand')

Sales Weekly and Monthly Report
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
    //$bills = DB::table('bills')->select('bills.*')->get();
    
    // var_dump($bills);
    ?>
          <div class="card">
            <div class="card-header">
              <div class="report_title">
                  <h4 class="card-title">Sales Weekly and Monthly report </h4>
              </div>

            </div>   




        <div class="container">

<form method="POST" action="/sales_month_and_week_report">
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
            <th scope="col">Sales no</th>
            <th scope="col">Customer</th>
            <th scope="col">Date</th>
            <th scope="col">Box</th>
            <th scope="col">Netvalue</th>
          </tr>
        </thead>
        <tbody>
          <?php $id = 1?>
            @if(count($salesbills) > 0)
            @foreach($salesbills as $salesbill)

          <tr>
          <th scope="row">{{$id}}</th>
            <td>{{$salesbill->sales_no}}</td>
            @foreach($customers as $customer)
            @if($salesbill->customer_id === $customer->id)
            <td>{{$customer->name}}</td>
            @endif
            @endforeach
            <td>{{Carbon\Carbon::parse($salesbill->date)->format('d-m-Y')}}</td>
            <td>{{$salesbill->total_box}}</td>
            <td>{{number_format($salesbill->current_balance)}}</td>
          <td><a href="salesbillviewedit/{{$salesbill->id}}" class="btn btn-sm btn-info">View</a>
          </td>
          </tr>
          <?php $id++;?>

          @endforeach
          @endif
        </tbody>
      </table>

        </div>

@endsection
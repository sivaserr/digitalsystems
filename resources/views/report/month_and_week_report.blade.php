@extends('layouts.master')

@section('navbar_brand')

Purchase Monthly And Weekly Report
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
    //$bills = DB::table('bills')->select('bills.*')->get();
    
    // var_dump($bills);
    ?>
          <div class="card">
            <div class="card-header">
              <div class="report_title">
                  <h4 class="card-title">Purchase Monthly And Weekly Report</h4>
              </div>

            </div>   




        <div class="container">

<form method="POST" action="/month_and_week_report">
  {{ csrf_field() }}
  <div class="row">
    {{-- <div class="col-sm-4">
        <div class="form-group">
            <label for="billcustomer">Customer</label>
            <select name="billcustomer" id="billcustomer" class="form-control">
                  @foreach ($customers as $customer) 
                  @if($customer->status === 1)
                  <option value="{{$customer->id}}">{{$customer->name}}</option>
                @endif
                 @endforeach
            </select>
          </div>
    </div> --}}
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
                    {{-- <div class="row">
        	<div class="col-sm-4">
            <div class="customer_status">
            <label for="phone">Customer</label>
           <select name="billcustomer" id="billcustomer" class="form-control">
              @foreach ($customer as $customers) 
              @if($customers->status === 1)
              <option value="{{$customers->id}}">{{$customers->name}} </option>
            @endif
             @endforeach
           </select>
         </div>
        	</div>
        	<div class="col-sm-4">
          <div class="form-group">
            <label for="name">Date</label>
            <input type="text" class="form-control" value="" name="date" id="date" aria-describedby="date" placeholder="Enter date" required>
          </div>
        	</div>
        	<div class="col-sm-4">
        		<div class="button">
        			    <button type="submit" id="submit" class="btn btn-success">Submit</button>
        		</div>
        	</div>

        </div>   --}}

    </div>

<div class="table-responsive">
         <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Bill no</th>
            <th scope="col">Suppliers</th>
            <th scope="col">Date</th>
            <th scope="col">Box</th>
            <th scope="col">Netvalue</th>
          </tr>
        </thead>
        <tbody>
          <?php $id = 1?>
            @if(count($bills) > 0)
            @foreach($bills as $bill)

          <tr>
          <th scope="row">{{$id}}</th>
            <td>{{$bill->bill_no}}</td>
            @foreach($suppliers as $supplier)
            @if($bill->supplier_id === $supplier->id)
            <td>{{$supplier->supplier_name}}</td>
            @endif
            @endforeach
            <td>{{Carbon\Carbon::parse($bill->date)->format('d-m-Y')}}</td>
            <td>{{$bill->total_box}}</td>
            <td>{{number_format($bill->current_balance)}}</td>
          <td><a href="billviewedit/{{$bill->id}}" class="btn btn-sm btn-info">View</a>
          </td>
          </tr>
          <?php $id++;?>

          @endforeach


          @endif

        </tbody>
      </table>

<!-- <div class="report_body">

    
    <div class="output">


<div class="title">
            @if(count($bills) > 0)
             @foreach($bills as $bill)

          <h1>{{$bill->bill_no}}</h1>
     @endforeach
@endif
</div>


	</div>
</div> -->
        </div>
      </div>

@endsection
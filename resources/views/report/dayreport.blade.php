@extends('layouts.master')

@section('navbar_brand')

Day Report
@endsection

<style>
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
                  <h4 class="card-title">Day wise report </h4>
              </div>

            </div>   




        <div class="container">

<form method="POST" action="/report">
  {{ csrf_field() }}
  <div class="row">
<!--      <div class="col-sm-4">
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
    </div>  -->
    <div class="col-sm-6">
        <div class="form-group filterdate">
            <label for="Date">Date</label>
            <input type="Date" class="form-control" id="Date" name="data" value="">
          </div>
    </div>
    <div class="col-sm-6">
      <div class="filterbutton">
          <button type="submit" id="submit" class="btn btn-success">Submit</button>
      </div>
    </div>
  </div>


</form>
  

    </div>

<div class="report_body">

    
    <div class="output">
<!--      <table>
       <thead>
          <th>customer</th>
         <th>date</th> 
       </thead>
       <tbody>
         @foreach($Bills as $Bill)
          <tr>
           
            <td>

            </td>
            <td>
              </td> 
          </tr>
         @endforeach
       </tbody>
     </table>
=======

>>>>>>> 8fbb484715621285d4ef58ea0907ab9a4d4d2c30

<div class="title">



</div> -->


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
            @if(count($Bills) > 0)
            @foreach($Bills as $Bill)

          <tr>
          <th scope="row">{{$id}}</th>
            <td>{{$Bill->bill_no}}</td>
            @foreach($suppliers as $supplier)
            @if($Bill->supplier_id === $supplier->id)
            <td>{{$supplier->supplier_name}}</td>
            @endif
            @endforeach
            <td>{{$Bill->date}}</td>
            <td>{{$Bill->total_box}}</td>
            <td>{{$Bill->overall}}</td>
          <td><a href="billviewedit/{{$Bill->id}}" class="btn btn-sm btn-info">View</a>
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
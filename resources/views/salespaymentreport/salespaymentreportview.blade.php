@extends('layouts.master')

@section('navbar_brand')

Sales Payment Day Report
@endsection
<style>
.billviewproduct {
    border-top: 1px solid #7777;
}
.billviewproduct th {
    font-weight: bold!important;
    font-size: 14px!important;
}
.printbtn {
    text-align: center;
}
.purchase_header {
    text-align: center;
    padding-top: 30px;
}
.purchase_header h5 b {
    color: #00adef;
}
</style>
    <?php 
    $sales_products = DB::table('sales_products')->select('sales_products.*')->get();
    $sales_paid_details = DB::table('sales_paid_details')->select('sales_paid_details.*')->get();

    $sales_paid_details = DB::table('sales_paid_details')
                    ->join('sales_cod','sales_paid_details.sale_id','=','sales_cod.sale_id')
                    ->select('sales_paid_details.*','sales_cod.recived_amount')->get();

    $products = DB::table('products')->select('products.*')->get();
    $trips = DB::table('trips')->select('trips.*')->get();
    $customers = DB::table('customer')->select('customer.*')->get();
    
    //var_dump($paid_details);exit;
    ?>
@section('content')
<div class="card">
        <?php 
        // $bills = DB::table('bills')->select('bills.*')->get();
        
        // var_dump($bills);
        ?>
<div class="container">
  <div class="printcontent" id="printcontent">
    <div class="purchase_header">
      <h5><b>Sales</b></h5>
    </div>
      <div class="card-header">
        Bill no : <strong>{{$salespayment->sale_no}}</strong> 
        <span class="float-right"> <strong>Date :</strong> {{Carbon\Carbon::parse($salespayment->date)->format('d-m-Y')}}</span>
        @foreach($trips as $trip)
        @if($salespayment->trip_id === $trip->id)
        <div class="trip">Trip : {{$trip->trip_name}}</div>
        @endif
        @endforeach
      </div>
      <div class="card-body">
      <div class="row mb-4">
      <div class="col-sm-6">
      <h6 class="mb-3">From:</h6>
      <div>
        @foreach ($customers as $customer)
        @if($salespayment->customer_id === $customer->id )
        <strong>{{$customer->name}}</strong>
        @endif
        @endforeach
      </div>

      </div>
      

      
      
      
      </div>
      
      <div class="billviewproduct">
            <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Sno</th>
                        <th scope="col">Product</th>
                        <th scope="col">Box</th>
                        <th scope="col">KG</th>
                        <th scope="col">N-wgt</th>
                        <th scope="col">Loose box</th>
                        <th scope="col">Loose kg</th>
                        <th scope="col">Total Weight</th>
                        <th scope="col">price</th>
                        <th scope="col">N-val</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $id=1;
                        ?>

                      <tr>
                          @foreach($sales_products as $sales_product)
                          @if($salespayment->id == $sales_product->sales_id)
                      <th scope="row">{{$id}}</th>
                        @foreach($products as $product)
                        @if($sales_product->product_id == $product->id)
                        <td>{{$product->product_name}}</td>
                        @endif
                        @endforeach

                        <td>{{$sales_product->box}}</td>
                        <td>{{$sales_product->weight}}</td>
                        <td>{{$sales_product->net_weight}}</td>
                        <td>{{$sales_product->loose_box}}</td>
                        <td>{{$sales_product->loose_kg}}</td>
                        <td>{{$sales_product->total_weight}}</td>
                        <td>{{$sales_product->price}}</td>
                        <td>{{number_format($sales_product->netvalue)}}</td>
                      </tr>
                      <?php 
                      $id++ ?>
                      @endif
                      @endforeach

                    </tbody>
                  </table>
      </div>



      <div class="row clearfix" style="margin-top:20px">
            <div class="col-sm-6">
                <table class="table table-bordered table-hover" id="tab_logic_total">
                    <tbody>
                      <tr>
                        <th class="text-center">Total No of Box(T-box + L-box)</th>
                        <td class="text-center">{{$salespayment->total_no_of_box}}</td>
                      </tr>
                      <tr>
                        <th class="text-center">Today Box</th>
                        <td class="text-center">{{$salespayment->today_box}}</td>
                      </tr>
                      <tr>
                        <th class="text-center">Balances Box</th>
                        <td class="text-center">{{$salespayment->balance_box}}</td>
                      </tr>
                      <tr>
                        <th class="text-center">Total Box</th>
                        <td class="text-center">{{$salespayment->total_box}}</td>
                      </tr>
                    </tbody>
                  </table>          </div>
            <div class="pull-right col-md-6">
              <table class="table table-bordered table-hover" id="tab_logic_total2">
                <tbody>
                  <tr>
                    <th class="text-center">Grass Amount</th>
                    <td class="text-center">{{number_format($salespayment->grass_amount)}}</td>
                  </tr>
                  <tr>
                    <th class="text-center">Transport Charge</th>
                    <td class="text-center">{{number_format($salespayment->transport_charge)}}</td>
                  </tr>
                  <tr>
                    <th class="text-center">Excess</th>
                    <td class="text-center">{{number_format($salespayment->excess)}}</td>
                  </tr>
                  <tr>
                    <th class="text-center">Discount</th>
                    <td class="text-center">{{number_format($salespayment->less)}}</td>
                  </tr>
                  <tr>
                    <th class="text-center">Current Bill Amount</th>
                    <td class="text-center">{{number_format($salespayment->current_balance)}}</td>
                  </tr>
                  <tr>
                    <th class="text-center">previous Balance</th>
                    <td class="text-center">{{number_format($salespayment->pre_balance)}}</td>
                  </tr>
                  <tr>
                    <th class="text-center">Overall Balance</th>
                    <td class="text-center">{{number_format($salespayment->overall)}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>


                <table class="table table-bordered table-hover" id="tab_logic_total">
                    <tbody>
                      @foreach($sales_paid_details as $sales_paid_detail)
                        @if($salespayment->id == $sales_paid_detail->sale_id)
                      <tr>
                        <th class="text-center">Current Bill Amount</th>
                        <td class="text-center">{{number_format($salespayment->current_balance)}}</td>
                      </tr>
                      <tr>
                        <th class="text-center">( {{$sales_paid_detail->date}} )Cash Recived</th>
                        <td class="text-center">{{number_format($sales_paid_detail->credit + $sales_paid_detail->recived_amount)}}</td>
                      </tr>
                      <tr>
                        <th class="text-center">Total</th>
                        <td class="text-center">{{number_format($salespayment->current_balance - $sales_paid_detail->credit - $sales_paid_detail->recived_amount)}}</td>
                      </tr>
                      @endif
                      @endforeach
                    </tbody>
                  </table> 


      </div>
      </div>
      </div>
      <div class="printbtn">
          <a href="#" class="btn btn-sm btn-info" onclick="myFunction('printcontent')" >Print</a>
      </div>
      </div>
@endsection
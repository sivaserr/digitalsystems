@extends('layouts.master')

@section('navbar_brand')

Day Report
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
    $bill_datas = DB::table('bill_data')->select('bill_data.*')->get();
    $products = DB::table('products')->select('products.*')->get();
    $trips = DB::table('trips')->select('trips.*')->get();
    $suppliers = DB::table('suppliers')->select('suppliers.*')->get();
    
    // var_dump($bill_datas);
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
      <h5><b>PURCHASE</b></h5>
    </div>
      <div class="card-header">
        Bill no : <strong>{{$Bills->bill_no}}</strong> 
        <span class="float-right"> <strong>Date :</strong> {{$Bills->date}}</span>
        @foreach($trips as $trip)
        @if($Bills->trip_id === $trip->id)
        <div class="trip">Trip : {{$trip->trip_name}}</div>
        @endif
        @endforeach
      </div>
      <div class="card-body">
      <div class="row mb-4">
      <div class="col-sm-6">
      <h6 class="mb-3">From:</h6>
      <div>
        @foreach ($suppliers as $supplier)
        @if($Bills->supplier_id === $supplier->id )
        <strong>{{$supplier->supplier_name}}</strong>
        @endif
        @endforeach
      </div>
      {{-- <div>Madalinskiego 8</div>
      <div>71-101 Szczecin, Poland</div>
      <div>Email: info@webz.com.pl</div>
      <div>Phone: +48 444 666 3333</div> --}}
      </div>
      
      {{-- <div class="col-sm-6">
      <h6 class="mb-3">To:</h6>
      <div>
      <strong>ARS</strong>
      </div>
      <div>Attn: Daniel Marek</div>
      <div>43-190 Mikolow, Poland</div>
      <div>Email: marek@daniel.com</div>
      <div>Phone: +48 123 456 789</div>
      </div> --}}
      
      
      
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
                        <th scope="col">per(kg)-Rs</th>
                        <th scope="col">Actual Rs</th>
                        <th scope="col">Dis%</th>
                        <th scope="col">Dis price</th>
                        <th scope="col">N-val</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $id=1;
                          $current_value = 0;
                        ?>

                      <tr>
                          @foreach($bill_datas as $bill_data)
                          @if($Bills->id === $bill_data->bill_id)
                      <th scope="row">{{$id}}</th>
                        @foreach($products as $product)
                        @if($bill_data->product_id === $product->id)
                        <td>{{$product->product_name}}</td>
                        @endif
                        @endforeach
                        <td>{{$bill_data->box}}</td>
                        <td>{{$bill_data->weight}}</td>
                        <td>{{$bill_data->net_weight}}</td>
                        <td>{{$bill_data->per_kg_price}}</td>
                        <td>{{$bill_data->actual_price}}</td>
                        <td>{{$bill_data->discount}}</td>
                        <td>{{$bill_data->discount_price}}</td>
                        <td>{{$bill_data->net_value}}</td>
                      </tr>
                      <?php 
                      $current_value += $bill_data->net_value;
                      $id++ ?>

                      @endif
                      @endforeach

                    </tbody>
                    {{-- <tfoot>
                        <tr>
                          <td></td>
                          <td></td>
                          <td class="text-center totalrowbox" ><span>T-Box</span><input type="text" id="totalrowbox" placeholder="0" readonly /></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class="text-center totalrownetvalue"><span>T-val</span><input type="text" id="totalrownetvalue" placeholder="0" readonly /></td>
                        </tr>
                      </tfoot> --}}
                  </table>
      </div>



      <div class="row clearfix" style="margin-top:20px">
            <div class="col-sm-6">
                <table class="table table-bordered table-hover" id="tab_logic_total">
                    <tbody>
                      <tr>
                        <th class="text-center">Total Box</th>
                        <td class="text-center">{{$Bills->total_box}}</td>
                      </tr>
                      <tr>
                        <th class="text-center">Pre Box</th>
                        <td class="text-center">0</td>
                      </tr>
                      <tr>
                        <th class="text-center">Ice Bar</th>
                        <td class="text-center">{{$Bills->ice_bar}}</td>
                      </tr>
                      <tr>
                        <th class="text-center">Per-ice Bar Amount</th>
                        <td class="text-center">{{$Bills->per_ice_bar}}</td>
                      </tr>
                      <tr>
                        <th class="text-center">Total Ice Bar Amount</th>
                        <td class="text-center">{{$Bills->total_ice_bar}}</td>
                      </tr>
                      <tr>
                        <th class="text-center">Packing Charge</th>
                        <td class="text-center">{{$Bills->per_packing_price}}</td>
                      </tr>
                    </tbody>
                  </table>          </div>
            <div class="pull-right col-md-6">
              <table class="table table-bordered table-hover" id="tab_logic_total2">
                <tbody>
                  <tr>
                    <th class="text-center">Transport Charge</th>
                    <td class="text-center">{{$Bills->transport_charge}}</td>
                  </tr>
                  <tr>
                    <th class="text-center">Ice Bar</th>
                    <td class="text-center">{{$Bills->total_icebar}}</td>
                  </tr>
                  <tr>
                    <th class="text-center">Discount</th>
                    <td class="text-center">{{$Bills->less}}</td>
                  </tr>
                  <tr>
                    <th class="text-center">Packing Charge</th>
                    <td class="text-center">{{$Bills->packing_charge}}</td>
                  </tr>
                  <tr>
                    <th class="text-center">Excess</th>
                    <td class="text-center">{{$Bills->excess}}</td>
                  </tr>
                  <tr>
                    <th class="text-center">previous Balance</th>
                    <td class="text-center">{{$Bills->previous_balance}}</td>
                  </tr>
                  <tr>
                    <th class="text-center">Current Bill Amount</th>
                    <td class="text-center">{{$current_value}}</td>
                  </tr>
                  <tr>
                    <th class="text-center">Overall Balance</th>
                    <td class="text-center">{{$Bills->overall}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>


      </div>
      </div>
      </div>
      <div class="printbtn">
          <a href="#" class="btn btn-sm btn-info" onclick="myFunction('printcontent')" >Print</a>
      </div>
      </div>
@endsection
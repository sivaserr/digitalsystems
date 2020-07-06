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
    $purchases_products = DB::table('purchases_products')->select('purchases_products.*')->get();
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
                        <th scope="col">Loose-box</th>
                        <th scope="col">Loose-kg</th>
                        <th scope="col">N-wgt</th>
                        <th scope="col">Dis%</th>
                        <th scope="col">Total Weight</th>
                        <th scope="col">Per(kg)-Rs</th>
                        <th scope="col">N-val</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $id=1;
                          // $current_value = 0;
                        ?>

                      <tr>
                          @foreach($purchases_products as $purchases_product)
                          @if($Bills->id === $purchases_product->bill_id)
                      <th scope="row">{{$id}}</th>
                        @foreach($products as $product)
                        @if($purchases_product->product_id === $product->id)
                        <td>{{$product->product_name}}</td>
                        @endif
                        @endforeach
                        <td>{{$purchases_product->box}}</td>
                        <td>{{$purchases_product->weight}}</td>
                        <td>{{$purchases_product->loose_box}}</td>
                        <td>{{$purchases_product->loose_kg}}</td>
                        <td>{{$purchases_product->net_weight}}</td>
                        <td>{{$purchases_product->discount}}</td>
                        <td>{{$purchases_product->total_weight}}</td>
                        <td>{{$purchases_product->price}}</td>
                        <td>{{$purchases_product->netvalue}}</td>
                      </tr>
                      <?php 
                      // $current_value += $purchases_product->netvalue;
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
              <div class="row">
                <div class="col-sm-12">
                <table class="table table-bordered table-hover" id="tab_logic_total">
                    <tbody>
                      <tr>
                        <th class="text-center">Total No of Box(T-box + L-box)</th>
                        <td class="text-center">{{$Bills->total_no_of_box}}</td>
                      </tr>
                      <tr>
                        <th class="text-center">No of Ice Bar</th>
                        <td class="text-center">{{$Bills->no_of_ice_bar}}</td>
                      </tr>
                      <tr>
                        <th class="text-center">Per-ice Bar Amount</th>
                        <td class="text-center">{{$Bills->per_ice_bar}}</td>
                      </tr>
                      <tr>
                        <th class="text-center">Packing Charge/Box</th>
                        <td class="text-center">{{$Bills->per_packing_price}}</td>
                      </tr>
                      <tr>
                        <th class="text-center">Per-ice Bar Amount</th>
                        <td class="text-center">{{$Bills->per_ice_bar}}</td>
                      </tr>
                    </tbody>
                  </table> 
                </div>
                <div class="col-sm-12">
                <table class="table table-bordered table-hover" id="tab_logic_total">
                    <tbody>
                      <tr>
                        <th class="text-center">Today Box</th>
                        <td class="text-center">{{$Bills->today_box}}</td>
                      </tr>
                      <tr>
                        <th class="text-center">Balance box</th>
                        <td class="text-center">{{$Bills->balance_box}}</td>
                      </tr>
                      <tr>
                        <th class="text-center">Total box</th>
                        <td class="text-center">{{$Bills->total_box}}</td>
                      </tr>
                    </tbody>
                  </table>    
                </div>
              </div>
          
                </div>
            <div class="pull-right col-md-6">
              <table class="table table-bordered table-hover" id="tab_logic_total2">
                <tbody>
                  <tr>
                    <th class="text-center">Grass Amount</th>
                    <td class="text-center">{{$Bills->grass_amount}}</td>
                  </tr>
                  <tr>
                    <th class="text-center">Transport Charge</th>
                    <td class="text-center">{{$Bills->transport_charge}}</td>
                  </tr>
                  <tr>
                    <th class="text-center">Ice Bar</th>
                    <td class="text-center">{{$Bills->icebar_amount}}</td>
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
                    <th class="text-center">Discount</th>
                    <td class="text-center">{{$Bills->less}}</td>
                  </tr>
                  <tr>
                    <th class="text-center">Previous Balance</th>
                    <td class="text-center">{{$Bills->pre_balance}}</td>
                  </tr>
                  <tr>
                    <th class="text-center">Current Bill Amount</th>
                    <td class="text-center">{{$Bills->current_balance}}</td>
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
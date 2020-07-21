@extends('layouts.master')
@section('navbar_brand')
    Purchase Entry
@endsection
<style>
.billing_title {
    text-align: center;
    color: #4CAF50;
}
.headtext th {
    font-size: 14px!important;
    color: #000;
    font-weight: bold!important;
}
#totalrowbox,#totalrownetvalue,#totalrowloosebox {
  border: none;
    text-align: center;
    width: 100%;
}
.totalrowbox,.totalrownetvalue,#totalrowloosebox {
    /* display: inline-flex; */
    border: none!important;
}
#billsupplier,#billtrip {
    padding: 9px;
}

.today_box {
    background: #f9c879;
}
.balance_box {
    background: #f36b6b;
}
.total_box {
    background: #62b95e;
}

</style>

@section('content')
<div class="card">
    <?php 
    $suppliers = DB::table('suppliers')->select('suppliers.*')->get();
    $products = DB::table('products')->select('products.*')->get();
    $trips = DB::table('trips')->select('trips.*')->get();
    $settrips = DB::table('set_trip')->select('set_trip.*')->get();
    $purchases = DB::table('purchases')->latest('id')->first();
    ?>
    <div class="card-header">
        <div class="billing_title">
            <h4 class="card-title">ARS <div>[Purchase entry]</div>  </h4>
        </div>
      </div>
        <div class="container">
          <div class="billform">
              <form id="billdataform" action="{{route('addpurchase')}}" method="POST">
                {{ csrf_field() }}
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <label for="name">Bill no</label>
          <input type="text" class="form-control" name="billno" id="billno" aria-describedby="name" placeholder="Enter invoice no" value="{{$purchases->id+1}}" readonly>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="customer_status">
            <label for="phone">Supplier</label>
           <select name="billsupplier" id="billsupplier" class="form-control billsupplier" onchange="pendingamount()">
              <option>Choose</option>  
            @foreach ($suppliers as $supplier) 
              @if($supplier->status === 1)
              <option value="{{$supplier->id}}">{{$supplier->supplier_name}} </option>
              @endif
             @endforeach
           </select>
         </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label for="name">Date</label>
            <input type="date" class="form-control" name="date" id="date" aria-describedby="date" placeholder="Enter date" required>
          </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="name">Trip</label>
                <select name="billtrip" id="billtrip" class="form-control trip" readonly>
                    @foreach($settrips as $settrip)
                    @foreach ($trips as $trip)
                    @if($trip->id == $settrip->set_trip)
                    <option value="{{$settrip->set_trip}}">{{$trip->trip_name}}</option>
                    @endif    
                    @endforeach
                   @endforeach
                 </select>
              </div>
            {{-- <div class="customer_status">
                <label for="trip">Trip</label>
               <select name="billtrip" id="billtrip" class="form-control billtrip">
                  <option>Choose</option>
                  @foreach ($trips as $trip) 
                  <option value="{{$trip->id}}">{{$trip->trip_name}} </option>
                 @endforeach
               </select>
             </div> --}}
        </div>
      </div>

<div class="purchasesentry">
      <div class="row clearfix">
          <div class="col-md-12">
           <div class="table-responsive">
            <table class="table table-bordered table-hover" id="tab_logic">
              <thead>
                <tr class="headtext">
                  <th class="text-center"> S.No </th>
                  <th class="text-center"> Product </th>
                  <th class="text-center"> Box </th>
                  <th class="text-center"> KG </th>
                  <th class="text-center"> Loose box </th>
                  <th class="text-center"> Loose kg</th>
                  <th class="text-center"> Net weight </th>
                  <th class="text-center"> Dis(5%) </th>
                  <th class="text-center"> Total Weight </th>
                  <th class="text-center"> per(kg)-Rs </th>
                  <th class="text-center"> N-val </th>
                </tr>
              </thead>
              <tbody id="dynamic_product_rows">
                <tr id='addr0'>
                  <td>1</td>
                  <td>
                      <select name="billproductname" id="billproductname" class="form-control productcategory billproductname" onchange="changeprice(this)">
                          <option value="0" disabled="true" selected="true">Choose</option>
                          @foreach ($products as $product) 
                          @if($product->status === 1)
                          <option value="{{$product->id}}">{{$product->product_name}} </option>
                          @endif
                         @endforeach
                      </select>
                    </td>
                  <td>
                        <input type="text"   class="form-control box" name="box" id="box" aria-describedby="box" placeholder="0" required>

                  </td>
                  <td>
                    <input type="text"   class="form-control kg" name="kg" id="kg" aria-describedby="kg" placeholder="0 " required readonly>
                  </td>
<!--                   <td>
                    <input type="text"   class="form-control totalweight" name="totalweight" id="totalweight" oninput="calculate(this)" aria-describedby="" placeholder="0 " value="0"required>
                  </td> -->
                  <td>
                      <input type="text"   class="form-control  purchase_loosebox" name="purchase_loosebox" id="purchase_loosebox" aria-describedby="" placeholder="0 " required>
                    </td>
                  <td>
                    <input type="text"   class="form-control purchase_loosekg" name="purchase_loosekg" id="purchase_loosekg" oninput="calculate(this)"aria-describedby="" placeholder="0 " required>
                  </td>                 
                   <td>
                    <input type="text"   class="form-control net_weight" name="net_weight" id="net_weight" aria-describedby="" placeholder="0 " value="0" required readonly>
                  </td>
                  <td>
                    <input type="text"   class="form-control discount" name="discount" id="discount" oninput="calculate(this)" aria-describedby="" placeholder="0 " required readonly>
                  </td>
<!--                   <td>
                    <input type="text"   class="form-control actualprice" name="actualprice" id="actualprice" oninput="calculate(this)"aria-describedby="" placeholder="0" value="0" required>
                  </td> -->
                  <td>
                    <input type="text"   class="form-control totalweight" name="totalweight" id="totalweight"  aria-describedby="" placeholder="0 " value="0" required readonly>
                  </td>
                  <td>
                      <input type="text"   class="form-control prod_price prices" name="price" oninput="calculate(this)" id="price" aria-describedby="" placeholder="0 " value="0" required>
                    </td>
                  <td>
                    <input type="text"   class="form-control netvalue" name="netvalue" id="netvalue" oninput="calculate(this)" aria-describedby="" placeholder="0 " value="0" readonly>
                  </td>
                </tr>
                <tr id='addr1'></tr>
              </tbody>
              <tfoot>
                <tr>
                  <td></td>
                  <td></td>
                  <td class="text-center totalrowbox" ><span>T-Box</span><input type="text" id="totalrowbox" placeholder="0" readonly /></td>
                  <td></td>
                  <td class="text-center totalrowloosebox" ><span>L-Box</span><input type="text" id="totalrowloosebox" placeholder="0" readonly /></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td class="text-center totalrownetvalue"><span>T-val</span><input type="text" id="totalrownetvalue" placeholder="0" readonly /></td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
        </div>
      </div>
        <div class="row clearfix">
          <div class="col-md-12">
            <button id="add_row" class="btn btn-default pull-left">Add Row</button>
            <button id='delete_row' onchange="deletevalue(this)" class="pull-right btn btn-default">Delete Row</button>
          </div>
        </div>


        <div class="row clearfix" style="margin-top:20px">
          <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-12">
                              <table class="table table-bordered table-hover" id="tab_logic_total">
                  <tbody>
                    <tr>
                      <th class="text-center">Total No of Box(T-box + L-box)</th>
                      <td class="text-center"><input type="text" name='totalnoofbox' placeholder='0.00' class="form-control totalnoofbox" id="totalnoofbox"/></td>
                    </tr>
                    <tr>
                      <th class="text-center">No of Ice Bar</th>
                      <td class="text-center"><input type="text" name='ice_bar' oninput="calculate2()" placeholder='0.00' class="form-control icebar" id="icebar"/></td>
                    </tr>
                    <tr>
                      <th class="text-center">Per-ice Bar Amount</th>
                      <td class="text-center"><input type="text" name='per_ice_bar' id="pericebar" oninput="calculate2()"  placeholder='0.00' class="form-control" /></td>
                    </tr>
<!--                     <tr>
                      <th class="text-center">Total Ice Bar Amount</th>
                      <td class="text-center"><input type="text" name='total_ice_bar' id="totalicebar" oninput="calculate2()" placeholder='0.00' class="form-control" /></td>
                    </tr> -->
                    <tr>
                      <th class="text-center">Packing Charge/Box</th>
                      <td class="text-center"><input type="text" name='per_packing_price' id="packing_amount" placeholder='0.00' class="form-control packing_amount" oninput="calpackingcharge()" /></td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-bordered table-hover" id="tab_logic_total">
                  <tbody>
                    <tr class="today_box">
                      <th class="text-center">Today Box</th>
                      <td class="text-center"><input type="text" name='total_box' id="totalbox" placeholder='0.00' class="form-control" id="sub_total" /></td>
                    </tr>
                    <tr class="balance_box">
                      <th class="text-center">Balance box</th>
                      <td class="text-center"><input type="text" name='pendingbox' id="pendingbox" placeholder='0.00' class="form-control pendingbox"/></td>
                    </tr>
                    <tr class="total_box">
                      <th class="text-center">Total box</th>
                      <td class="text-center"><input type="text" name='purchase_overallbox' id="purchase_overallbox" placeholder='0.00' value="0" class="form-control purchase_overallbox"/></td>
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
                  <th class="text-center">Gross Amount</th>
                  <td class="text-center"><input type="text"  name='grass' id="grass" placeholder='0.00' class="form-control grass"/></td>
                </tr>
                <tr>
                  <th class="text-center">Transport Charge</th>
                  <td class="text-center"><input type="text"  name='transport_charge' id="transportcharge" oninput="caltransport()" placeholder='0.00' class="form-control transportcharge"/></td>
                </tr>
                <tr>
                  <th class="text-center">Ice Amount</th>
                  <td class="text-center"><input type="text"  name='total_icebar' id="finalicebar"  placeholder='0.00' class="form-control" value=""/></td>
                </tr>
                 <tr>
                  <th class="text-center">Packing Charge</th>
                  <td class="text-center"><input type="text"  name='packing_charge' id="packingcharge" placeholder='0.00' class="form-control packingcharge" /></td>
                <tr>
                  <th class="text-center">Excess</th>
                  <td class="text-center"><input type="text"  name='excess' id="excess" onchange="calexcess(this)" placeholder='0.00' class="form-control" /></td>
                </tr>
                 </tr>
                  <th class="text-center">Discount</th>
                  <td class="text-center"><input type="text"  name='less' id="less" onchange="caldiscount()" placeholder='0.00' class="form-control" /></td>
                </tr>
                <tr>
                <tr>
                  <th class="text-center">Current Bill Amount</th>
                  <td class="text-center"><input type="text" name='current_balance' id="currentbalance" placeholder='0.00' class="form-control" /></td>
                </tr>
                <tr>
                  <th class="text-center">previous Balance</th>
                  <td class="text-center"><input type="text" name='previous_balance' id="prebalance" laceholder='0.00' class="form-control" /></td>
                </tr>
                <tr>
                  <th class="text-center">Overall Balance</th>
                  <td class="text-center"><input type="text"  name='overall' id="overall" placeholder='0.00' class="form-control overall" /></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </form>

          </div>









              </div>


</div>
<script type="text/javascript">

</script>
@endsection








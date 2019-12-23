@extends('layouts.master')
@section('navbar_brand')
    Purchase
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
#totalrowbox,#totalrownetvalue {
  border: none;
    text-align: center;
    width: 100%;
}
.totalrowbox,.totalrownetvalue {
    /* display: inline-flex; */
    border: none!important;
}
#billsupplier,#billtrip {
    padding: 9px;
}
</style>

@section('content')
<div class="card">
    <?php 
    $suppliers = DB::table('suppliers')->select('suppliers.*')->get();
    $products = DB::table('products')->select('products.*')->get();
    $trips = DB::table('trips')->select('trips.*')->get();
    $bills = DB::table('bills')->latest('id')->first();
    ?>
    <div class="card-header">
        <div class="billing_title">
            <h4 class="card-title">ARS <div>[Purchase entry]</div>  </h4>
        </div>
      </div>
        <div class="container">
          <div class="billform">
              <form id="billdataform" action="{{route('Addbill')}}" method="POST">
                {{ csrf_field() }}
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <label for="name">Bill no</label>
          <input type="text" class="form-control" name="billno" id="billno" aria-describedby="name" placeholder="Enter invoice no" value="{{$bills->id+1}}" readonly>
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
            <div class="customer_status">
                <label for="trip">Trip</label>
               <select name="billtrip" id="billtrip" class="form-control billtrip">
                  <option>Choose</option>
                  @foreach ($trips as $trip) 
                  <option value="{{$trip->id}}">{{$trip->trip_name}} </option>
                 @endforeach
               </select>
             </div>
        </div>
      </div>

      <div class="row clearfix">
          <div class="col-md-12">
            <table class="table table-bordered table-hover" id="tab_logic">
              <thead>
                <tr class="headtext">
                  <th class="text-center"> S.No </th>
                  <th class="text-center"> Product </th>
                  <th class="text-center"> Box </th>
                  <th class="text-center"> KG </th>
                  <th class="text-center"> N-wgt </th>
                  <th class="text-center"> per(kg)-Rs </th>
                  <th class="text-center"> Actual Rs </th>
                  <th class="text-center"> Dis% </th>
                  <th class="text-center"> Dis price </th>
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
                          <option value="{{$product->id}}">{{$product->product_name}} </option>
                         @endforeach
                      </select>
                    </td>
                  <td>
                        <input type="text"   class="form-control box" name="box" id="box" onchange="calculate(this)"  aria-describedby="box" placeholder="0" required>
                    </div>
                  </td>
                  <td>
                    <input type="text"   class="form-control loosekg" name="loosekg" onchange="calculate(this)" id="loosekg" aria-describedby="loosekg" placeholder="0 " required>
                  </td>
                  <td>
                    <input type="text"   class="form-control totalweight" name="totalweight" id="totalweight" oninput="calculate(this)" aria-describedby="" placeholder="0 " required>
                  </td>
                  <td>
                      <input type="text"   class="form-control prod_price perkgprices" name="perkgprice" oninput="calculate(this)" id="perkgprice" aria-describedby="" placeholder="0 " required>
                    </td>
                  <td>
                    <input type="text"   class="form-control actualprice" name="actualprice" id="actualprice" oninput="calculate(this)"aria-describedby="" placeholder="0 " required>
                  </td>
                  <td>
                    <input type="text"   class="form-control discount" name="discount" id="discount" oninput="calculate(this)" aria-describedby="" placeholder="0 " required>
                  </td>
                  <td>
                    <input type="text"   class="form-control discountprice" name="discountprice" id="discountprice" oninput="calculate(this)" aria-describedby="" placeholder="0 " required>
                  </td>
                  <td>
                    <input type="text"   class="form-control netvalue" name="netvalue" id="netvalue" oninput="calculate(this)" aria-describedby="" placeholder="0 ">
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
        <div class="row clearfix">
          <div class="col-md-12">
            <button id="add_row" class="btn btn-default pull-left">Add Row</button>
            <button id='delete_row' onchange="deletevalue(this)" class="pull-right btn btn-default">Delete Row</button>
          </div>
        </div>


        <div class="row clearfix" style="margin-top:20px">
          <div class="col-sm-6">
              <table class="table table-bordered table-hover" id="tab_logic_total">
                  <tbody>
                    <tr>
                      <th class="text-center">Total Box</th>
                      <td class="text-center"><input type="text" name='total_box' id="totalbox" oninput="calculate2()" placeholder='0.00' class="form-control" id="sub_total" /></td>
                    </tr>
                    <tr>
                      <th class="text-center">Ice Bar</th>
                      <td class="text-center"><input type="text" name='ice_bar' oninput="calculate2()" placeholder='0.00' class="form-control icebar" id="icebar"/></td>
                    </tr>
                    <tr>
                      <th class="text-center">Per-ice Bar Amount</th>
                      <td class="text-center"><input type="text" name='per_ice_bar' id="pericebar" oninput="calculate2()"  placeholder='0.00' class="form-control" /></td>
                    </tr>
                    <tr>
                      <th class="text-center">Total Ice Bar Amount</th>
                      <td class="text-center"><input type="text" name='total_ice_bar' id="totalicebar" oninput="calculate2()" placeholder='0.00' class="form-control" /></td>
                    </tr>
                    <tr>
                      <th class="text-center">Packing Charge</th>
                      <td class="text-center"><input type="text" name='per_packing_price' id="packing_amount" placeholder='0.00' class="form-control packing_amount" oninput="calculate2()" /></td>
                    </tr>
                    <tr>
                      <th class="text-center">Balance box</th>
                      <td class="text-center"><input type="text" name='pendingbox' id="pendingbox" placeholder='0.00' class="form-control pendingbox"/></td>
                    </tr>
                  </tbody>
                </table>          </div>
          <div class="pull-right col-md-6">
            <table class="table table-bordered table-hover" id="tab_logic_total2">
              <tbody>
                <tr>
                  <th class="text-center">Transport Charge</th>
                  <td class="text-center"><input type="text"  name='transport_charge' id="transportcharge" oninput="calculate2()" placeholder='0.00' class="form-control transportcharge"/></td>
                </tr>
                <tr>
                  <th class="text-center">Ice Bar</th>
                  <td class="text-center"><input type="text"  name='total_icebar' id="finalicebar" oninput="calculate2()" placeholder='0.00' class="form-control" value=""/></td>
                </tr>
                  <th class="text-center">Discount</th>
                  <td class="text-center"><input type="text"  name='less' id="less" oninput="calculate2()" placeholder='0.00' class="form-control" /></td>
                </tr>
                <tr>
                  <th class="text-center">Excess</th>
                  <td class="text-center"><input type="text"  name='excess' id="excess" oninput="calculate3()" placeholder='0.00' class="form-control" /></td>
                </tr>
                <tr>
                 <tr>
                  <th class="text-center">Packing Charge</th>
                  <td class="text-center"><input type="text"  name='packing_charge' id="packingcharge" oninput="calculate2()" placeholder='0.00' class="form-control packingcharge" /></td>
                 </tr>
                <tr>
                  <th class="text-center">previous Balance</th>
                  <td class="text-center"><input type="text" name='previous_balance' id="prebalance" oninput="calculate3()" placeholder='0.00' class="form-control" /></td>
                </tr>
                <tr>
                  <th class="text-center">Overall Balance</th>
                  <td class="text-center"><input type="text"  name='overall' id="overall" oninput="calculate(this)" placeholder='0.00' class="form-control overall" /></td>
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








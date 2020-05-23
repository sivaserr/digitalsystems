@extends('layouts.master')
@section('navbar_brand')
    Sales Entry
@endsection
<style>
    .sales_log img {
    height: 150px;
    width: 240px;
}
#salestotalrowbox,#salestotalrownetvalue,#salestotalrowloosebox {
  border: none;
    text-align: center;
    width: 100%;
}
.salestotalrowbox,.salestotalrownetvalue,#salestotalrowloosebox {
    /* display: inline-flex; */
    border: none!important;
}
.company_address p {
    /* padding: 0; */
    margin-bottom: 5px;
}
.col-sm-6.caddress .company_address {
    position: relative;
    top: 50%;
    transform: translateY(-50%);
}
.billing_title {
    text-align: center;
    color: #4CAF50;
}
.headtext th {
    font-size: 14px!important;
    color: #000;
    font-weight: bold!important;
}
</style>

@section('content')
<div class="card">
    <?php 
    $customers = DB::table('customer')->select('customer.*')->get();
    $customer_rate_fixings = DB::table('customer_rate_fixings')->select('customer_rate_fixings.*')->get();
    $products = DB::table('products')->select('products.*')->get();
    $trips = DB::table('trips')->select('trips.*')->get();
    $settrips = DB::table('set_trip')->select('set_trip.*')->get();
    $sales = DB::table('sales')->latest('id')->first();

    ?>
    <div class="card-header">
        <div class="billing_title">
            <h4 class="card-title">ARS <div>[Sales entry]</div>  </h4>
        </div>
      </div>
        <div class="container">
          <div class="billform">
              <div class="sales_header">
                  <div class="row">
                      <div class="col-sm-6 slogo">
                            <div class="sales_log">
                                    <img src="{{ asset('assets/images/ARS.jpg') }}">
                              </div>
                      </div>
                      <div class="col-sm-6 caddress">
                            <div class="company_address">
                                    <p><b>Address:</b> 129,Global theatre road,sathyamangalam,erode(D.t)-638402</p>
                                    <p><b>Mobile:</b> 63822 86665,88075 34363</p>
                                    <p><b>Email:</b> arstraderssathy@gmail.com</p>
                                </div>
                      </div>
                  </div>


              </div>

              <form id="salesdataform" action="{{ route('Addsales')}} " method="POST">
                {{ csrf_field() }}
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <label for="name">Sales No</label>
          <input type="text" class="form-control" name="saleno" id="saleno" aria-describedby="name" placeholder="Enter invoice no" value="{{$sales->id+1}}" readonly>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="customer_status">
            <label for="phone">Customer</label>
           <select name="salescustomer" id="salescustomer" class="form-control billsupplier" onchange="salespendingamount()">
              <option>Choose</option>  
            @foreach ($customers as $customer) 
              @if($customer->status === 1)
              <option value="{{$customer->id}}">{{$customer->name}} </option>
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
                <select name="billtrip" id="salestrip" class="form-control salestrip" readonly>
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
                  <th class="text-center"> Loose box </th>
                  <th class="text-center"> Loose kg</th>
                  <th class="text-center"> Total weight </th>
                  <th class="text-center"> Price </th>
                  <th class="text-center"> N-vel </th>
                </tr>
              </thead>
              <tbody id="dynamic_product_rows">
                <tr id='addr0'>
                  <td>1</td>
                  <td>
                      <select name="salesproductname" id="salesproductname" class="form-control productcategory salesproductname" onchange="saleschangeprice(this)">
                          <option value="0" disabled="true" selected="true">Choose</option>
                          @foreach ($products as $product) 
                          <option value="{{$product->id}}">{{$product->product_name}} </option>
                         @endforeach
                      </select>
                    </td>
                  <td>
                        <input type="text"   class="form-control box" name="box" id="box" onchange="salescalculater(this)"  aria-describedby="box" placeholder="0" required>
                  </td>
                  <td>
                    <input type="text"   class="form-control loosekg" name="loosekg" onchange="" id="loosekg" aria-describedby="loosekg" placeholder="0 " required>
                  </td>
                  <td>
                    <input type="text"   class="form-control totalweight" name="totalweight" id="totalweight" oninput="salescalculater(this)" aria-describedby="" placeholder="0 " required>
                  </td>
                  <td>
                      <input type="text"   class="form-control  loosebox" name="loosebox" oninput="salescalculater(this)" id="loosebox" aria-describedby="" placeholder="0 " required>
                    </td>
                  <td>
                    <input type="text"   class="form-control salesloosekg" name="salesloosekg" id="salesloosekg" oninput="salescalculater(this)"aria-describedby="" placeholder="0 " required>
                  </td>
                  <td>
                    <input type="text"   class="form-control overallweight" name="overallweight" id="overallweight" oninput="" aria-describedby="" placeholder="0 " required>
                  </td>
                  <td>
                    <input type="text"   class="form-control prod_price saleperkgprice" name="saleperkgprice" id="saleperkgprice" oninput="salescalculater(this)" aria-describedby="" placeholder="0 " required>
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
                  <td class="text-center salestotalrowbox" ><span>T-Box</span><input type="text" id="salestotalrowbox" placeholder="0" readonly /></td>
                  <td></td>
                  <td></td>
                  <td class="text-center salestotalrowloosebox" ><span>L-Box</span><input type="text" id="salestotalrowloosebox" placeholder="0" readonly /></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td class="text-center salestotalrownetvalue"><span>T-val</span><input type="text" id="salestotalrownetvalue" placeholder="0" readonly /></td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
        <div class="row clearfix">
          <div class="col-md-12">
            <button id="add_row" class="btn btn-default pull-left">Add Row</button>
            <button id='customer_delete_row'  class="pull-right btn btn-default">Delete Row</button>
          </div>
        </div>


        <div class="row clearfix" style="margin-top:20px">
          <div class="col-sm-6">
              <table class="table table-bordered table-hover" id="tab_logic_total">
                  <tbody>
                    <tr>
                      <th class="text-center">Today Box</th>
                      <td class="text-center"><input type="text" name='total_box' id="totalbox" oninput="salescalculater(this)" placeholder='0.00' class="form-control" id="sub_total" /></td>
                    </tr>
                    <tr>
                      <th class="text-center">balance box</th>
                      <td class="text-center"><input type="text" name='pendingbox' id="pendingbox" oninput="salescalculater(this)" placeholder='0.00' class="form-control pendingbox"/></td>
                    </tr>
                    <tr>
                      <th class="text-center">Total box</th>
                      <td class="text-center"><input type="text" name='overallbox' id="overallbox" oninput="salescalculater(this)"  placeholder='0.00' class="form-control" /></td>
                    </tr>
                  </tbody>
                </table>          </div>
          <div class="pull-right col-md-6">
            <table class="table table-bordered table-hover" id="tab_logic_total2">
              <tbody>


                  <th class="text-center">Current Bill Balance</th>
                  <td class="text-center"><input type="text"  name='totalprice' id="totalprice" oninput="salescalculater(this)" placeholder='0.00' class="form-control" /></td>
                </tr>
                <tr>
                  <th class="text-center">Previous balances</th>
                  <td class="text-center"><input type="text"  name='prebalance' id="prebalance" oninput="calculate3()" placeholder='0.00' class="form-control" /></td>
                </tr>
                <tr>
                <tr>
                  <th class="text-center">Overall Balance</th>
                  <td class="text-center"><input type="text"  name='customeroverall' id="customeroverall" oninput="salescalculater(this)" placeholder='0.00' class="form-control customeroverall" /></td>
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








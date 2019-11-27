@extends('layouts.master')
@section('navbar_brand')
    Bill
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
</style>

@section('content')
<div class="card">
    <?php 
    $customer = DB::table('customer')->select('customer.*')->get();
    $products = DB::table('products')->select('products.*')->get();
    
    ?>
    <div class="card-header">
        <div class="billing_title">
            <h4 class="card-title">ARS </h4>
        </div>
      </div>
        <div class="container">
          <div class="billform">
              <form action="{{route('Addbill')}}" method="POST">
                  {{ csrf_field()}} <!--security token-->
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <label for="name">Bill no</label>
            <input type="text" class="form-control" name="billno" id="billno" aria-describedby="name" placeholder="Enter invoice no" required>
          </div>
        </div>
        <div class="col-sm-6">
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
        <div class="col-sm-3">
          <div class="form-group">
            <label for="name">Date</label>
            <input type="text" class="form-control" name="date" id="date" aria-describedby="date" placeholder="Enter date" required>
          </div>
        </div>
      </div>




      <div class="row clearfix">
          <div class="col-md-12">
            <table class="table table-bordered table-hover" id="tab_logic">
              <thead>
                <tr class="headtext">
                  <th class="text-center"> # </th>
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
              <tbody>
                <tr id='addr0'>
                  <td>1</td>
                  <td>
                      <select name="billproductname" id="billproductname" class="form-control productcategory" onchange="changeprice(this)">
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
                    <input type="text"   class="form-control netvalue" name="netvalue" id="netvalue" oninput="calculate(this)" aria-describedby="" placeholder="0 " required>
                  </td>
                </tr>
                <tr id='addr1'></tr>
              </tbody>
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
                      <td class="text-center"><input type="text" name='totalbox' id="totalbox" oninput="calculate2()" placeholder='0.00' class="form-control" id="sub_total" /></td>
                    </tr>
                    <tr>
                      <th class="text-center">Ice Bar</th>
                      <td class="text-center"><input type="text" name='icebar' oninput="calculate2()" placeholder='0.00' class="form-control" id="icebar"/></td>
                    </tr>
                    <tr>
                      <th class="text-center">Per-ice Bar Amount</th>
                      <td class="text-center"><input type="text" name='pericebar' id="pericebar" oninput="calculate2()"  placeholder='0.00' class="form-control" /></td>
                    </tr>
                    {{-- <tr>
                      <th class="text-center">Total Ice Bar Amount</th>
                      <td class="text-center"><input type="text" name='totalicebar' id="totalicebar" oninput="calculate2()" placeholder='0.00' class="form-control" /></td>
                    </tr> --}}
                    <tr>
                      <th class="text-center">Packing Charge</th>
                      <td class="text-center"><input type="text" name='total_amount' id="total_amount" placeholder='0.00' class="form-control" /></td>
                    </tr>
                  </tbody>
                </table>          </div>
          <div class="pull-right col-md-6">
            <table class="table table-bordered table-hover" id="tab_logic_total2">
              <tbody>
                <tr>
                  <th class="text-center">Transport Charge</th>
                  <td class="text-center"><input type="text"  name='transportcharge' id="transportcharge" oninput="calculate()" placeholder='0.00' class="form-control"/></td>
                </tr>
                <tr>
                    <th class="text-center">Total Ice Bar Amount</th>
                    <td class="text-center"><input type="text" name='totalicebar' id="totalicebar" oninput="calculate2()" placeholder='0.00' class="form-control" /></td>
                  </tr>
                <tr>
                  <th class="text-center">Discount</th>
                  <td class="text-center"><input type="text"  name='discount' id="discount" oninput="calculate3()" placeholder='0.00' class="form-control" /></td>
                </tr>
                <tr>
                  <th class="text-center">Packing Charge</th>
                  <td class="text-center"><input type="text"  name='packingcharge' id="packingcharge" oninput="calculate3()" placeholder='0.00' class="form-control" /></td>
                </tr>
                <tr>
                  <th class="text-center">Excess</th>
                  <td class="text-center"><input type="text"  name='excess' id="excess" oninput="calculate3()" placeholder='0.00' class="form-control" /></td>
                </tr>
                <tr>
                  <th class="text-center">previous Balance</th>
                  <td class="text-center"><input type="text" name='prebalance' id="prebalance" oninput="calculate3()" placeholder='0.00' class="form-control" /></td>
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

@endsection
<script type="text/javascript">

</script>
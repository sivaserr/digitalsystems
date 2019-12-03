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
</style>
@section('content')
<div class="card">
        <?php 
        // $bills = DB::table('bills')->select('bills.*')->get();
        
        // var_dump($bills);
        ?>
<div class="container">
      <div class="card-header">
        Bill no:
      <strong>{{$Bills->bill_no}}</strong> 
        <span class="float-right"> <strong>Date:</strong> {{$Bills->date}}</span>
      </div>
      <div class="card-body">
      <div class="row mb-4">
      <div class="col-sm-6">
      <h6 class="mb-3">From:</h6>
      <div>
      <strong>Webz Poland</strong>
      </div>
      <div>Madalinskiego 8</div>
      <div>71-101 Szczecin, Poland</div>
      <div>Email: info@webz.com.pl</div>
      <div>Phone: +48 444 666 3333</div>
      </div>
      
      <div class="col-sm-6">
      <h6 class="mb-3">To:</h6>
      <div>
      <strong>Bob Mart</strong>
      </div>
      <div>Attn: Daniel Marek</div>
      <div>43-190 Mikolow, Poland</div>
      <div>Email: marek@daniel.com</div>
      <div>Phone: +48 123 456 789</div>
      </div>
      
      
      
      </div>
      
      {{-- <div class="table-responsive-sm">
      <table class="table table-striped">
      <thead>
      <tr>
      <th class="center">#</th>
      <th>Item</th>
      <th>Description</th>
      
      <th class="right">Unit Cost</th>
        <th class="center">Qty</th>
      <th class="right">Total</th>
      </tr>
      </thead>
      <tbody>
      <tr>
      <td class="center">1</td>
      <td class="left strong">Origin License</td>
      <td class="left">Extended License</td>
      
      <td class="right">$999,00</td>
        <td class="center">1</td>
      <td class="right">$999,00</td>
      </tr>
      <tr>
      <td class="center">2</td>
      <td class="left">Custom Services</td>
      <td class="left">Instalation and Customization (cost per hour)</td>
      
      <td class="right">$150,00</td>
        <td class="center">20</td>
      <td class="right">$3.000,00</td>
      </tr>
      <tr>
      <td class="center">3</td>
      <td class="left">Hosting</td>
      <td class="left">1 year subcription</td>
      
      <td class="right">$499,00</td>
        <td class="center">1</td>
      <td class="right">$499,00</td>
      </tr>
      <tr>
      <td class="center">4</td>
      <td class="left">Platinum Support</td>
      <td class="left">1 year subcription 24/7</td>
      
      <td class="right">$3.999,00</td>
        <td class="center">1</td>
      <td class="right">$3.999,00</td>
      </tr>
      </tbody>
      </table>
      </div> --}}
      {{-- <div class="row">
      <div class="col-lg-4 col-sm-5">
      
      </div>
      
      <div class="col-lg-4 col-sm-5 ml-auto">
      <table class="table table-clear">
      <tbody>
      <tr>
      <td class="left">
      <strong>Subtotal</strong>
      </td>
      <td class="right">$8.497,00</td>
      </tr>
      <tr>
      <td class="left">
      <strong>Discount (20%)</strong>
      </td>
      <td class="right">$1,699,40</td>
      </tr>
      <tr>
      <td class="left">
       <strong>VAT (10%)</strong>
      </td>
      <td class="right">$679,76</td>
      </tr>
      <tr>
      <td class="left">
      <strong>Total</strong>
      </td>
      <td class="right">
      <strong>$7.477,36</strong>
      </td>
      </tr>
      </tbody>
      </table>
      
      </div>
      
      </div> --}}
      <div class="billviewproduct">
            <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Sno</th>
                        <th scope="col">Product</th>
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
                        <?php $id=1; ?>
                      <tr>
                      <th scope="row">{{$id}}</th>
                        <td>{{Mark}}</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                      </tr>
                       <?php $id++; ?>
                    </tbody>
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
@endsection
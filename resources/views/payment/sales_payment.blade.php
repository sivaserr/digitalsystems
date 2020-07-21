@extends('layouts.master')

@section('navbar_brand')
    Payment For Sales
@endsection
<style>
  .reportview {
    max-width: 75%!important;
}
.payment_content_title {
    position: relative;
    padding-bottom: 5px;
}
.payment_content_title span {
    font-size: 14px;
    color: #777;
}
.payment_content_title::after {
    content: "";
    border: 0.5px solid #d2d2d2;
    width: 100%;
    position: absolute;
    bottom: 0px;
    left: 0;
}

.payment_body {
    padding: 20px 0px;
}
.payment_content .form-control {
    background-color: transparent;
    border-bottom: 1px solid #E3E3E3!important;
    border: none;
    border-radius: unset!important;
}
.payment_content .form-control:focus {
    border-bottom: 1px solid #00adef !important;
    border-top: none!important;
    border-right: none!important;
    border-left: none!important;
}


#printcontent {
    border: 1px solid #c0b8b8;
    padding: 20px;
    margin-bottom: 50px;
}

.box_detail,.amount_details{
    border: none!important;
}
.box_detail:focus,.amount_details:focus{
    outline: none!important;
}
.amount_details {
    float: right;
}
.pay_button {
    text-align: center;
}
</style>
@section('content')
<?php
    $customer = DB::table('customer')->select('customer.*')->get();
    $bank_details = DB::table('bank_details')->select('bank_details.*')->get();
    $transfer_types = DB::table('transfer_types')->select('transfer_types.*')->get();
?>



    

      
        
    <div class="row">
    	<div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="customer_title">
                  <h4 class="card-title">customer</h4>
              </div>
              </div>

                          <div class="card-body">



<form method="POST" action="/payment-for-sales">
  {{ csrf_field() }}

             <div class="row">
             	<div class="col-sm-4">
             		<label for="cars">customer</label>

       <select id="customer" class="form-control" name="customer">
	    <option>Choose</option>
	    @foreach($customer as $customer)
         <option value="{{$customer->id}}">{{$customer->short_name}}</option>
      @endforeach
       </select>
             	</div>
             	<div class="col-sm-4">
             		<label for="cars">customer Bill</label>
             		<select id="salesbill" class="form-control" name="salesbill">
	              <option>Choose</option>

       </select>
             	</div>
             	<div class="col-sm-4">
        <div class="trip_create">
          <a href="#" type="button" class="btn btn-primary btn-success" data-toggle="modal" data-target="#form" onclick="viewReport(this)" ><span class="glyphicon glyphicon-plus"></span> Open</a>
        </div>
             	</div>

             </div>

         
          <div class="modal-body" id="report">
          

            </div>



















<div class="payment_content">
  <div class="payment_content_title">
     <span>Payment Entry Details</span>
  </div>
  <div class="payment_body">
  <div class="row">
  	<div class="col-sm-4">
  		        <div class="form-group">
                    <label for="payment">Date</label>
                    <input type="Date" class="form-control" name="date" id="date" aria-describedby="date"  required>
              </div>
  	</div>
  	<div class="col-sm-4">
  		        <div class="form-group">
                    <label for="payment">Amount</label>
                    <input type="text" class="form-control" name="amount" id="amount" oninput="calculatePending()" aria-describedby="amount"  value="0" required>
              </div>
  	</div>
    <div class="col-sm-4">
              <div class="form-group">
                    <label for="payment">Return Box</label>
                    <input type="text" class="form-control" name="returnbox" id="returnbox" oninput="calculatePending()" aria-describedby="returnbox" value="0" required>
              </div>
    </div>
  </div>

    <div class="row">
    <div class="col-sm-4">
              <div class="form-group">
                    <label for="payment">Note*</label>
                    <input type="text" class="form-control" name="note" id="note" aria-describedby="note"  required>
                </div>
    </div>
        <div class="col-sm-4">
              <div class="form-group">
               <label for="transfer_type"> Transfer Types</label>
              <select id="transfer_type" class="form-control" name="transfer_type">
              <option>Choose</option>
              @foreach($transfer_types as $transfer_type)
              <option value="{{$transfer_type->id}}">{{$transfer_type->types}}</option>
              @endforeach
              </select>
                </div>
    </div>    
    <div class="col-sm-4">
              <div class="form-group">
                    <label for="payment">Bank</label>
              <select id="bank" class="form-control" name="bank">
              <option>Choose</option>
              @foreach($bank_details as $bank_detail)
              <option value="{{$bank_detail->id}}">{{$bank_detail->short_name}}-{{$bank_detail->ac_holder}}</option>
              @endforeach
              </select>
              </div>
    </div>

  </div>
  <div class="row">
    <div class="col-sm-4">
                    <div class="form-group">
                    <label for="ref no">Reference Number</label>
                    <input type="text" class="form-control" name="ref_no" id="ref_no"  aria-describedby="ref_no"  value="0" required>
              </div>
    </div>
    <div class="col-sm-4"></div>
    <div class="col-sm-4"></div>
    
  </div>


</div>
</div>


<!--Summary-->

<div class="payment_content">
  <div class="payment_content_title">
     <span>Summary</span>
  </div>
  <div class="payment_body">

    <div class="row">
      <div class="col-sm-6">
                <div class="form-group">
                    <label for="payment">Pending Box:</label>
                    <input type="text" class="box_detail" name="currentbillbox" id="currentbillbox" aria-describedby="currentbillbox"  readonly>
                </div>
<!--                 <div class="form-group">
                    <label for="payment">Pre-Box:</label>
                    <input type="text" class="box_detail" name="prebox" id="prebox" aria-describedby="amount"   readonly>
                </div>
                <div class="form-group">
                    <label for="payment"> Overall box:</label>
                    <input type="text" class="box_detail" name="overallbox" id="overallbox" aria-describedby="amount"  readonly>
                </div> -->
                <div class="form-group">
                    <label for="payment">Paid Box:</label>
                    <input type="text" class="box_detail" name="paidbox" id="paidbox" aria-describedby="paidbox"  readonly>
                </div>
                <div class="form-group">
                    <label for="payment"> Remaining Box:</label>
                    <input type="text" class="box_detail" name="remainbox" id="remainbox" aria-describedby="amount"  readonly>
                </div>
</div>
         <div class="col-sm-6">
             <div class="amount_details">
                <div class="form-group">
                    <label for="payment">Pending Rs: </label>
                    <input type="text" class="amount_details" name="currentbillamount" id="currentbillamount" aria-describedby="amount"  readonly>
                </div>
<!--                 <div class="form-group">
                    <label for="payment">Previouse Rs: </label>
                    <input type="text" class="amount_details" name="previousebalance" id="previousebalance" aria-describedby="previousebalance"  readonly>
                </div>
                <div class="form-group">
                    <label for="payment">overall Rs: </label>
                    <input type="text" class="amount_details" name="overallbalance" id="overallbalance" aria-describedby="overallbalance" readonly>
                </div> -->
                <div class="form-group">
                    <label for="payment">paid Rs: </label>
                    <input type="text" class="amount_details" name="paidamount" id="paidamount" aria-describedby="paidamount" readonly>
                </div>
                <div class="form-group">
                    <label for="payment">Remaining Rs: </label>
                    <input type="text" class="amount_details" name="remainingamount" id="remainingamount" aria-describedby="amount"  readonly>
                </div>
    </div>
   </div>


  </div>
</div>
</div>
                       <div class="pay_button">
                         
                         <button type="submit" class="btn btn-success">Pay</button>
                       </div>
                          

</form>


            </div>
            






          </div>
        </div>
    </div>
@endsection

@section('scripts')

jQuery(document).ready(function ()
    {
            jQuery('#customer').on('change',function(){
               let salesbill = document.getElementById("salesbill");
               var customerID = jQuery(this).val();
               if(customerID)
               {
                  jQuery.ajax({
                     url : 'api/payment-for-sales/getcustomersbill/' +customerID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        //console.log(data);
                        jQuery('#salesbill').empty();
                        jQuery.each(data, function(id,sale_no){
                           $('#salesbill').append('<option value="'+ id +'">'+ sale_no +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('#salesbill').append('<option value="0">No data</option>');
               }
            });

    });

    viewReport = () =>{
        let salebill_id = document.getElementById("salesbill");
        var salesbill_option = salebill_id.options[salebill_id.selectedIndex].value;
        var requestOptions = {
          method: 'GET',
          redirect: 'follow'
        };

        fetch("/api/payment-for-sales/"+salesbill_option, requestOptions)
          .then(response => response.text())
          .then(result => appendData(result))
          .catch(error => console.log('error', error));         
    }
     appendData = (result) =>{
        let report = document.getElementById("report");        
        let data = [];
        data = JSON.parse(result);
        console.log(data);
          jQuery('#report').empty();
          let html = '';
          let sno =1;
          let current_bill_amount =0;
          html += `
                <div class="paymentview" id="paymentview">
    <div class="purchase_header">
      <h5><b>Sales Report</b></h5>
    </div>
      <div class="card-header">
        Bill no : <strong>${data.sale_no}</strong> 
        <span class="float-right"> <strong>Date :</strong>${data.date}</span>
                        <div class="trip">Trip :${data.trip_id}</div>
                                      </div>
      <div class="card-body">
      <div class="row mb-4">
      <div class="col-sm-6">
      <h6 class="mb-3">From:</h6>
      <div>
                        <strong>NELLUR S</strong>
                                           </div>
      
      </div>
      
      </div>
      
      <div class="billviewproduct">
        <div class="table-responsive">
            <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Sno</th>
                        <th scope="col">Product</th>
                        <th scope="col">Box</th>
                        <th scope="col">KG</th>
                        <th scope="col">N-wgt</th>
                        <th scope="col">Loose box </th>
                        <th scope="col">Loose kg</th>
                        <th scope="col">Total weight </th>
                        <th scope="col">price</th>
                        <th scope="col">N-val</th>
                      </tr>
                    </thead>
                    <tbody>`


     data.products.forEach((product,j)=>{
     html += `<tr>

   <th scope="row">${sno++}</th>
   <td>${product.product_name}</td>
   <td>${product.box}</td>
   <td>${product.weight}</td>
   <td>${product.net_weight}</td>
   <td>${product.loose_box}</td>
   <td>${product.loose_kg}</td>
   <td>${product.total_weight}</td>
   <td>${product.price}</td>
   <td>${product.netvalue}</td>
</tr>`

    current_bill_amount +=Number(product.net_value);
   });
 
    
      html += `                      
                    </tbody>
                    
                  </table>
                </div>
      </div>



      <div class="row clearfix" style="margin-top:20px">
                  <div class="col-sm-6">
<!--             <div class="row">
              <div class="col-sm-12">
                              <table class="table table-bordered table-hover" id="tab_logic_total">
                  <tbody>
                    <tr>
                      <th class="text-center">Ice Bar</th>
                      <td class="text-center">${data.ice_bar}</td>
                    </tr>
                    <tr>
                      <th class="text-center">Per-ice Bar Amount</th>
                      <td class="text-center">${data.per_ice_bar}</td>
                    </tr>
                    <tr>
                      <th class="text-center">Total Ice Bar Amount</th>
                      <td class="text-center">${data.total_ice_bar}</td>
                    </tr>
                    <tr>
                      <th class="text-center">Packing Charge</th>
                      <td class="text-center">${data.per_packing_price}</td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div> -->
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-bordered table-hover" id="tab_logic_total">
                  <tbody>
                    <tr class="today_box">
                      <th class="text-center">Today Box</th>
                      <td class="text-center">${data.today_box}</td>
                    </tr>
                    <tr class="balance_box">
                      <th class="text-center">Balance box</th>
                      <td class="text-center">${data.balance_box}</td>
                    </tr>
                    <tr class="total_box">
                      <th class="text-center">Total box</th>
                      <td class="text-center">${data.total_box}</td>
                    </tr>
<!--                     <tr class="total_box">
                      <th class="text-center">Paid Pending box</th>
                      <td class="text-center">${data.box_pending}</td>
                    </tr> -->
                  </tbody>
                </table>
              </div>
            </div>
              </div>
<!--             <div class="col-sm-6">
                <table class="table table-bordered table-hover" id="tab_logic_total">
                    <tbody>
                      <tr>
                        <th class="text-center">Total Box</th>
                        <td class="text-center">${data.total_box}</td>
                      </tr>
                      <tr>
                        <th class="text-center">Ice Bar</th>
                        <td class="text-center">${data.ice_bar}</td>
                      </tr>
                      <tr>
                        <th class="text-center">Per-ice Bar Amount</th>
                        <td class="text-center">${data.per_ice_bar}</td>
                      </tr>
                      <tr>
                        <th class="text-center">Total Ice Bar Amount</th>
                        <td class="text-center">${data.total_ice_bar}</td>
                      </tr>
                      <tr>
                        <th class="text-center">Packing Charge</th>
                        <td class="text-center">${data.per_packing_price}</td>
                      </tr>
                    </tbody>
                  </table>
                  </div> -->
            <div class="pull-right col-md-6">
              <table class="table table-bordered table-hover" id="tab_logic_total2">
                <tbody>
                  <tr>
                    <th class="text-center">Gross Amount</th>
                    <td class="text-center">${data.grass_amount}</td>
                  </tr>
                  <tr>
                    <th class="text-center">Transport Charge</th>
                    <td class="text-center">${data.transport_charge}</td>
                  </tr>
                  <tr>
                    <th class="text-center">Excess</th>
                    <td class="text-center">${data.excess}</td>
                  </tr>
                  <tr>
                    <th class="text-center">Discount</th>
                    <td class="text-center">${data.less}</td>
                  </tr>
                  <tr>
                    <th class="text-center">Current Bill Amount</th>
                    <td class="text-center">${data.current_balance}</td>
                  </tr>
                  <tr>
                    <th class="text-center">previous Balance</th>
                    <td class="text-center">${data.pre_balance}</td>
                  </tr>
                  <tr>
                    <th class="text-center">Overall Balance</th>
                    <td class="text-center">${data.overall}</td>
                  </tr>
<!--                   <tr>
                    <th class="text-center">Paid Pending Amount</th>
                    <td class="text-center">${data.amount_pending}</td>
                  </tr> -->
                </tbody>
              </table>
            </div>
          </div>


      </div>
      </div>
          `        
          report.innerHTML = html

        let overallbalance =document.getElementById("overallbalance");
        let overallbox =document.getElementById("overallbox");
        let previousebalance =document.getElementById("previousebalance");
        let previousebox =document.getElementById("prebox");
        let currentbillamount =document.getElementById("currentbillamount");
        let currentbox =document.getElementById("currentbillbox");

        //overallbalance.value = data.overall;
        //overallbox.value =data.total_box;
        //previousebalance.value = data.pre_balance;
        //previousebox.value =data.balance_box;

        currentbillamount.value = data.amount_pending;
        currentbox.value = data.box_pending;

    }

   calculatePending = ()=>{
    var Enteramount = $("#amount").val();
    var Enterbox = $("#returnbox").val();
     var currentbillamount = $("#currentbillamount").val();
     var currentbillbox = $("#currentbillbox").val();
     var remaining_amount = Number(currentbillamount) - Number(Enteramount);
     var remaining_box = Number(currentbillbox) - Number(Enterbox);
     $("#remainingamount").val(remaining_amount);
     $("#remainbox").val(remaining_box);
     $("#paidamount").val(Enteramount);
     $("#paidbox").val(Enterbox);
 }
        //$("#submit").click(function () {
        //    var selectedValue = $("#bill").val();
        //    alert(selectedValue);
       // });

@endsection
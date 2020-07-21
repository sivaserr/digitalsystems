@extends('layouts.master')

@section('navbar_brand')
    Transation Details
@endsection
<style>
  .account_details {
    font-size: 14px;
    font-weight: 600;
    color: #9a9a9a;
}
.account_details ul {
    list-style: none;
}
.table.transaction_table tr th {
    font-size: 17px;
    text-transform: capitalize;
    color: #9a9a9a;
}
 .transaction_table {
    border: 1px solid #dee2e6;
}
.transaction_table tr th, .transaction_table tr td {
    border: 1px solid #dee2e6!important;
}
      </style>
@section('content')
<?php
  $bank_details = DB::table('bank_details')->select('bank_details.*')->get();
  $bank_detail = DB::table('bank_details')->select('bank_details.opening_balance')->first();

  $suppliers = DB::table('suppliers')->select('suppliers.*')->get();
  $customers = DB::table('customer')->select('customer.*')->get();
  $sales_paid_details = DB::table('sales_paid_details')->select('sales_paid_details.*')->get();
?>
<div class="row">
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="unit_title">
          <h4 class="card-title">Transaction List </h4>
      </div>
    </div>






    <div class="account_details">
      <form  action="/transaction_details" method="POST">
        {{ csrf_field() }}
      <div class="container">
        <div class="row">
    <div class="col-sm-6">
              <div class="form-group">
                    <label for="payment">Account Holder</label>
              <select id="account_holder" class="form-control" name="account_holder" >
              <option>Chosse</option>
              @foreach($bank_details as $bank_detail)
              <option value="{{$bank_detail->id}}">{{$bank_detail->short_name}}-{{$bank_detail->ac_holder}}</option>
              @endforeach
              </select>
              </div>
    </div>
    <div class="col-sm-6">
<!--               <div class="form-group">
                    <label for="bankname">Bank Name</label>
                    <input type="text" class="form-control" name="bankname" id="bankname"  aria-describedby="bankname" placeholder="Bank Name" required>
              </div> -->
              <button type="submit" class="btn btn-success">Submit</button>
    </div>
  </div>

<!--           <div class="row">
    <div class="col-sm-6">
              <div class="form-group">
                    <label for="account_no">Account No</label>
                    <input type="text" class="form-control" name="account_no" id="account_no" aria-describedby="account_no"  placeholder="Account No" required>
              </div>
    </div>
    <div class="col-sm-6">
              <div class="form-group">
                    <label for="branch">Branch</label>
                    <input type="text" class="form-control" name="branch" id="branch" aria-describedby="branch" placeholder="Branch" required>
              </div>
    </div>
  </div> -->



<!--       <div class="row">
        <div class="col-sm-6">
              <ul>
                <li>Account Holder:</li>
                <li>Account No</li>
              </ul>
        </div>
        <div class="col-sm-6">
                        <ul>
                <li>Bank Name:</li>
                <li>Date:</li>
              </ul>
        </div>
      </div> -->
    </div>
    </form>
    </div>
    





    <div class="card-body">
            <div class="table-responsive">
              <table class="table transaction_table">
                <thead class=" text-primary">
                  <th>S.No</th>
                  <th>Trans Date</th>
                  <th>reference No</th>
                  <th>Name</th>
                  <th>Debit</th>
                  <th>Credit</th>
                  <th>Balance</th>
                </thead>
                <tbody>
                    <?php $id = 1; ?>
                  @if(count($tranfers) > 0)
                  @foreach($tranfers as $tranfer)
                  <tr>
                  <td>{{$id}}</td>
                  <td>{{Carbon\Carbon::parse($tranfer->date)->format('d-m-Y')}}</td>
                  <td>{{$tranfer->ref_no}}</td>
                  @foreach($suppliers as $supplier)
                  @if($tranfer->supplier_id === $supplier->id)
                  <td>{{$supplier->supplier_name}}</td>
                  @endif
                  @endforeach
                  <td>{{$tranfer->debit}}</td>
                  <td>0</td>
                  <td>{{$tranfer->balance}}</td>
            
                  </tr>
                  <?php $id++; ?>
                  @endforeach
                  @endif

                  @if(count($tranfers) > 0)
                  @foreach($tranfers as $tranfer)
                  @foreach($sales_paid_details as $sales_paid_detail)
                  @if($tranfer->bank_id == $sales_paid_detail->bank_id)
                  <tr>
                  <td>{{$id}}</td>
                  <td>{{Carbon\Carbon::parse($sales_paid_detail->date)->format('d-m-Y')}}</td>
                  <td>{{$sales_paid_detail->ref_no}}</td>
                  @foreach($customers as $customer)
                  @if($sales_paid_detail->customer_id === $customer->id)
                  <td>{{$customer->name}}</td>
                  @endif
                  @endforeach
                  <td>0</td>
                  <td>{{$sales_paid_detail->credit}}</td>
                  <td>{{$sales_paid_detail->balance}}</td>
            
                  </tr>
                  <?php $id++; ?>
                  @endif
                  @endforeach
                  @endforeach
                  @endif


                </tbody>
              </table>
            </div>
          </div>
  </div>
</div>
</div>
@endsection
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
  $suppliers = DB::table('suppliers')->select('suppliers.*')->get();
  $paid_details = DB::table('paid_details')->select('paid_details.*')->get();
?>
<div class="row">
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="unit_title">
          <h4 class="card-title">Transaction List </h4>
      </div>
    </div>


   
      <div class="trip_create">
          <a href="#" type="button" class="btn btn-primary btn-success" data-toggle="modal" data-target="#form" ><span class="glyphicon glyphicon-plus"></span>Debit</a>
      </div>

    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header border-bottom-0">
            <h5 class="modal-title" id="exampleModalLabel">Debit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <form  action="{{ route('adddebit') }}" method="POST">
          {{ csrf_field()}} <!--security token-->

          <div class="modal-body">
                <div class="form-group">
                    <label for="acholder">Account Holder</label>
              <select id="acholder" class="form-control" name="acholder" >
              <option>Chosse</option>
              @foreach($bank_details as $bank_detail)
              <option value="{{$bank_detail->id}}">{{$bank_detail->short_name}}-{{$bank_detail->ac_holder}}</option>
              @endforeach
              </select>
                </div>
                <div class="form-group">
                    <label for="transdate">Transaction Date</label>
                    <input type="date" class="form-control" name="transdate" id="transdate" aria-describedby="transdate" placeholder="Enter date" required>
                </div>
                <div class="form-group">
                    <label for="refno">Reference No</label>
                    <input type="text" class="form-control" name="refno" id="refno" aria-describedby="refno" placeholder="Enter name" required>
                </div>

               <div class="form-group">
                    <label for="suppliername">Supplier Name</label>
              <select id="suppliername" class="form-control" name="suppliername" >
              <option>Chosse</option>
              @foreach($suppliers as $supplier)
              <option value="{{$supplier->id}}">{{$supplier->short_name}}</option>
              @endforeach
              </select>
                </div>
                <div class="form-group">
                    <label for="trip">Debit</label>
                    <input type="text" class="form-control" name="debit" id="debit" aria-describedby="debit" placeholder="Enter name" required>
                </div>
            </div>
            <div class="modal-footer border-top-0 d-flex justify-content-center">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>


    <div class="card-body">
            <div class="table-responsive">
              <table class="table transaction_table">
                <thead class=" text-primary">
                  <th>S.No</th>
                  <th>Account</th>
                  <th>Trans Date</th>
                  <th>reference No</th>
                  <th>Supplier Name</th>
                  <th>Debit</th>
                </thead>
                <tbody>
                    <?php $id = 1; ?>
                  @foreach($paid_details as $paid_detail)
                  <tr>
                  <td>{{$id}}</td>
                  @foreach($bank_details as $bank_detail)
                  @if($bank_detail->id == $paid_detail->bank_id)
                  <td>{{$bank_detail->ac_holder}}</td>
                  @endif
                  @endforeach
                  <td>{{$paid_detail->date}}</td>
                  <td>{{$paid_detail->ref_no}}</td>
                  @foreach($suppliers as $supplier)
                  @if($supplier->id === $paid_detail->supplier_id)
                  <td>{{$supplier->supplier_name}}</td>
                  @endif
                  @endforeach
                  <td>{{$paid_detail->debit}}</td>
            
                  </tr>
                  <?php $id++; ?>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

   
  </div>
</div>
</div>
@endsection
@extends('layouts.master')
@section('navbar_brand')
    Bank Details
@endsection


@section('content')
<div class="row">
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="unit_title">
          <h4 class="card-title">Bank</h4>
      </div>

    </div>
    
        <form  action="/bank-details-update/{{$bank->id}}" method="POST">
          {{ csrf_field()}} <!--security token-->
          {{ method_field('PUT')}}


          <div class="modal-body">
                <div class="form-group">
                    <label for="bank">Account Holder</label>
                    <input type="text" class="form-control" name="accountholder" id="accountholder" aria-describedby="accountholder" value="{{$bank->ac_holder}}" required>
                </div>
                <div class="form-group">
                    <label for="bank">Account No</label>
                    <input type="text" class="form-control" name="accountno" id="accountno" aria-describedby="accountno" value="{{$bank->ac_no}}"required>
                </div>
                <div class="form-group">
                    <label for="bank">Bank name</label>
                    <input type="text" class="form-control" name="bankname" id="bankname" aria-describedby="bankname" value="{{$bank->bank_name}}"  required>
                </div>
                <div class="form-group">
                    <label for="bank">Short name</label>
                    <input type="text" class="form-control" name="shortname" id="shortname" aria-describedby="shortname"value="{{$bank->short_name}}"  required>
                </div>
                <div class="form-group">
                    <label for="bank">Branch</label>
                    <input type="text" class="form-control" name="branch" id="branch" aria-describedby="branch" value="{{$bank->branch}}" required>
                </div>
                <div class="form-group">
                    <label for="bank">Opening Balance</label>
                    <input type="text" class="form-control" name="openbalance" id="openbalance" aria-describedby="openbalance" value="{{$bank->opening_balance}}"  required>
                </div>
            </div>
            <div class="modal-footer border-top-0 d-flex justify-content-center">
              <button type="submit" class="btn btn-success">Update</button>
            </div>
          </form>

  </div>
</div>
</div>
@endsection
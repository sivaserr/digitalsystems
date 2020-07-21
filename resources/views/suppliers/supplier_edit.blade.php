@extends('layouts.master')

@section('navbar_brand')
  Edit Supplier Details
@endsection

<?php
$status = DB::table('suppliers')->select('suppliers.status')->get();

// var_dump($status);

?>
@section('content')
      
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="customer_title">
              <h4 class="card-title">supplier details</h4>
          </div>

        <form action="/supplierupdate/{{ $supplier->id }}" method="POST">
           {{ csrf_field() }}
           {{ method_field('PUT')}}
              <div class="modal-body">
                    <div class="form-group">
                            <label for="supplier_name">Serial No</label>
                            <input type="text" class="form-control" name="serialno" id="serialno" aria-describedby="serialno" value="{{$supplier->serial_no}}" required>
                    </div>
                    <div class="form-group">
                        <label for="supplier_name">supplier</label>
                    <input type="text" class="form-control" name="supplier_name" value="{{$supplier->supplier_name}}" id="supplier_name" aria-describedby="supplier_name" placeholder="Enter supplier name">
                        {{-- <small id="name" class="form-text text-muted">Your information is safe with us.</small> --}}
                      </div>
                      <div class="form-group">
                          <label for="short_name">short_name</label>
                          <input type="text" class="form-control" name="short_name" value="{{$supplier->short_name}}" id="short_name" aria-describedby="short_name" placeholder="Enter short_name">
                        </div>
                      <div class="form-group">
                          <label for="city">City</label>
                          <input type="text" class="form-control" name="city" value="{{$supplier->city}}" id="city" aria-describedby="city" placeholder="Enter city">
                        </div>
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{$supplier->phone}}" id="phone" placeholder="phone">
                  </div>
                  <div class="form-group">
                    <label for="opening_balance">Opening balance</label>
                    <input type="text" class="form-control" name="opening_balance" value="{{$supplier ->opening_balance}}" id="opening_balance" placeholder="opening_balance" required>
                  </div>
                  <div class="form-group">
                    <label for="opening_box">Opening Box</label>
                    <input type="text" class="form-control" name="opening_box" value="{{$supplier ->opening_box}}" id="opening_box" placeholder="opening_box" required>
                  </div>
                  <div class="customer_status">
                    <label for="phone">Active</label>
                   <select name="status" id="status" class="form-control">
                     @if($supplier->status == 1){
                      <option value="0" name='1'selected="selected">Disable</option>
                      <option value="1" selected="selected">Enable</option>
                     }@else{
                      <option value="1" selected="selected">Enable</option>
                      <option value="0" selected="selected">Disable</option>
                     }
                    @endif
                   </select>
                 </div>
                </div>
                <div class="modal-footer border-top-0 d-flex justify-content-center">
                  <button type="submit" class="btn btn-success">Save</button>
                </div>
              </form>
        </div>
        


      </div>
    </div>
  </div>


@endsection
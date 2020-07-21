@extends('layouts.master')

@section('navbar_brand')
Customer Rate Fixing
@endsection


@section('content')
<?php
  $customers = DB::table('customer')->select('customer.*')->get();
  $products = DB::table('products')->select('products.*')->get();
  $customer_rate_fixing_products = DB::table('customer_rate_fixing_products')->select('customer_rate_fixing_products.*')->get();
   
?>
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="customer_title">
              <h4 class="card-title">Customers details</h4>
          </div>
        </div>
        <form id="editcustomerratefixingproduct" action="/customerrateupdate/{{ $customerratefixing->id }}" method="POST">
           {{ csrf_field() }}
           {{ method_field('PUT')}}
              <div class="modal-body">
                    <div class="modal-body">
                    <input type="hidden" class="customerratefixing" value="{{$customerratefixing->id}}"/>
                            <div class="form-group">
                                <label for="customer">Customer</label>
                            <select name="customer" id="customer" class="form-control">
                            @foreach ($customers as $customer)
                            @if($customer->id == $customerratefixing->customer_id )
                           <option value="{{$customer->id}}"> {{$customer->name}}</option>
                            @endif
                            @endforeach
                             @foreach ($customers as $customer)
                            @if($customer->id !== $customerratefixing->customer_id )
                           <option value="{{$customer->id}}"> {{$customer->name}}</option>
                            @endif
                            @endforeach
                                </select>
                            </div>
                          <div class="form-group">
<!--                               <label for="product">Product</label>
                              <select name="product" id="product" class="form-control">
                                    <option>Choose</option>
                                  @foreach ($products as $product)
                                <option value="{{$product->id}}"> {{$product->product_name}}</option>
                                  @endforeach
                                </select>   --> 
                         <label for="product">Product</label>
                         <div class="table-responsive producttable">
      <table class="table table-bordered table-hover" id="tab_logic">
        <thead>
          <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Product</th>
            <th class="text-center">Rate</th>
            <th class="text-center">Delete</th>
          </tr>
        </thead>
        <tbody id="editdynamic_ratefixingproduct_rows">
          <?php $id = 1; ?>
            @foreach($customer_rate_fixing_products as $customer_rate_fixing_product)
            @if($customer_rate_fixing_product->customerratefixing_id == $customerratefixing->id)
          <tr id='addr0'>
            <td>{{$id}}</td>
            <td>
                <select name="product" id="product" class="form-control productname">
                  @foreach ($products as $product)
                    @if($customer_rate_fixing_product->product_id == $product->id)
                 <option value="{{$product->id}}"> {{$product->product_name}}</option>
                    @endif
                  @endforeach
                  @foreach ($products as $product)
                    @if($customerratefixing->product_id !== $product->id)
                 <option value="{{$product->id}}"> {{$product->product_name}}</option>
                    @endif
                  @endforeach
                </select>
            </td>
            <td>
            <input type="text" name='rate' value="{{$customer_rate_fixing_product->fixed_rate}}" class="form-control rate"/>
            </td>
          <td style="text-align:center;"><a href="/customer_rate_fixingproduct/{{$customer_rate_fixing_product->id}}"><i class="fas fa-trash-alt"></i></a></td>
          </tr>
          @endif
        <?php $id++; ?>
            @endforeach  
<tr id='addr1'></tr>
        </tbody>
      </table>
                         </div>
                         <div class="text-center producttablebtn"><a id="add_productrow" class="btn btn-default pull-left">Add Row</a><a id='delete_productrow' class="pull-right btn btn-default">Delete Row</a></div>
                          </div>
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
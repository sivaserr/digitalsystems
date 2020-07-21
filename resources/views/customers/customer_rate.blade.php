@extends('layouts.master')

@section('navbar_brand')
Customer Rate Fixing
@endsection
<style>
        .customer_title {
          display: inline-block;
      }
      .customer_create {
          display: inline-block;
          float: right;
      }
      </style>
@section('content')
<?php 
$customers =DB::table('customer')->select('customer.*')->get();
$products =DB::table('products')->select('products.*')->get();
?>
<div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="customer_title">
                  <h4 class="card-title">Customer Rate Fixing </h4>
              </div>
              <div class="customer_create">
                  <a href="#" type="button" class="btn btn-primary btn-success" data-toggle="modal" data-target="#form" ><span class="glyphicon glyphicon-plus"></span> CREATE</a>
              </div>
            </div>
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
@endif

@if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-danger">
<li>{{$error}}</li>
</div>
@endforeach
@endif    
            <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="exampleModalLabel">Create new rate fixing</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <form id="customerratefixingproduct" action="{{route('Addcustomerrate')}}" method="POST">
                  {{ csrf_field()}} <!--security token-->

                  <div class="modal-body">
                        <div class="form-group">
                            <label for="customer">Customer</label>
                            <select name="customer" id="customer" class="form-control">
                                    <option>Choose</option>
                                  @foreach ($customers as $customer)
                                <option value="{{$customer->id}}"> {{$customer->name}}</option>
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
          </tr>
        </thead>
        <tbody id="dynamic_ratefixingproduct_rows">
          <tr id='addr0'>
            <td>1</td>
            <td>
                <select name="product" id="product" class="form-control productname">
                 <option>Choose</option>
                  @foreach ($products as $product)
                 <option value="{{$product->id}}"> {{$product->product_name}}</option>
                  @endforeach
                </select>
            </td>
            <td>
            <input type="text" name='rate' placeholder='rate' class="form-control rate"/>
            </td>
          </tr>
            <tr id='addr1'></tr>
        </tbody>
      </table>
                         </div>
                         <div class="text-center producttablebtn"><a id="add_productrow" class="btn btn-default pull-left">Add Row</a><a id='delete_productrow' class="pull-right btn btn-default">Delete Row</a></div>
                          </div>
<!--                           <div class="form-group">
                              <label for="rate">Rate</label>
                              <input type="text" class="form-control" name="rate" id="rate" aria-describedby="rate" placeholder="Enter rate" required>
                            </div> -->
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
                <table class="table">
                  <thead class=" text-primary">
                    <th>S.no</th>
                    <th>Customer</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </thead>
                  <tbody>
                      <?php $id = 1; ?>
                      @foreach($customerratefixings as $customerratefixing)
                    <tr>

                    <td>{{$id}}</td>
                    @foreach($customers as $customer)
                    @if($customer->id === $customerratefixing->customer_id)
                    <td>{{$customer->name}}</td>
                    @endif
                   @endforeach
                    <td><a href="/rate_edit/{{$customerratefixing->id}}" class="btn btn-sm btn-info">Edit <span class="glyphicon glyphicon-edit"></span></a></td>
                    <td><a href="/rate_fixing/{{$customerratefixing->id}}" class="btn btn-sm btn-danger">Delete</a></td>
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


@section('scripts')

@endsection
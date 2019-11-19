@extends('layouts.master')
@section('navbar_brand')
    Bill
@endsection
<style>
.billing_title {
    text-align: center;
    color: #4CAF50;
}
</style>

@section('content')
<div class="card">
    <?php 
    $customer = DB::table('customer')->select('customer.*')->get();
    
    ?>
    <div class="card-header">
        <div class="billing_title">
            <h4 class="card-title">ARS </h4>
        </div>
      </div>
        <div class="container">
          
                <form action="#" method="POST">
                  {{ csrf_field()}} <!--security token-->
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <label for="name">Invoice no</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="Enter invoice no" required>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="customer_status">
            <label for="phone">Customer</label>
           <select name="status" id="status" class="form-control">
              @foreach ($customer as $customers) 
              @if($customers->status === 1)
              <option value="#">{{$customers->name}} </option>
            @endif
             @endforeach
           </select>
         </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label for="name">Date</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="Enter date" required>
          </div>
        </div>
      </div>




      <div class="row clearfix">
          <div class="col-md-12">
            <table class="table table-bordered table-hover" id="tab_logic">
              <thead>
                <tr>
                  <th class="text-center"> # </th>
                  <th class="text-center"> Product </th>
                  <th class="text-center"> Qty </th>
                  <th class="text-center"> Price </th>
                  <th class="text-center"> Total </th>
                </tr>
              </thead>
              <tbody>
                <tr id='addr0'>
                  <td>1</td>
                  <td><input type="text" name='product[]'  placeholder='Enter Product Name' class="form-control"/></td>
                  <td><input type="number" name='qty[]' placeholder='Enter Qty' class="form-control qty" step="0" min="0"/></td>
                  <td><input type="number" name='price[]' placeholder='Enter Unit Price' class="form-control price" step="0.00" min="0"/></td>
                  <td><input type="number" name='total[]' placeholder='0.00' class="form-control total" readonly/></td>
                </tr>
                <tr id='addr1'></tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row clearfix">
          <div class="col-md-12">
            <button id="add_row" class="btn btn-default pull-left">Add Row</button>
            <button id='delete_row' class="pull-right btn btn-default">Delete Row</button>
          </div>
        </div>
        <div class="row clearfix" style="margin-top:20px">
          <div class="pull-right col-md-4">
            <table class="table table-bordered table-hover" id="tab_logic_total">
              <tbody>
                <tr>
                  <th class="text-center">Sub Total</th>
                  <td class="text-center"><input type="number" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" readonly/></td>
                </tr>
                <tr>
                  <th class="text-center">Tax</th>
                  <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                      <input type="number" class="form-control" id="tax" placeholder="0">
                      <div class="input-group-addon">%</div>
                    </div></td>
                </tr>
                <tr>
                  <th class="text-center">Tax Amount</th>
                  <td class="text-center"><input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly/></td>
                </tr>
                <tr>
                  <th class="text-center">Grand Total</th>
                  <td class="text-center"><input type="number" name='total_amount' id="total_amount" placeholder='0.00' class="form-control" readonly/></td>
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
@endsection
<script>

</script>
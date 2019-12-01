@extends('layouts.master')

@section('navbar_brand')

Day Report
@endsection
<style type="text/css">
	#billcustomer {
    padding: 9px;
}
.button {
    text-align: center;
    padding-top: 10px;
}
</style>
@section('content')
    <?php 
    $customer = DB::table('customer')->select('customer.*')->get();
    $products = DB::table('products')->select('products.*')->get();
    
    ?>
          <div class="card">
            <div class="card-header">
              <div class="product_title">
                  <h4 class="card-title">Day wise report </h4>
              </div>

            </div>   




        <div class="container">

                    <div class="row">
        	<div class="col-sm-4">
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
        	<div class="col-sm-4">
          <div class="form-group">
            <label for="name">Date</label>
            <input type="text" class="form-control" name="date" id="date" aria-describedby="date" placeholder="Enter date" required>
          </div>
        	</div>
        	<div class="col-sm-4">
        		<div class="button">
        			    <button type="submit" class="btn btn-success">Submit</button>
        		</div>
        	</div>

        </div>  

    </div>

<div class="report_body">
	
</div>
        </div>

@endsection
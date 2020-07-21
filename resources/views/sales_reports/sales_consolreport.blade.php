@extends('layouts.master')
@section('navbar_brand')
Sales consolidation
@endsection

@section('content')
 <?php
    $customers = DB::table('customer')->select('customer.*')->orderBy('serial_no')->get();
   $trips = DB::table('trips')->select('trips.*')->get();
   $set_trip = DB::table('set_trip')->select('set_trip.set_trip')->first();

   $products = DB::table('products')->select('products.*')->get();
   
   $salesofproducts = DB::table('products')
                     ->join('sales_products' ,'products.id' ,'=','sales_products.product_id')
                     ->join('sales','sales_products.sales_id' ,'=','sales.id')
                     ->select('sales.trip_id','products.product_name','products.id')
                     ->where('trip_id','=',$set_trip->set_trip)
                     ->groupBy('product_id')
                     ->get();






    // $customersalesproducts = DB::table('sales_products')
    //                         ->select('sales_products.customer_id', DB::raw('SUM(box) as total_box'),DB::raw('SUM(loose_kg) as loose_kg'))
    //                  ->groupBy('customer_id')
    //                  ->get();

    $customersales = DB::table('sales')
                     ->select('sales.customer_id',DB::raw('SUM(current_balance) as amount'), DB::raw('SUM(balance_box) as balance_box'),DB::raw('SUM(today_box) as total_box'),DB::raw('SUM(box_pending) as taken_box'))
                     ->where('trip_id','=',$set_trip->set_trip)
                     ->groupBy('customer_id')
                     ->get();
// $products2 = json_decode($products,true);
// $customers2 = json_decode($customers,true);

// $productslist =[];
//  foreach ($customers as  $customer) {
//   foreach ($products as $key => $product) {
//        $productslists = DB::table('sales_products')->select('sales_products.*')->where([['customer_id','=',22],['product_id','=', $product->id]])->get();

//   }
//  }


//var_dump($productslist);exit;
   ?> 
<div class="row">
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="unit_title">
          <h4 class="card-title">Sales Consolidation Sheet</h4>
      </div>

    </div>
    



    <div class="card-body">
            <div class="table-responsive">
              <table class="table consol_table">
                <thead class=" text-primary">
<!--                   <tr scope="row">
                  <th colspan="10">Purchase Box</th>
                  </tr>
                  <tr scope="row">
                  <th colspan="3">Date :</th>
                  <th colspan="3">Day :</th>
                  <th colspan="3">Delivery sheet :</th>
                  <th colspan="3">Trip no :</th>
                  </tr> -->
                  <tr scope="row">
                    <th colspan="20" style="text-align: center;">A.R.S TRADERS</th>
                  </tr>
                  <tr scope="row">
                    @foreach($trips as $trip)
                    @if($trip->id == $set_trip->set_trip)
                    <th colspan="4">Trip :{{$trip->trip_name}}</th>

                    <th colspan="4" style="text-align: center;">Delivery sheet</th>
                    <th colspan="4">Date :{{Carbon\Carbon::parse($trip->date)->format('d-m-Y')}}</th>
                    @endif
                    @endforeach
                  </tr>
                  <tr scope="row">
                  <th>S.no</th>
                  <th>Name</th>
                  @foreach($salesofproducts as $salesofproduct)
                  <th>{{$salesofproduct->product_name}}</th>
                  @endforeach
                  <th>Amount</th>
                  <th>Sub-Total-box </th>
                  <th>Pre-box</th>
                  <th>Total-box</th>
                  <th>Taken-box</th>
                  <th>Remain-box</th>
                  </tr>

                </thead>
                <tbody>
                <?php $id = 1; ?>
                @foreach($customers as $customer)

                     @foreach($customersales as $customersale)

                  @if($customersale->customer_id == $customer->id)
                  <tr>
                  <td>{{$id}}</td>
                  <td>{{$customer->short_name}}</td>
                  @foreach($salesofproducts as $salesofproduct)
                  <?php 

                  $sale_productdatas = DB::table('sales')
                   ->leftJoin('sales_products','sales.id','=','sales_products.sales_id')
                   ->select('sales_products.price','sales_products.customer_id','sales_products.product_id',DB::raw('SUM(box) as total_box'),DB::raw('SUM(loose_kg) as total_loosekg'))
                   ->where(['sales_products.customer_id' => $customer->id,'sales_products.product_id' => $salesofproduct->id,'sales.trip_id' =>$set_trip->set_trip])
                   ->get()->first();
                  //var_dump($sale_productdatas);exit;  

                  $sale_productdata = json_decode(json_encode($sale_productdatas) , true);
 
                   ?>  
                  @if($sale_productdata['total_box'] >= 0)
                  @if($sale_productdata['product_id'] == $salesofproduct->id)      
                  <td>{{$sale_productdata['total_box']}} + {{$sale_productdata['total_loosekg']}} X {{$sale_productdata['price']}}</td>
                  @else<td>-</td>
                  @endif 
                  @endif
                  @endforeach

                  <td>{{number_format($customersale->amount)}}</td>
                  <td>{{$customersale->total_box}}</td>
                  <td>{{$customersale->balance_box}}</td>
                  <td>{{$customersale->total_box + $customersale->balance_box}}</td>
                  <td>{{$customersale->total_box - $customersale->taken_box}}</td>
                  <td>{{($customersale->total_box + $customersale->balance_box)-($customersale->total_box - $customersale->taken_box)}}</td>
                  </tr>
                  <?php $id++?>

                                    @endif

                @endforeach
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
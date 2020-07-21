@extends('layouts.master')
@section('navbar_brand')
Purchase consolidation
@endsection

@section('content')
 <?php

   $suppliers = DB::table('suppliers')->select('suppliers.*')->orderBy('serial_no')->get();
   $trips = DB::table('trips')->select('trips.*')->get();
   $set_trip = DB::table('set_trip')->select('set_trip.set_trip')->first();
   $products = DB::table('products')->select('products.*')->get();

   $purchaseofproducts = DB::table('products')
                     ->join('purchases_products' ,'products.id' ,'=','purchases_products.product_id')
                     ->join('purchases' ,'purchases_products.bill_id','=','purchases.id')
                     ->select('purchases.trip_id','products.product_name','products.id')
                     ->where('trip_id','=',$set_trip->set_trip)
                     ->groupBy('product_id')
                     ->get();

//var_dump($purchaseofproducts);exit;



    // $supplierpurchaseproducts = DB::table('purchases_products')
    //                         ->select('purchases_products.supplier_id', DB::raw('SUM(box) as total_box'),DB::raw('SUM(loose_kg) as loose_kg'))
    //                  ->groupBy('supplier_id')
    //                  ->get();

    $supplierpurchases = DB::table('purchases')
                     ->select('purchases.supplier_id',DB::raw('SUM(current_balance) as amount'), DB::raw('SUM(balance_box) as balance_box'),DB::raw('SUM(today_box) as total_box'),DB::raw('SUM(box_pending) as taken_box'))
                     ->where('trip_id','=',$set_trip->set_trip)
                     ->groupBy('supplier_id')
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
          <h4 class="card-title">Purchase Consolidation Sheet</h4>
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
                  @foreach($purchaseofproducts as $purchaseofproduct)
                  <th>{{$purchaseofproduct->product_name}}</th>
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
                @foreach($suppliers as $supplier)

                     @foreach($supplierpurchases as $supplierpurchase)

                  @if($supplierpurchase->supplier_id == $supplier->id)
                  <tr>
                  <td>{{$id}}</td>
                  <td>{{$supplier->short_name}}</td>
                  @foreach($purchaseofproducts as $purchaseofproduct)
                  <?php 

                  // $purchase_productdatas = DB::table('purchases_products')
                  // ->select('purchases_products.price','purchases_products.supplier_id','purchases_products.product_id',DB::raw('SUM(box) as total_box'),DB::raw('SUM(loose_kg) as total_loosekg'))->where(['supplier_id' => $supplier->id,'product_id' => $purchaseofproduct->id])->groupBy('supplier_id','product_id','price')->get()->first();

                  $purchase_productdatas = DB::table('purchases')
                  ->leftJoin('purchases_products','purchases.id','=','purchases_products.bill_id')
                  ->select('purchases.trip_id','purchases_products.price','purchases_products.supplier_id','purchases_products.product_id',DB::raw('SUM(purchases_products.box) as total_box'),DB::raw('SUM(purchases_products.loose_kg) as total_loosekg'))
                  ->where(['purchases_products.supplier_id' => $supplier->id,'purchases_products.product_id' => $purchaseofproduct->id,'purchases.trip_id' =>$set_trip->set_trip ])
                  ->get()->first();
                  

                   $purchase_productdata = json_decode(json_encode($purchase_productdatas) , true);



                   ?>  

                  @if($purchase_productdata['total_box'] >= 0)
                  @if($purchase_productdata['product_id'] == $purchaseofproduct->id)      
                  <td>{{$purchase_productdata['total_box']}} + {{$purchase_productdata['total_loosekg']}}X {{$purchase_productdata['price']}}</td>
                  @else<td>-</td>
                  @endif 
                  @endif
                  @endforeach

                  <td>{{number_format($supplierpurchase->amount)}}</td>
                  <td>{{$supplierpurchase->total_box}}</td>
                  <td>{{$supplierpurchase->balance_box}}</td>
                  <td>{{$supplierpurchase->total_box + $supplierpurchase->balance_box}}</td>
                  <td>{{$supplierpurchase->total_box - $supplierpurchase->taken_box}}</td>
                  <td>{{($supplierpurchase->total_box + $supplierpurchase->balance_box)-($supplierpurchase->total_box - $supplierpurchase->taken_box)}}</td>
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
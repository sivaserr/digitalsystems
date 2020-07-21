@extends('layouts.master')

@section('navbar_brand')
    Stock Details
@endsection
@section('content')
    <?php 
    $products = DB::table('products')->select('products.*')->get();
    $units = DB::table('units')
             ->join('products','units.id','=','products.unit_id')
             ->select('units.unit_name','products.unit_id','products.id')->groupBy('products.id')
             ->get();


       $set_trip = DB::table('set_trip')->select('set_trip.set_trip')->first();

    $purchases_products = DB::table('purchases')
                ->join('purchases_products','purchases.id','=','purchases_products.bill_id')
                ->select('purchases.trip_id','purchases_products.product_id')
                ->where('purchases.trip_id','=',$set_trip->set_trip)
                ->groupBy('product_id')->get();

          //var_dump($units);exit;     

    // $salesstocks = DB::table('sales_products')
    //                  ->select('sales_products.product_id', DB::raw('SUM(box) as total_box'),DB::raw('SUM(loose_kg) as loose_kg'))
    //                  ->groupBy('product_id')
    //                  ->get();
   // var_dump($salesstocks);exit;
    ?>
<div class="row">
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="unit_title">
          <h4 class="card-title">Item Stock list </h4>
      </div>

    </div>
    



    <div class="card-body">
            <div class="table-responsive">
              <table class="table stock_table">
                <thead class=" text-primary">
                  <th>S.No</th>
                  <th>Product</th>
                  <th>Purchase Box</th>
                  <th>Sales Box</th>
                  <th>Stock Box</th>
                </thead>
                <tbody>
                    <?php $id = 1;

                     ?>
                 @foreach($purchases_products as $purchases_product)

                  <tr>
                  <?php
                    

                     $purchasstocks = DB::table('purchases')
                     ->join('purchases_products','purchases.id','=','purchases_products.bill_id')
                     ->select('purchases.trip_id','purchases_products.product_id', DB::raw('SUM(box) as total_box'),DB::raw('SUM(loose_box) as loose_box'),DB::raw('SUM(loose_kg) as loose_kg'))
                     ->where(['purchases_products.product_id' => $purchases_product->product_id,'purchases.trip_id'=>$set_trip->set_trip])->where('purchases.trip_id','<>',NULL)
                     ->groupBy('product_id')
                     ->get()->first();

//var_dump($purchasstocks);

                      $salesstocks = DB::table('sales')
                      ->join('sales_products','sales.id','=','sales_products.sales_id')
                     ->select('sales.trip_id','sales_products.product_id', DB::raw('SUM(box) as total_box'),DB::raw('SUM(loose_kg) as loose_kg'),DB::raw('SUM(loose_box) as loosebox'),DB::raw('COUNT(product_id) as product_count'))
                     ->where(['sales_products.product_id' => $purchases_product->product_id,'sales.trip_id'=>$set_trip->set_trip])
                     ->groupBy('product_id')
                     ->get()->first();
                     //var_dump($salesstocks);

                                    

                  ?>

                  <td>{{$id}}</td>
                  @foreach($products as $product)
                  @if($purchases_product->product_id == $product->id)
                  <td>{{$product->product_name}}</td>
                  @endif
                  @endforeach
                  <td><?php echo (!empty($purchasstocks)) ? $purchasstocks->total_box : 0; ?> + <?php echo (!empty($purchasstocks)) ? $purchasstocks->loose_kg : 0; ?>Kg</td>
                  <td>
                    <?php 
                    if(!empty($salesstocks)){
                        foreach($units as $unit){
                            if($unit->id === $purchasstocks->product_id){
                               $unit_value =$unit->unit_name;

                               $loosekg = $salesstocks->loose_kg/$unit_value;
                               $point1 = substr($loosekg, 0, 1);
                               $point2 = "0".substr(".".$loosekg, 2, 3);
                               $finalloosekg = round($point2*$unit_value);
                               echo $salesstocks->total_box + $point1."+".$finalloosekg."Kg";

                            }
                        }
                    }else{
                         echo 0;
                    }

                    ?></td>
                  <td><?php
                  foreach($units as $unit){
                    if($unit->id === $purchasstocks->product_id){
                      $unit_value =$unit->unit_name;
             
                      if(!empty($purchasstocks) && !empty($salesstocks)){
                        // $loose_double = $salesstocks->loose_kg;
                        // $looseint = (int)$loose_double;
                         $purchase = $purchasstocks->total_box * $unit_value + $purchasstocks->loose_kg ;

                         $sales = $salesstocks->total_box * $unit_value + $salesstocks->loose_kg;

                         $total =($purchase - $sales)/$unit_value;

                            $stocks = explode(".",$total);
                            $stockbox = $stocks[0];
                            $stockloosekg = 0 ."." .$stocks[1];
                            
                            $finalstockloosekg = round($stockloosekg*$unit_value);
                        
                        echo $stockbox ."+".$finalstockloosekg."Kg";
                       // if($salesstocks->loose_kg >  0 && $salesstocks->loosebox>0){
                       //     $final;
                       //    if($purchasstocks->loose_kg == 0 ){
                       //       $final = $unit_value -  $salesstocks->loose_kg  ;
                       //    }else{
                       //      $final = $purchasstocks->loose_kg -  $salesstocks->loose_kg  ;
                       //    }
                       //    echo $purchasstocks->total_box - $salesstocks->total_box - $salesstocks->loosebox  .'+'.  $final  .'Kg';
                       //  }else{
                       //   $final = $purchasstocks->loose_kg-  $salesstocks->loose_kg  ;
                       //    echo $purchasstocks->total_box - $salesstocks->total_box  .'+'.  $final  .'Kg';                               
                       //  }
                           
                                              
                      }else if(!empty($purchasstocks)){

                         echo $purchasstocks->total_box. '+' .$purchasstocks->loose_kg .'Kg';

                      }else{

                         echo 0;

                      }
                    }
                  }

                    ?> 
                     


                 </td>
                  </tr>
                  <?php $id++?>
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
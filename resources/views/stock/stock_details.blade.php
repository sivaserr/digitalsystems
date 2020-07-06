@extends('layouts.master')

@section('navbar_brand')
    Stock Details
@endsection
@section('content')
    <?php 
    $products = DB::table('products')->select('products.*')->get();
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
                 @foreach($products as $product)
                  <tr>
                  <?php

                     $purchasstocks = DB::table('purchases_products')
                     ->select('purchases_products.product_id', DB::raw('SUM(box) as total_box'),DB::raw('SUM(loose_kg) as loose_kg'))
                     ->where('purchases_products.product_id','=',$product->id)
                     ->groupBy('product_id')
                     ->get()->first();

                      $salesstocks = DB::table('sales_products')
                     ->select('sales_products.product_id', DB::raw('SUM(box) as total_box'),DB::raw('SUM(loose_kg) as loose_kg'))
                     ->where('sales_products.product_id','=',$product->id)
                     ->groupBy('product_id')
                     ->get()->first();
                  ?>
                  <td>{{$id}}</td>
                  <td>{{$product->product_name}}</td>
                  <td><?php echo (!empty($purchasstocks)) ? $purchasstocks->total_box : 0; ?> + <?php echo (!empty($purchasstocks)) ? $purchasstocks->loose_kg : 0; ?>Kg</td>
                  <td><?php echo (!empty($salesstocks)) ? $salesstocks->total_box : 0; ?> + <?php echo (!empty($salesstocks)) ? $salesstocks->loose_kg : 0; ?> Kg</td>
                  <td><?php echo (!empty($salesstocks)) ? $purchasstocks->total_box - $salesstocks->total_box : 0; ?> + <?php echo (!empty($salesstocks)) ? $purchasstocks->loose_kg - $salesstocks->loose_kg: 0; ?>  Kg</td>
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
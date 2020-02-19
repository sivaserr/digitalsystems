@extends('layouts.master')
@section('navbar_brand')
consolidation
@endsection
<style>
   .settrip {
   padding: 50px;
   }
</style>
@section('content')
<?php
   $suppliers = DB::table('suppliers')->select('suppliers.*')->get();
   $bill_datas = DB::table('bill_data')->select('bill_data.*')->get();
   ?>
<div class="card">
   <div class="settrip table-responsive table-bordered">
      <table class="table table-bordered">
         <thead>
         </thead>
         <tbody>
            <tr>
               <th>ARS</th>
               @foreach ($products as $product)
               <td scope="col">{{$product->product_name}}</td>
               @endforeach
               <td>Total</td>
            </tr>
            @foreach ($suppliers as $supplier)
            <tr>
               <td>{{$supplier->short_name}}</td>
               <td></td>
               {{-- <td>
                    @foreach ($bill_datas as $bill_data)
                    @if ($supplier->id === $bill_data->supplier_id)
                    <td>{{$bill_data->box}}</td>
                    @else
                    <td></td>
                    @endif
                    @endforeach
               </td> --}}
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</div>
@endsection
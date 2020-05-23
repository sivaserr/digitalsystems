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
   $product_array = [];
   // var_dump($bill_datas);
   // exit;
   ?> 
<div class="card">
   <div class="settrip table-responsive table-bordered">
      <table class="table table-bordered">
         <thead>
         </thead>
          <tbody>
            <tr>
               <th>ARS</th>
            </tr>
            @foreach($Rows as $Row)
            <tr>
               <td>{{$Row[0]}}</td> 
               <td>{{$Row[1]}}</td>
               <td>{{$Row[2]}}</td>         
               <td>{{$Row[3]}}</td>         
               <td>{{$Row[4]}}</td>         
               <td>{{$Row[5]}}</td>         
               <td>{{$Row[6]}}</td>         
            </tr>
            @endforeach                                 

         </tbody> 
      </table>
   </div>
</div>
@endsection
@section('scripts')




@endsection
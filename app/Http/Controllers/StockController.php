<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

    	return view ('stock.stock_details');
    }
    // public function allproduct(){

    //     $products = Product::all();

    // 	return view ('stock.stock_details')->with('products',$products);
    // }
    public function sumofpurchasstock(){

        $purchasstocks = DB::table('purchases_products')
                     ->select('purchases_products.product_id', DB::raw('SUM(box) as total_box'),DB::raw('SUM(loose_kg) as loose_kg'))
                     ->groupBy('product_id')
                     ->get();
        //var_dump($sumtotals);exit;         
    	return view ('stock.stock_details')->with('purchasstocks',$purchasstocks);
    }
    // public function sumofsalesstock(){


    //     return view ('stock.stock_details')->with('salesstocks',$salesstocks);
    // }

}

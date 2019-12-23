<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductGroup;
use App\Unit;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.product');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();

        $product->product_name = $request->input('productname');
        $product->price = $request->input('price');
        // $product->weight = $request->input('weight');
        // $product->net_weight = $request->input('netweight');
        $product->product_group = $request->input('productgroupid');
        $product->unit_id = $request->input('unitid');
        $product->save();

        return redirect('/products')->with('product' ,$product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $products = Product::all();

        return view('products.product')->with('products',$products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);

        return view('products.product_edit')->with('products',$products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Product::find($id);
      
        $products->product_name = $request->input('productname');
        $products->price = $request->input('price');
        $products->product_group = $request->input('productgroupid');
        $products->unit_id = $request->input('unitid');
        // $products->weight = $request->input('weight');
        // $products->net_weight = $request->input('netweight');

        $products->save();

        return redirect('/products')->with('products' ,$products);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('products')->with('product',$product);
    }






    public function findprocductdata($id){

        $productdata = Product::find($id);

        return response()->json($productdata);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Product;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('billing.bill');
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
        $bills = new  Bill();
        $bills->bill_no = $request->input('billno');
        $bills->customer_id = $request->input('billcustomer');
        $bills->date = $request->input('date');
        $bills->product_id = $request->input('billproductname');
        $bills->box = $request->input('box');
        $bills->kg = $request->input('loosekg');
        $bills->net_weight = $request->input('totalweight');
        $bills->per_kg_price = $request->input('perkgprice');
        $bills->actual_price = $request->input('actualprice');
        $bills->discount = $request->input('discount');
        $bills->discount_price = $request->input('discountprice');
        $bills->net_value = $request->input('netvalue');
        $bills->total_box = $request->input('total_box');
        $bills->ice_bar = $request->input('ice_bar');
        $bills->per_ice_bar = $request->input('per_ice_bar');
        $bills->total_ice_bar = $request->input('total_ice_bar');
        $bills->per_packing_price = $request->input('per_packing_price');
        $bills->transport_charge = $request->input('transport_charge');
        $bills->total_icebar = $request->input('total_icebar');
        $bills->less = $request->input('less');
        $bills->packing_charge = $request->input('packing_charge');
        $bills->excess = $request->input('excess');
        $bills->previous_balance = $request->input('previous_balance');
        $bills->overall = $request->input('overall');

        $bills->save();

        return redirect('bill')->with('bills',$bills);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function findproductname(Request $request){
    //     $data = product::select('product_name','id')->where('id',$request->id)->get();

    //     return response()->json($data);
    // }
    public function findproductprice(Request $request){
        $p = product::select('*')->where('id',$request->id)->first();

        return response()->json($p);
    }
}

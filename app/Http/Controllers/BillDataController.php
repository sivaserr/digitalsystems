<?php

namespace App\Http\Controllers;

use App\BillData;
use Illuminate\Http\Request;

class BillDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        


        $billdata = new BillData();

        // $billdata->bill_id=$request->input('billno');
        $billdata->billproductname=$request->input('billproductname');
        $billdata->box=$request->input('box');
        $billdata->loosekg=$request->input('loosekg');
        $billdata->totalweight=$request->input('totalweight');
        $billdata->perkgprices=$request->input('perkgprice');
        $billdata->actualprice=$request->input('actualprice');
        $billdata->discount=$request->input('discount');
        $billdata->discountprice=$request->input('discountprice');
        $billdata->netvalue=$request->input('netvalue');

        $billdata->save();

        return redirect('bill')->with('billdata',$billdata);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BillData  $billData
     * @return \Illuminate\Http\Response
     */
    public function show(BillData $billData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BillData  $billData
     * @return \Illuminate\Http\Response
     */
    public function edit(BillData $billData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BillData  $billData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BillData $billData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BillData  $billData
     * @return \Illuminate\Http\Response
     */
    public function destroy(BillData $billData)
    {
        //
    }

    public function supplierdatas(){
        $billdatas = BillData::all();

        return response()->json($billdatas);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use App\SalesProducts;
class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sales.sales');
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

        $sales = new  Sales();
        $sales->sale_no = $request->input('saleno');
        $sales->customer_id = $request->input('salescustomer');
        $sales->date = date('d-m-Y',strtotime($request->input('date')));
        $sales->total_box = $request->input('totalbox');
        $sales->loose_box = $request->input('totalloosebox');
        $sales->ovarall_box = $request->input('ovarall_box');
        $sales->netvalue = $request->input('totalprice');
        $sales->previous_balance = $request->input('prebalance');
        $sales->ovarall_balance = $request->input('overall');
        


        $salesproducts = $request->input('salesproduct_datas');    
        
            if($sales->save())  // IF BILL SAVED TRUE
            {
                foreach ($salesproducts as $product_data) {
                    $salesproduct = new SalesProducts(); // NEW BILLDATA.
                    $salesproduct->sales_id = $sales->id;
                    $salesproduct->customer_id = $request->input('salescustomer'); 
                    $salesproduct->product_id = $product_data['salesproductname'];
                    $salesproduct->box = $product_data['box'];
                    $salesproduct->weight = $product_data['loosekg'];
                    $salesproduct->net_weight = $product_data['totalweight'];
                    $salesproduct->loose_box = $product_data['loosebox'];
                    $salesproduct->loose_kg = $product_data['salesloosekg'];
                    $salesproduct->total_weight = $product_data['overallweight'];
                    $salesproduct->price = $product_data['saleperkgprice'];
                    $salesproduct->netvalue = $product_data['netvalue'];
                    $salesproduct->save();
                } 
                echo json_encode(['status'=>'success','message'=>'Bill Saved Successfully.']);
            }else{
                echo json_encode(['status'=>'failed','message'=>'Something went wrong Try Later!.']);
            }



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
}

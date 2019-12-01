<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\BillData;
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
        $bills->total_box = $request->input('totalbox');
        $bills->ice_bar = $request->input('icebar');
        $bills->per_ice_bar = $request->input('pericebar');
        $bills->total_ice_bar = $request->input('totalicebar');
        $bills->per_packing_price = $request->input('packing_amount');
        $bills->transport_charge = $request->input('transportcharge');
        $bills->total_icebar = $request->input('finalicebar');
        $bills->less = $request->input('less');
        $bills->packing_charge = $request->input('packingcharge');
        $bills->excess = $request->input('excess');
        $bills->previous_balance = $request->input('prebalance');
        $bills->overall = $request->input('overall');
        $bills->customer_pending = $request->input('overall');


        $allproduct_datas = $request->input('allproduct_datas');    
        
            if($bills->save())  // IF BILL SAVED TRUE
            {
                foreach ($allproduct_datas as $product_data) {
                    $billdata = new BillData(); // NEW BILLDATA.
                    $billdata->bill_id = $bills->id;
                    $billdata->billproductname = $product_data['billproductname']; 
                    $billdata->customer_id = $request->input('billcustomer'); 
                    $billdata->box = $product_data['box'];
                    $billdata->loosekg = $product_data['loosekg'];
                    $billdata->totalweight = $product_data['totalweight'];
                    $billdata->perkgprices = $product_data['perkgprices'];
                    $billdata->actualprice = $product_data['actualprice'];
                    $billdata->discount = $product_data['discount'];
                    $billdata->discountprice = $product_data['discountprice'];
                    $billdata->netvalue = $product_data['netvalue'];
                    $billdata->save();
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

    // public function findproductname(Request $request){
    //     $data = product::select('product_name','id')->where('id',$request->id)->get();

    //     return response()->json($data);
    // }
    public function findproductprice(Request $request){
        $p = product::select('*')->where('id',$request->id)->first();

        return response()->json($p);
    }

    // public function inserprice(Request $request){

    //     Bill::create($request->all());
    //     return json_encode(array("statuscode" =>200));
        
    // }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\BillData;
use App\Product;
use App\Supplier;
use DB;
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
        $bills->supplier_id = $request->input('billsupplier');
        $bills->date = date('d-m-Y',strtotime($request->input('date')));
        $bills->trip_id = $request->input('billtrip');
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
                    $billdata->product_id = $product_data['billproductname']; 
                    $billdata->supplier_id = $request->input('billsupplier'); 
                    $billdata->box = $product_data['box'];
                    $billdata->weight = $product_data['loosekg'];
                    $billdata->net_weight = $product_data['totalweight'];
                    $billdata->per_kg_price = $product_data['perkgprices'];
                    $billdata->actual_price = $product_data['actualprice'];
                    $billdata->discount = $product_data['discount'];
                    $billdata->discount_price = $product_data['discountprice'];
                    $billdata->net_value = $product_data['netvalue'];
                    $billdata->save();
                } 
                echo json_encode(['status'=>'success','message'=>'Bill Saved Successfully.']);
            }else{
                echo json_encode(['status'=>'failed','message'=>'Something went wrong Try Later!.']);
            }
            
        
    }

    public function filtered_list(Request $request){
        // var_dump($request->billcustomer);var_dump($request->data);exit;
        // $data['data'] = [1,2,3,4,5];
        $Bills = Bill::where([ ['date','=',date('d-m-Y',strtotime($request->data))]  ])->get();
        // foreach($Bills as $Bill){
        //     $Bill->BillDatas = BillData::where([
        //         ['bill_id','=',$Bill->id],
        //     ])->get();
        // }
        $data['Bills'] = $Bills;
        // echo '<pre>';print_r($Bills);exit;
        return view('report.dayreport',$data);
    }
   public function billview($id){
       
    $Bills = Bill::find($id);

        
    
    return view('report.reportview')->with('Bills',$Bills);

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
        // $p = product::select('*')->where('id',$request->id)->join('units');
$data = DB::table('products')
       ->join('units', 'units.id', '=', 'products.unit_id')
       ->select('products.price', 'units.unit_name')->where('products.id',$request->id)
       ->get();
        return response()->json($data);
    }

    // public function inserprice(Request $request){

    //     Bill::create($request->all());
    //     return json_encode(array("statuscode" =>200));
        
    // }
    public function pendingamount(Request $request){
        $balance = Bill::select('previous_balance','total_box')->where('supplier_id',$request->id)->get();
        return response()->json($balance);
    }


    public function billdata($id){

        $billdata = Bill::find($id);

        return response()->json($billdata);
    }

}

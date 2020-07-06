<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchases;
use App\PurchasesProducts;
use App\Product;
use App\Supplier;
use DB;
class PurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('purchases.purchase');
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
        

        $bills = new  Purchases();
        $bills->bill_no = $request->input('billno');
        $bills->supplier_id = $request->input('billsupplier');
        $bills->date = $request->input('date');
        $bills->trip_id = $request->input('billtrip');
        $bills->total_no_of_box = $request->input('totalnoofbox');
        $bills->no_of_ice_bar = $request->input('icebar');
        $bills->per_ice_bar = $request->input('pericebar');
        $bills->per_packing_price = $request->input('packing_amount');
        $bills->today_box = $request->input('todaybox');
        $bills->balance_box = $request->input('balancebox');
        $bills->total_box = $request->input('totalbox');
        $bills->grass_amount = $request->input('grass_amount');
        $bills->transport_charge = $request->input('transportcharge');
        $bills->icebar_amount = $request->input('icebaramount');
        $bills->packing_charge = $request->input('packingcharge');
        $bills->excess = $request->input('excess');
        $bills->less = $request->input('less');
        $bills->current_balance = $request->input('currentbillamount');
        $bills->pre_balance = $request->input('previousbalance');
        $bills->overall = $request->input('overall');
        $bills->amount_pending = $request->input('currentbillamount');
        $bills->box_pending = $request->input('todaybox');


        $allproduct_datas = $request->input('allproduct_datas'); 

            if($bills->save())  // IF BILL SAVED TRUE
            {
                foreach ($allproduct_datas as $product_data) {
                    $billdata = new PurchasesProducts(); // NEW BILLDATA.
                    $billdata->bill_id = $bills->id;
                    $billdata->supplier_id = $request->input('billsupplier'); 
                    $billdata->product_id = $product_data['billproductname']; 
                    $billdata->box = $product_data['box'];
                    $billdata->weight = $product_data['kg'];
                    $billdata->loose_box = $product_data['purchaseloosebox'];
                    $billdata->loose_kg = $product_data['purchaseloosekg'];
                    $billdata->net_weight = $product_data['netweight'];
                    $billdata->discount = $product_data['discount'];
                    $billdata->total_weight = $product_data['totalweight'];
                    $billdata->price = $product_data['prices'];
                    // $billdata->actual_price = $product_data['actualprice'];
                    // $billdata->discount_price = $product_data['discountprice'];
                    $billdata->netvalue = $product_data['netvalue'];
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
        $Bills = Purchases::where([ ['date','=',$request->data]  ])->orderBy('id')->get();
        // foreach($Bills as $Bill){
        //     $Bill->BillDatas = BillData::where([
        //         ['bill_id','=',$Bill->id],
        //     ])->get();
        // }
        $data['Bills'] = $Bills;
        // echo '<pre>';print_r($Bills);exit;
        return view('report.dayreport',$data);
    }
    public function filtered_month_and_week(Request $request){
        $from_date = $request->fromdate;
        $to_date = $request->todate;

        $bills = Purchases::whereBetween('date',[$from_date, $to_date])->orderBy('id')->get();

        $data['bills'] = $bills;
        return view('report.month_and_week_report',$data);
    }

   public function billview($id){
       
    $Bills = Purchases::find($id);

        
    
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
        $balance = Purchases::select('amount_pending','box_pending')->where('supplier_id',$request->id)->get();
        return response()->json($balance);
    }


    public function billdata($id){

        $billdata = Purchases::find($id);

        return response()->json($billdata);
    }

}

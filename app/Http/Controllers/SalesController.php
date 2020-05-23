<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use App\SalesProducts;
use App\Customer;
use DB;
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
        $sales->date = $request->input('date');
        $sales->trip_id = $request->input('trip');
        $sales->total_box = $request->input('totalbox');
        $sales->balance_box = $request->input('salesbalancebox');
        // $sales->loose_box = $request->input('salesloosebox');
        $sales->ovarall_box = $request->input('ovarall_box');
        $sales->current_balance = $request->input('totalprice');
        $sales->previous_balance = $request->input('prebalance');
        $sales->overall_balance = $request->input('overall_balance');
        $sales->amount_pending = $request->input('totalprice');
        $sales->box_pending = $request->input('totalbox');



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

    public function filtersalesdaywisereport(Request $request){

        $salesbills = Sales::where([ ['date','=',$request->data] ])->get();

        $data['salesbills'] = $salesbills;
        return view('sales_reports.sales_dayreport',$data);
    }
    public function filtermonthandweekreport(Request $request){
        $from_date = $request->fromdate;
        $to_date = $request->todate;

        $salesbills = Sales::whereBetween('date',[$from_date, $to_date])->get();

        $data['salesbills'] = $salesbills;
        return view('sales_reports.sales_month_and_week_report_view',$data);
    }
    public function salesbillview($id){
       
    $salesbill = Sales::find($id);
    
    return view('sales_reports.sales_report_view')->with('salesbill',$salesbill);

   }



    public function salesfindproductprice(Request $request){
        // $p = product::select('*')->where('id',$request->id)->join('units');
       $data = DB::table('products')
       ->join('units', 'units.id', '=', 'products.unit_id')
       ->select('products.price', 'units.unit_name')->where('products.id',$request->id)
       ->get();
        return response()->json($data);
    }
    public function customerbillpending(Request $request){

        $salesbillamount = Sales::select('overall_balance','total_box')->where('customer_id' ,$request->id)->get();


        return response()->json($salesbillamount);
    }

    public function customerpending($id){

        $salescustomeramount =Customer::find($id);


        return response()->json($salescustomeramount);
    }

}

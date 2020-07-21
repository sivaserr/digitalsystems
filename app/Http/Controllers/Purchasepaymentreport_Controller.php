<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchases;
use App\PurchasesProducts;
use App\Product;
use App\Supplier;
use App\Purchase_paid_details;
use DB;
class Purchasepaymentreport_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['Purchasepayments'] = [];
        return view('purchasepaymentreport.purchasepayment_dayreport',$data);
    }
    public function purchasepaymentmonthandweek()
    {
        $data['purchasepayments'] = [];
        return view('purchasepaymentreport.purchasepayment_monthreport',$data);
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
        //
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
   public function purchasebillview($id){
       
    $purchasepayment = Purchases::find($id);
    
    return view('purchasepaymentreport.purchasepaymentreportview')->with('purchasepayment',$purchasepayment);

   }
    public function filtered_purchasepaymentdayreport(Request $request){
        $set_trip = DB::table('set_trip')->select('set_trip.set_trip')->first();
        $Purchasepayments = DB::table('purchases')
                  ->leftJoin('purchase_cod','purchases.id','=','purchase_cod.bill_id')
                  ->join('paid_details','purchases.id','=','paid_details.bill_id')
                  ->select('paid_details.*','purchases.bill_no','purchase_cod.recived_amount')->where([ ['paid_details.date','=',$request->data] ] )->get();

                  //Purchase_paid_details::where([ ['date','=',$request->data]  ])->orderBy('id')->get();
        $data['Purchasepayments'] = $Purchasepayments;
       
        return view('purchasepaymentreport.purchasepayment_dayreport',$data);
    }

    public function filtered_purchasepaymentmonthreport(Request $request){
        $from_date = $request->fromdate;
        $to_date = $request->todate;

        $purchasepayments = DB::table('purchases')
                  ->leftJoin('purchase_cod','purchases.id','=','purchase_cod.bill_id')
                  ->join('paid_details','purchases.id','=','paid_details.bill_id')
                  ->select('paid_details.*','purchases.bill_no','purchase_cod.recived_amount')->whereBetween('paid_details.date',[$from_date, $to_date] )->get();
        // $purchasepayments = Purchase_paid_details::whereBetween('date',[$from_date, $to_date])->orderBy('id')->get();

        $data['purchasepayments'] = $purchasepayments;
        return view('purchasepaymentreport.purchasepayment_monthreport',$data);
    }


}

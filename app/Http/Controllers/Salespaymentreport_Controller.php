<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use App\SalesProducts;
use App\Product;
use App\Customer;
use App\Sales_Paid_Details;
use DB;

class Salespaymentreport_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['Salespayments'] = [];
        return view('salespaymentreport.salespayment_dayreport',$data);
    }
    public function salespaymentmonthandweek()
    {
         $data['salespayments'] = [];
        return view('salespaymentreport.salespayment_monthreport',$data);

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

   public function salesbillview($id){
       
    $salespayment = Sales::find($id);

    return view('salespaymentreport.salespaymentreportview')->with('salespayment',$salespayment);

   }
   public function filtered_salespaymentdayreport(Request $request){
        
     $Salespayments = DB::table('sales')
                  ->leftJoin('sales_cod','sales.id','=','sales_cod.sale_id')
                  ->join('sales_paid_details','sales.id','=','sales_paid_details.sale_id')
                  ->select('sales_paid_details.*','sales.sale_no','sales_cod.recived_amount')->where([ ['sales_paid_details.date','=',$request->data] ] )->get();

 //var_dump($Salespayments);exit;
    //$Salespayments = Sales_Paid_Details::where([ ['date','=',$request->data]  ])->orderBy('id')->get();

    $data['Salespayments'] = $Salespayments;

    return view('salespaymentreport.salespayment_dayreport',$data);
   
    }

    public function filtered_salespaymentmonthreport(Request $request){
        $from_date = $request->fromdate;
        $to_date = $request->todate;

        
     $salespayments = DB::table('sales')
                  ->leftJoin('sales_cod','sales.id','=','sales_cod.sale_id')
                  ->join('sales_paid_details','sales.id','=','sales_paid_details.sale_id')
                  ->select('sales_paid_details.*','sales.sale_no','sales_cod.recived_amount')->whereBetween('sales_paid_details.date',[$from_date, $to_date] )->get();
//var_dump($Salespayments);exit;
        //$salespayments = Sales_Paid_Details::whereBetween('date',[$from_date, $to_date])->orderBy('id')->get();

        $data['salespayments'] = $salespayments;
        return view('salespaymentreport.salespayment_monthreport',$data);
    }
}

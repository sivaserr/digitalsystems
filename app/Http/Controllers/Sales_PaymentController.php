<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use App\Sales_Paid_Details;
use App\sales_cod;
use DB;

class Sales_PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('payment.sales_payment');
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

          if($request->transfer_type == 2){
             
           $sales_cod  = new sales_cod();
           $sales_cod->sale_id = $request->input('salesbill');
           $sales_cod->date = $request->input('date');
           $sales_cod->customer_id = $request->input('customer');
           $sales_cod->bill_amount = $request->input('currentbillamount');
           $sales_cod->recived_amount = $request->input('amount');
           $sales_cod->return_box = $request->input('returnbox');
           $sales_cod->note = $request->input('note');
           $sales_cod->balance = $request->input('remainingamount');

        if( $sales_cod->save()){
                DB::table('sales')->where('id', $request->input('salesbill'))->limit(1)
                ->update(array('amount_pending' =>$request->input('remainingamount'),'box_pending' =>$request->input('remainbox') ));
         }
           return redirect('/payment-for-sales')->with('sales_cod',$sales_cod);

          }else{
                   $balance = 0;
        $credit = 0;
        $debit = 0;

        $bankbalance = DB::table('bank_details')->select('bank_details.opening_balance','bank_details.id')->where('bank_details.id','=', $request->input('bank') )->get()->first();


            $balance = $bankbalance->opening_balance;

        $paid = DB::table('paid_details')
                ->leftJoin('sales_paid_details','paid_details.bank_id','=','sales_paid_details.bank_id')
                ->select('paid_details.bank_id',DB::raw('SUM(sales_paid_details.credit) as credit'),DB::raw('SUM(paid_details.debit) as debit'))->where('paid_details.bank_id','=',$bankbalance->id)->groupBy('bank_id')->get()->first();
           $credit = $paid->credit;
           $debit =  $paid->debit;
    



        $salespaids = new Sales_Paid_Details();

        $salespaids->sale_id = $request->input('salesbill');
        $salespaids->date = $request->input('date');
        $salespaids->customer_id = $request->input('customer');
        $salespaids->credit = $request->input('amount');
        $salespaids->return_box = $request->input('returnbox');
        $salespaids->note = $request->input('note');
        $salespaids->bank_id = $request->input('bank');
        $salespaids->transfer_type = $request->input('transfer_type');
        $salespaids->ref_no = $request->input('ref_no');
        $salespaids->balance = $balance + $credit - $debit + $request->input('amount');
        if( $salespaids->save()){
                DB::table('sales')->where('id', $request->input('salesbill'))->limit(1)
                ->update(array('amount_pending' => $request->input('remainingamount') ,'box_pending' => $request->input('remainbox') ));
         }


        return redirect('/payment-for-sales')->with('salespaids',$salespaids); 
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


    public function showsalesbills($id)
    {

        $salesbills= [] ;
        $salesbills = Sales::find($id);
        $bill_trip = DB::table('trips')->select('trips.trip_name')->where('id','=',$salesbills->trip_id)->get(); 
        $bill_product = DB::table('sales_products')
                        ->select('sales_products.*','products.product_name', 'customer.name')
                        ->Join('products', 'sales_products.product_id', '=', 'products.id')
                        ->Join('customer', 'sales_products.customer_id', '=', 'customer.id')
                        ->where('sales_id','=',$salesbills->id)
                        ->get();


        
        $salesbills->trip_name = $bill_trip ;
        $salesbills->products =$bill_product ;

        // var_dump($bill_array);exit;
        return response()->json($salesbills);

        // return view('payment.purchase_payment')->with('bills',$bills);
    }
    public function getcustomerbill($id)
    {

        
        $salesbill = DB::table("sales")->where([["customer_id",$id],["amount_pending",'>',0]])->pluck("sale_no","id");
        
        return response()->json($salesbill);

    }
    public function getbilldata(Request $request){
            $supplier_id = $request->supplier;
            $bill_id = $request->bill;

            $billdatas= DB::table('bills')->where('id',$bill_id)->get();
            //return response()->json($billdata);
            // var_dump($billdatas);exit;
           // return response()->json($billdatas);

           return redirect('payment-for-purchase')->with('billdatas',$billdatas);
    }
}

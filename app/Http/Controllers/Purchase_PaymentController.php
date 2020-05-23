<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Bill;
use App\Payment;
use DB;
class Purchase_PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('payment.purchase_payment');
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
        $paids = new Payment();

        $paids->bill_id = $request->input('bill');
        $paids->date = $request->input('date');
        $paids->paid_amount = $request->input('amount');
        $paids->return_box = $request->input('returnbox');
        $paids->note = $request->input('note');

        if( $paids->save()){
                DB::table('bills')->where('id', $request->input('bill'))->limit(1)
                ->update(array('amount_pending' => $request->input('remainingamount') ,'box_pending' => $request->input('remainbox') ));
         }


        return redirect('/payment-for-purchase')->with('paids',$paids);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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



    public function showbills($id)
    {

        $bills= [] ;
        $bills = Bill::find($id);
        $bill_trip = DB::table('trips')->select('trips.trip_name')->where('id','=',$bills->trip_id)->get(); 
        $bill_product = DB::table('bill_data')
                        ->select('bill_data.*','products.product_name', 'suppliers.supplier_name')
                        ->Join('products', 'bill_data.product_id', '=', 'products.id')
                        ->Join('suppliers', 'bill_data.supplier_id', '=', 'suppliers.id')
                        ->where('bill_id','=',$bills->id)
                        ->get();


        
        $bills->trip_name = $bill_trip ;
        $bills->products =$bill_product ;

        // var_dump($bill_array);exit;
        return response()->json($bills);

        // return view('payment.purchase_payment')->with('bills',$bills);
    }



    public function getsuppliersbill($id)
    {

        
        $bills = DB::table("bills")->where([["supplier_id",$id],["amount_pending",'>',0]])->pluck("bill_no","id");
        
        return response()->json($bills);

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

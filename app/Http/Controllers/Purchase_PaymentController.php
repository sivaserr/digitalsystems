<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Purchases;
use App\Purchase_paid_details;
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
           $balance = 0;
           $credit = 0;
           $debit = 0;

        $bankbalance = DB::table('bank_details')->select('bank_details.opening_balance','bank_details.id')->where('bank_details.id','=', $request->input('bank') )->get()->first();


              $balance = $bankbalance->opening_balance;


         $lastpaid = DB::table('paid_details')->select('paid_details.bank_id',DB::raw('SUM(paid_amount) as credit'),DB::raw('SUM(debit) as debit'))->where('paid_details.bank_id','=',$bankbalance->id)->groupBy('bank_id')->get()->first();

           if($lastpaid !== null){
           $credit = $lastpaid->credit;
           $debit =  $lastpaid->debit;
           }else{
                       $credit = 0;
           $debit =  0;
           }

    
    
        $paids = new Purchase_paid_details();
      
        $paids->bill_id = $request->input('bill');
        $paids->date = $request->input('date');
        $paids->supplier_id = $request->input('supplier');
        $paids->customer_id = 0;
        $paids->paid_amount = 0;
        $paids->debit = $request->input('amount');
        $paids->return_box = $request->input('returnbox');
        $paids->note = $request->input('note');
        $paids->bank_id = $request->input('bank');
        $paids->transfer_type = $request->input('transfer_type');
        $paids->ref_no = $request->input('ref_no');
        $paids->balance = $balance + $credit -$debit - $request->input('amount');
        if( $paids->save()){
                DB::table('purchases')->where('id', $request->input('bill'))->limit(1)
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
        $bills = Purchases::find($id);
        $bill_trip = DB::table('trips')->select('trips.trip_name')->where('id','=',$bills->trip_id)->get(); 
        $bill_product = DB::table('purchases_products')
                        ->select('purchases_products.*','products.product_name', 'suppliers.supplier_name')
                        ->Join('products', 'purchases_products.product_id', '=', 'products.id')
                        ->Join('suppliers', 'purchases_products.supplier_id', '=', 'suppliers.id')
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

        
        $bills = DB::table("purchases")->where([["supplier_id",$id],["amount_pending",'>',0]])->pluck("bill_no","id");
        
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

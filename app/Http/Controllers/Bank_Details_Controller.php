<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank_Details;
use App\Purchase_paid_details;
use DB;
class Bank_Details_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bank.bank');
    }
     public function transaction_details()
    {
        $data['tranfers'] = [];
        return view('bank.transaction_details',$data);
    }
    public function debitindex(){

        return view('bank.debit');
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
        $bank = new Bank_Details();
        $bank->ac_holder =$request->input('accountholder');
        $bank->ac_no =$request->input('accountno');
        $bank->bank_name =$request->input('bankname');
        $bank->short_name =$request->input('shortname');
        $bank->branch =$request->input('branch');
        $bank->opening_balance =$request->input('openbalance');

        $bank->save();

        return redirect('bank-details')->with('bank',$bank);
    }

    public function debit(Request $request)
    {

        $bankbalances = DB::table('bank_details')->select('bank_details.opening_balance')->get();
        $paids = DB::table('paid_details')->select(DB::raw('SUM(paid_amount) as credit'),DB::raw('SUM(debit) as debit'))->get();

        $balance = 0;
        $credit = 0;
        $debit = 0;
        $totalbalance=0;

        foreach ($bankbalances as $bankbalance) {
            $balance = $bankbalance->opening_balance;
        }
        foreach ($paids as $paid) {
           $credit = $paid->credit;
           $debit =  $paid->debit;

           $totalbalance = ($balance + $credit) - $debit;
        }

        $bankdebit = new Purchase_paid_details();
        $bankdebit->bill_id =0;
        $bankdebit->date =$request->input('transdate');
        $bankdebit->supplier_id =0;
        $bankdebit->customer_id =0;
        $bankdebit->paid_amount =0;
        $bankdebit->debit =$request->input('debit');
        $bankdebit->return_box =0;
        $bankdebit->note =0;
        $bankdebit->bank_id =$request->input('acholder');
        $bankdebit->transfer_type =0;
        $bankdebit->ref_no =$request->input('refno');
        $bankdebit->balance =$totalbalance - $request->input('debit') ;

        $bankdebit->save();

        return redirect('debit')->with('bankdebit',$bankdebit);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $banks = Bank_Details::all();

        return view('bank.bank')->with('banks',$banks);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bank = Bank_Details::find($id);

        return view('bank.bank_edit')->with('bank',$bank);
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
        $bank = Bank_Details::find($id);
        $bank->bank_name =$request->input('bankname');
        $bank->short_name =$request->input('shortname');

        $bank->save();

        return redirect('bank-details')->with('bank',$bank);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank = Bank_Details::find($id);

        $bank->delete();

       return redirect('bank-details')->with('bank',$bank);

    }
    public function purchase_transfer_details($id){
        $transfer_details = Purchase_paid_details::find($id);

        var_dump($transfer_details);exit;

    }
    public function bank_details($id){

     $bank_detail =Bank_Details::find($id);

     return response()->json($bank_detail);
    }

    public function suppliertransfer(Request $request){

      $bank_id = $request->account_holder;

      // $tranfers =DB::table('paid_details')
      //            ->leftJoin('sales_paid_details','paid_details.bank_id','=','sales_paid_details.bank_id')
      //            ->select('paid_details.bank_id','paid_details.debit','paid_details.supplier_id','paid_details.date','paid_details.ref_no','paid_details.balance','sales_paid_details.customer_id','sales_paid_details.credit')
      //           ->where('paid_details.bank_id','=', $bank_id)->get();


      $tranfers =DB::table('paid_details')
                 ->where([ ['paid_details.bank_id' ,'=' , $bank_id] ])->orderBy('id')->get();
      
      $data['tranfers'] = $tranfers;

      return view('bank.transaction_details',$data);

    }



 }

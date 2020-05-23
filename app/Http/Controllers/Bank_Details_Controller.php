<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank_Details;

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
        $bank->bank_name =$request->input('bankname');
        $bank->short_name =$request->input('shortname');

        $bank->save();

        return redirect('bank-details')->with('bank',$bank);
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
}

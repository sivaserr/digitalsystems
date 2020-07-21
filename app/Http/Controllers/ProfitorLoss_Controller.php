<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProfitorLoss;

class ProfitorLoss_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profitorloss.profit');
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
        $profit = new ProfitorLoss();

        $profit->trip_id = $request->input('trip');
        $profit->purchase_amount = str_replace(',', '',$request->input('purchase'));
        $profit->total_expense = $request->input('expense');
        $profit->sale_amount =str_replace(',', '',$request->input('sales'));
        $profit->profit = $request->input('profit');

        $profit->save();

        return redirect('profit-or-loss')->with('profit',$profit);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $profits = ProfitorLoss::all();

        return view('profitorloss.profit')->with('profits',$profits);
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
}

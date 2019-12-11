<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerRateFixing;

class CustomerRateFixingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customers.customer_rate');
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
        $customerrate = new CustomerRateFixing();

        $customerrate->customer_id =$request->input('customer');
        $customerrate->product_id =$request->input('product');
        $customerrate->fixing_rate =$request->input('rate');

        $customerrate->save();

        return redirect('customer_rate_fixing')->with('customerrate',$customerrate);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $customerratefixings = CustomerRateFixing::all();

        return view('customers.customer_rate')->with('customerratefixings',$customerratefixings);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customerratefixing = CustomerRateFixing::find($id);

        return view('customers.customer_rate_edit')->with('customerratefixing',$customerratefixing);
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
        $customerratefixings = CustomerRateFixing::find($id);

        $customerratefixings->customer_id =$request->input('customer');
        $customerratefixings->product_id =$request->input('product');
        $customerratefixings->fixing_rate =$request->input('rate');

        $customerratefixings->save();

        return redirect('customer_rate_fixing')->with('customerratefixings',$customerratefixings);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customerratefixing = CustomerRateFixing::find($id);
        
        $customerratefixing->delete();

        return redirect('/customer_rate_fixing')->with('customerratefixing' ,$customerratefixing);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Product;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['Bills'] = [];
        return view('report.dayreport',$data);
    }

    public function month_and_week()
    {
         $data['bills'] = [];
        return view('report.month_and_week_report',$data);

    }
    public function customer_dayreport()
    {
         $data['salesbills'] = [];
        return view('sales_reports.sales_dayreport',$data);

    }

    public function customer_month_and_week_repot()
    {
         $data['salesbills'] = [];
        return view('sales_reports.sales_month_and_week_report_view',$data);

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

    public function consolreport()
    {
        return view('report.consolreport');
    }
    // public function consolreportcustomer()
    // {
    //     $consolcustomers = Customer::all();

    //     return view('report.consolreport')->with('consolcustomers',$consolcustomers);
    // }
    public function consolreportproduct()
    {
        $products = Product::all();

        return view('report.consolreport')->with('products',$products);

    }
    
}

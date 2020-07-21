<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\CustomerRateFixing;
use DB;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customers.customer');
    }
    public function customertripreport()
    {
        $data['customertripreports'] = [];
        return view('customers.customer_trip_wise_report',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $customer = new Customer();

        // $customer->name = $request->input('name');
        // $customer->address = $request->input('address');
        // $customer->city = $request->input('city');
        // $customer->email = $request->input('email');
        // $customer->phone = $request->input('phone');

        // $customer->save();

        // return response()->json($customer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new Customer();

        $customer->name = $request->input('name');
        $customer->short_name = $request->input('short_name');
        $customer->city = $request->input('city');
        $customer->phone = $request->input('phone');
        $customer->opening_balance = $request->input('opening_balance');
        $customer->opening_box = $request->input('opening_box');
        $customer->serial_no = $request->input('serial_no');
        $customer->status = $request->input('status');

        $customer->save();

        return redirect('customer')->with('customer',$customer);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $customers =DB::table('customer')->select('customer.*')->orderBy("serial_no")->get();
        
        return view('customers.customer')->with('customers',$customers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customerss = Customer::find($id);

        return view('customers.customer_edit')->with('customerss',$customerss);
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
        $customerss = Customer::find($id);

        $customerss->name = $request->input('name');
        $customerss->short_name = $request->input('short_name');
        $customerss->city = $request->input('city');
        $customerss->phone = $request->input('phone');
        $customerss->opening_balance = $request->input('opening_balance');
        $customerss->opening_box = $request->input('opening_box');
        $customerss->serial_no = $request->input('serial_no');
        $customerss->status = $request->input('status');

        $customerss->save();

        return redirect('/customer')->with('customerss', $customerss);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customers = Customer::find($id);
        $customers->delete();

        return redirect('/customer')->with('customers' ,$customers);
    }


    public function jsondata()
    {
      $customerdata = Customer::all();

      return response()->json($customerdata);
    }

    public function jsondatawidthid($id)
    {
        $customerdata = Customer::Find($id);
        
        return response()->json($customerdata);

    }
    public function jsoncreate(Request $request)
    {
        $customer = new Customer();

        $customer->name = $request->input('name');
        $customer->short_name = $request->input('short_name');
        $customer->city = $request->input('city');
        $customer->phone = $request->input('phone');

        $customer->save();

        return response()->json($customer);
    }
    public function jsonupdate(Request $request, $id)
    {
        $customerss = Customer::find($id);

        $customerss->name = $request->input('name');
        $customerss->short_name = $request->input('short_name');
        $customerss->city = $request->input('city');
        $customerss->phone = $request->input('phone');

        $customerss->save();

        return response()->json($customerss);
    }

    public function jsondelete($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return response()->json($customer);

    }


    public function getcustomerratefixing($id){

        $customer = DB::table('customer_rate_fixings')
                    ->leftJoin('customer_rate_fixing_products','customer_rate_fixings.id','=','customer_rate_fixing_products.customerratefixing_id')
                    ->select('customer_rate_fixings.customer_id','product_id','fixed_rate')
                    ->where('customer_rate_fixings.customer_id','=',$id)->get();

        return response()->json($customer);
    }

    public function customertripwisereport(Request $request){

        $customertripreports = DB::table("sales")->where([["customer_id",$request->customer]])->get();
              
        $data['customertripreports'] = $customertripreports;

        return view('customers.customer_trip_wise_report',$data);

    }



}

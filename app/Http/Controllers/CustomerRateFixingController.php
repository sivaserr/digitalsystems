<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerRateFixing;
use App\CustomerRateFixingProduct;
use DB;
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

           

            $products = $request->input('allproducts'); 
            if($customerrate->save())  // IF BILL SAVED TRUE
            {
                foreach ($products as $product) {
                    $ratefixingproduct = new CustomerRateFixingProduct(); // NEW BILLDATA.
                    $ratefixingproduct->customerratefixing_id = $customerrate->id;
                    $ratefixingproduct->customer_id =$request->input('customer');
                    $ratefixingproduct->product_id =$product['productname'];
                    $ratefixingproduct->fixed_rate =$product['rate'];
                    $ratefixingproduct->save();
                } 
                echo json_encode(['status'=>'success','message'=>'Bill Saved Successfully.']);
            }else{
                echo json_encode(['status'=>'failed','message'=>'Something went wrong Try Later!.']);
            }
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
        $customerratefixing =CustomerRateFixing::find($id);

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
        $customerrate =  CustomerRateFixing::find($id);

        $customerrate->customer_id =$request->input('customer');

           
            $products = $request->input('editallproducts'); 

            if($customerrate->save())  // IF BILL SAVED TRUE
            {
                
                foreach ($products as $key => $product) {
                $ratefixingproduct = CustomerRateFixingProduct::where('customerratefixing_id',$customerrate->id)->get(); // NEW BILLDATA.
                //var_dump($ratefixingproduct[$key]);exit;
                if(isset($ratefixingproduct[$key])){
                     $ratefixingproduct[$key]->customerratefixing_id = $customerrate->id;
                    $ratefixingproduct[$key]->customer_id =$request->input('customer');
                    $ratefixingproduct[$key]->product_id =$product['productname'];
                    $ratefixingproduct[$key]->fixed_rate =$product['rate'];
                    $ratefixingproduct[$key]->save();
                }else{
                    $ratefixingproduct = new CustomerRateFixingProduct(); // NEW BILLDATA.
                    $ratefixingproduct->customerratefixing_id = $customerrate->id;
                    $ratefixingproduct->customer_id =$request->input('customer');
                    $ratefixingproduct->product_id =$product['productname'];
                    $ratefixingproduct->fixed_rate =$product['rate'];
                    $ratefixingproduct->save();

                }
               
                // var_dump($ratefixingproduct);exit;
                // $ratefixingproduct->customerratefixing_id = $customerrate->id;
                // $ratefixingproduct->customer_id =$request->input('customer');
                // $ratefixingproduct->product_id =$product['productname'];
                // $ratefixingproduct->fixed_rate =$product['rate'];
                // $ratefixingproduct->save();
            } 
                echo json_encode(['status'=>'success','message'=>'Bill Saved Successfully.']);
            }else{
                echo json_encode(['status'=>'failed','message'=>'Something went wrong Try Later!.']);
            }
        
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

        return redirect('/rate_fixing')->with('customerratefixing' ,$customerratefixing);
    }
    public function productdestroy($id)
    {
        $customerratefixing = CustomerRateFixingProduct::find($id);
        $customerratefixing->delete();

        return redirect('/rate_fixing')->with('customerratefixing' ,$customerratefixing);
    }
}

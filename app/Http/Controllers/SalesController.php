<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use App\SalesProducts;
use App\Customer;
use DB;
class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sales.sales');
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

        $sales = new  Sales();
        $sales->sale_no = $request->input('saleno');
        $sales->customer_id = $request->input('salescustomer');
        $sales->date= $request->input('date');
        $sales->trip_id = $request->input('trip');
        $sales->total_no_of_box = $request->input('totalnoofbox');
        $sales->today_box = $request->input('todaybox');
        $sales->balance_box = $request->input('balancebox');
        // $sales->loose_box = $request->input('salesloosebox');
        $sales->total_box = $request->input('totalbox');
        $sales->grass_amount = $request->input('grassamount');
        $sales->transport_charge = $request->input('transportcharge');
        $sales->excess = $request->input('excess');
        $sales->less = $request->input('less');
        $sales->current_balance = $request->input('current_balance');
        $sales->pre_balance = $request->input('prebalance');
        $sales->overall = $request->input('overall_balance');
        $sales->amount_pending = $request->input('current_balance');
        $sales->box_pending = $request->input('todaybox');



        $salesproducts = $request->input('salesproduct_datas');    
        
            if($sales->save())  // IF BILL SAVED TRUE
            {
                foreach ($salesproducts as $product_data) {
                    $salesproduct = new SalesProducts(); // NEW BILLDATA.
                    $salesproduct->sales_id = $sales->id;
                    $salesproduct->customer_id = $request->input('salescustomer'); 
                    $salesproduct->product_id = $product_data['salesproductname'];
                    $salesproduct->box = $product_data['box'];
                    $salesproduct->weight = $product_data['weight'];
                    $salesproduct->net_weight = $product_data['netweight'];
                    $salesproduct->loose_box = $product_data['loosebox'];
                    $salesproduct->loose_kg = $product_data['loosekg'];
                    $salesproduct->total_weight = $product_data['totalweight'];
                    $salesproduct->price = $product_data['price'];
                    $salesproduct->netvalue = $product_data['netvalue'];
                    $salesproduct->save();
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

    public function filtersalesdaywisereport(Request $request){

        $salesbills = Sales::where([ ['date','=',$request->data] ])->orderBy('id')->get();

        $data['salesbills'] = $salesbills;

        return view('sales_reports.sales_dayreport',$data);
    }
    public function filtermonthandweekreport(Request $request){
        $from_date = $request->fromdate;
        $to_date = $request->todate;

        $salesbills = Sales::whereBetween('date',[$from_date, $to_date])->orderBy('id')->get();

        $data['salesbills'] = $salesbills;
        return view('sales_reports.sales_month_and_week_report_view',$data);
    }
    public function salesbillview($id){
       
    $salesbill = Sales::find($id);
    
    return view('sales_reports.sales_report_view')->with('salesbill',$salesbill);

   }



    public function salesfindproductprice(Request $request){
        // $p = product::select('*')->where('id',$request->id)->join('units');
       $data = DB::table('products')
       ->join('units', 'units.id', '=', 'products.unit_id')
       ->select('products.price', 'units.unit_name')->where('products.id',$request->id)
       ->get();
        return response()->json($data);
    }
    public function customerbillpending(Request $request){

        $salesbillamount = Sales::select('amount_pending','box_pending')->where('customer_id' ,$request->id)->get();


        return response()->json($salesbillamount);
    }

    public function customerpending($id){

        $salescustomeramount =Customer::find($id);


        return response()->json($salescustomeramount);
    }
    public function customerstockalert($id){

    $set_trip = DB::table('set_trip')->select('set_trip.set_trip')->first();
    $products = DB::table('products')->select('products.*')->get();
    $units = DB::table('units')
             ->join('products','units.id','=','products.unit_id')
             ->select('units.unit_name','products.unit_id','products.id')->groupBy('products.id')
             ->get();


     $purchasestocks = DB::table('purchases')
                     ->join('purchases_products','purchases.id','=','purchases_products.bill_id')
                     ->select('purchases.trip_id','purchases_products.product_id',DB::raw('SUM(box) as purchasetotal_box'),DB::raw('SUM(loose_kg) as purchaseloose_kg'))
                     ->where(['purchases_products.product_id'=> $id,'purchases.trip_id'=>$set_trip->set_trip])
                     ->groupBy('product_id')
                     ->get()[0];


            $salesstocks = DB::table('sales')
                     ->join('sales_products','sales.id','=','sales_products.sales_id')
                     ->select('sales.trip_id','sales_products.product_id', DB::raw('SUM(box) as salestotal_box'), DB::raw('SUM(loose_box) as salesloose_box'),DB::raw('SUM(loose_kg) as salesloose_kg'))
                     ->where(['sales_products.product_id'=> $id,'sales.trip_id'=>$set_trip->set_trip])
                     ->groupBy('product_id')
                     ->get();


                    $stockalert = [];
                    

                  foreach($units as $unit){
                    if($unit->id === $purchasestocks->product_id){
                      $unit_value =(int)$unit->unit_name;

                    if(count($salesstocks) && !empty($salesstocks)){
                        foreach ($salesstocks as $salesstock) {
                        if($purchasestocks->product_id  == $salesstock->product_id ){

                        $purchases = $purchasestocks->purchasetotal_box*$unit_value + $purchasestocks->purchaseloose_kg;

                        $sales = $salesstock->salestotal_box*$unit_value + $salesstock->salesloose_kg;

                        $total =($purchases - $sales)/$unit_value;

                            $stocks = explode(".",$total);

                            $stockbox = $stocks[0];
                            $stockloosekg = 0 ."." .$stocks[1];
                            $finalstockloosekg = round($stockloosekg*$unit_value);

                      
                        $stockalert = ['box' => $stockbox , 'loosekg'=>$finalstockloosekg];  
                        //var_dump($stockalert) ;exit;      
                        }
                        // else{
                        //   $stockalert = ['box' => $purchasestocks->purchasetotal_box , 'loosekg'=> $purchasestocks->purchaseloose_kg];
                        // //                     else{
                        // // $stockbox = $purchasestocks->purchasetotal_box;
                        // // $stockloosekg = $purchasestocks->purchaseloose_kg;

                        // // $stockalert = ['box' => $stockbox , 'loosekg'=>$stockloosekg]; 
                        // // }     
                        // }
                        }
                    }else{
                        $stockalert = ['box' => $purchasestocks->purchasetotal_box , 'loosekg'=>$purchasestocks->purchaseloose_kg]; 
                    }
                    
                    
    }
}



            // $stockalert = $salesstocks;
                
            //    foreach ($salesstocks as $salesstock) {
            //        foreach ($purchasestocks as $purchasestock) {
            //         $stockalert = [];
                    
            //          $stockbox = $purchasestock->purchasetotal_box - $salesstock->salestotal_box;
            //          $stockloosekg = $purchasestock->purchaseloose_kg - $salesstock->salesloose_kg;

            //         $stockalert = ['box' => $stockbox , 'loosekg'=>$stockloosekg];
            //        }
            //    }



 
        return response()->json($stockalert);
    }


}

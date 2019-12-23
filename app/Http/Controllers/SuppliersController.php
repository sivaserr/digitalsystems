<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('suppliers.supplier');
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
        $supplier = new Supplier();

        $supplier->supplier_name =$request->input('supplier_name');
        $supplier->short_name =$request->input('short_name');
        $supplier->city =$request->input('city');
        $supplier->phone =$request->input('phone');
        $supplier->opening_balance =$request->input('opening_balance');
        $supplier->opening_box =$request->input('opening_box');
        $supplier->status = $request->input('status');


        $supplier->save();

        return redirect('supplier')->with('supplier',$supplier);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $suppliers = Supplier::all();

        return view('suppliers.supplier')->with('suppliers',$suppliers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::find($id);

        return view('suppliers.supplier_edit')->with('supplier',$supplier);

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
        $supplier = Supplier::find($id);

        $supplier->supplier_name =$request->input('supplier_name');
        $supplier->short_name =$request->input('short_name');
        $supplier->city =$request->input('city');
        $supplier->phone =$request->input('phone');
        $supplier->opening_balance =$request->input('opening_balance');
        $supplier->opening_box =$request->input('opening_box');
        $supplier->status = $request->input('status');

        

        $supplier->save();

        return redirect('/supplier')->with('supplier', $supplier);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);

        $supplier->delete();

        return redirect('/supplier')->with('supplier' ,$supplier);

    }
    public function pendingamount(Request $request){
        $balance = Bill::select('previous_balance')->where('supplier_id',$request->id)->get();
        return response()->json($balance);
    }

    public function findsupplierdata($id){
        $supplierdata = Supplier::find($id);

        return response()->json($supplierdata);
    }
}

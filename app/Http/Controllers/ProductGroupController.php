<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductGroup;

class ProductGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('productgroup.productgroup');
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
        $product_group = new ProductGroup();

        $product_group->product_group = $request->input('productgroup');

        $product_group->save();

        return redirect('/product_group')->with('product_group',$product_group);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $product_groups = ProductGroup::all();

        return view('productgroup.productgroup')->with('product_groups',$product_groups);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_group = ProductGroup::find($id);

        return view('productgroup.product_group_edit')->with('product_group',$product_group);
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
        $product_group = ProductGroup::find($id);

        $product_group->product_group = $request->input('productgroup');

        $product_group->save();

        return redirect('/product_group')->with('product_group',$product_group);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_group = ProductGroup::find($id);

        $product_group->delete();
        
        return redirect('/product_group')->with('product_group',$product_group);

    }
}

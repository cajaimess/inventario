<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function drop(Request $request,$id,$quantity,$product_id)
    {
               
        $inventory=DB::table('inventory')->select('quantity')->where('id','=',$product_id)->first();
        $sum=(integer)$inventory->quantity;
        $totalQuantity=$sum+$quantity;
        $quantities=DB::table('inventory')
        ->where('product_id',$product_id)
        ->update(['quantity'=>$totalQuantity]);
        $invoice=DB::table('invoice')->where('id',$id)->delete();
        $sale=DB::table('sale')->where('invoice_id',$id)->delete();
        return redirect()->action('VentaController@index');
        
    }
    public function pdf(Request $request,$id,$quantity,$product_id)

    {   
        $user=auth()->user()->name;
        $products=DB::table('product')->where('id',$product_id)->get();
        $invoices=DB::table('invoice')->where('id',$id)->get();
        $sale=DB::table('sale')->select('date_sale')->where('invoice_id','=',$id)->first();
        $pdf = \PDF::loadView('factura.pdf', compact('user','products','invoices','sale'));
        return $pdf->download('Factura.pdf');
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
}

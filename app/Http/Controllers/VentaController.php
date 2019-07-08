<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Product;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = DB::table('product')
        ->join('inventory', 'product.id', '=', 'inventory.product_id')
        ->select('product.id','product.name','inventory.quantity','inventory.lot_number','inventory.expiration_date','inventory.price')
        ->get();
        
         return view('venta.list',compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $products=DB::table('product')->where('id', '=', $id)->get();
        $inventories=DB::table('inventory')->where('product_id','=',$id)->get();
       
        return view('venta.new',compact('products','inventories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {   $user_id=auth()->user()->id;
        $quantity=(integer)$request->input('quantity');
        $price=(integer)$request->input('price');
        $stock=(integer)$request->input('stock');
        $totalPrice=$quantity*$price;
        $numberInvoice=rand(1,90000000);
        $product_id=$request->input('id');
        $product=DB::table('invoice')->insert(array(
            'user_id'=>$user_id,
            'invoice_number'=>$numberInvoice,
            'total_price'=>$totalPrice
        ));
        $this->updateQuantity($product_id,$quantity,$stock);
        return $this->end($product_id,$quantity,$numberInvoice);
        
    }

    public function updateQuantity($id,$quantity,$stock){
        $totalQuantity=$stock-$quantity;
        $quantitys=DB::table('inventory')
        ->where('product_id',$id)
        ->update(['quantity'=>$totalQuantity]);
       
    }
    public function saveSale(Request $request){
        $user=auth()->user()->id;
        $product_id=$request->input('product_id');
        $inventory=DB::table('inventory')->where('product_id','=',$product_id)->first();
        $sale=DB::table('sale')->insert(array(
        'invoice_id' =>$request->input('invoice_id'),
        'inventory_id'=>$inventory->id,
        'product_id'=>$product_id,
        'user_id'=>$user,
        'quantity'=>$request->input('quantity'),
        'date_sale'=>date('Y-m-d')
        

       ));
       return redirect()->action('VentaController@index');

    }
    public function end($product_id,$quantity,$numberInvoice){
        $sale=DB::table('invoice')->where('invoice_number','=', $numberInvoice)->get();
        $product=DB::table('product')->where('id','=', $product_id)->get();
        $date=date('Y-m-d');
        return view('venta.end',compact('sale','product','quantity','date'));
    }

    public function purchases(){
        $user=auth()->user()->id;
        $products = DB::table('product')
        ->select('product.id','product.name','sale.quantity','sale.date_sale','product.description')
        ->join('sale', 'product.id', '=', 'sale.product_id')
        ->where('sale.user_id', '=', $user)
        ->get();
        $sale=DB::table('sale')->where('id',$user)->get();
        $prices=DB::table('invoice')
        ->where('user_id','=', $user)->get();
        
        return view('venta.purchase',compact('products','prices','sale'));
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

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Provider;
use App\Models\Inventory;

class ProveedorController extends Controller
{
    
    public function index()
    {   
        $providers=Provider::all();
        return view('proveedor.list',compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    { 
        
        $providers=DB::table('product')->where('provider_id', '=', $id)->get();
      
        return view('proveedor.new',compact('providers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {   $providerId=$request->input('product');
        $providers=DB::table('inventory')->insert(array(
            'product_id'=>$request->input('product'),
            'quantity'=>$request->input('quantity'),
            'lot_number'=>$request->input('lot_number'),
            'expiration_date'=>$request->input('expiration_date'),
            'price'=>$request->input('price')
        ));
        $this->saveDetalle($providerId);
        return redirect()->action('InventarioController@index');
    }
    public function saveDetalle($providerId){

        $inventory=Inventory::all();
        $last=$inventory->last();
        $detail=DB::table('delivery_detail')->insert(array(
            'provider_id'=>$providerId,
            'inventory_id'=>$last->id,
            'delivery_date'=>date('Y-m-d')
        ));
        
        
    }
    public function createProvider()
    {

        return view('proveedor.create');

    }
    public function newProvider(Request $request){
        $provider=DB::table('provider')->insert(array(
        'name'=>$request->input('name'),
        'phone_number'=>$request->input('phone_number'),
        'city'=>$request->input('city')
        ));

        return redirect()->action('ProveedorController@index');

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
        $provider=DB::table('provider')->where('id',$id)->first();
        return view('proveedor.create',compact('provider'));
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

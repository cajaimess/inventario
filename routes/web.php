<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if( Auth::user() ) //se valida si esta logueado
        if( Auth::user()->rol =='Administrador' ) //se valida el tipo de usuario
            return redirect('/index');
        else
            return redirect('/user');
    else
        return redirect('/login');
});

Auth::routes();

Route::group(['prefix'=>'venta'], function(){

    Route::get('index', 'VentaController@index');
    Route::get('new/{id}', 'VentaController@create');
    Route::get('save', 'VentaController@save');
    Route::get('finalizarCompra', 'VentaController@end');
    Route::get('sale', 'VentaController@saveSale');
    Route::get('purchase', 'VentaController@purchases');
});
Route::get('/index', 'UserController@index');
Route::get('/user', 'UserController@menuUser');
Route::group(['prefix'=>'proveedor'],function(){

Route::get('index', 'ProveedorController@index');
Route::get('crear/{id}', 'ProveedorController@create');
Route::get('editar/{id}', 'ProveedorController@edit');
Route::get('save', 'ProveedorController@save');
Route::get('saveDetail', 'ProveedorController@saveDetalle');
Route::get('newProvider', 'ProveedorController@createProvider');
Route::get('savePovider', 'ProveedorController@newProvider');

    
});
Route::group(['prefix'=>'producto'],function(){

Route::get('index', 'ProductoController@index');
Route::get('crear', 'ProductoController@create');
Route::get('save', 'ProductoController@save');

});
Route::group(['prefix'=>'inventario'],function(){

    Route::get('index','InventarioController@index');
});
Route::group(['prefix'=>'factura'],function(){

    Route::get('detalles','FacturaController@index');
    Route::get('drop/{id}/{quantity}/{product_id}','FacturaController@drop');
    Route::get('pdf/{id}/{quantity}/{product_id}','FacturaController@pdf');
});


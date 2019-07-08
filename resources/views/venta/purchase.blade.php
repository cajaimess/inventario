@extends('menu.user')
@section('content')

<div class="container">
<h1>Mis compras</h1>
    <table class="table table-striped">
    <thead>
    <tr>
    <th>Nombre producto</th>
    <th>Cantidad</th>
    <th>Descripcion</th>
    <th>Fecha Compra</th>
    <th>Precio Total</th>
    <th></th>
    <th></th>
    
    </tr>
    </thead>
    <tbody>
    
    @for($i=0; $i<count($products);$i++)
    <tr>
        <td >{{$products[$i]->name}}</td>
        <td >{{$products[$i]->quantity}}</td>
        <td>{{$products[$i]->description}}</td>
        <td>{{$products[$i]->date_sale}}</td>
        <td>{{$prices[$i]->total_price}}</td>
        <td><a href="{{action('FacturaController@drop',['id'=>$prices[$i]->id,
        'quantity'=>$products[$i]->quantity,'product_id'=>$products[$i]->id])}}" class="btn btn-default" role="button">Cancelar Compra</a></td>
        <td><a href="{{action('FacturaController@pdf',['id'=>$prices[$i]->id,
        'quantity'=>$products[$i]->quantity,'product_id'=>$products[$i]->id])}}" class="btn btn-default" role="button">Factura</a></td>

    </td>

        </tr>
        
    @endfor

    </tbody>
    </table>
    </div>

  
  @endsection
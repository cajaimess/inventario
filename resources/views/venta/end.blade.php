@extends('menu.user')
@section('content')
<h1>Detalle de compra</h1>
<form action="{{action('VentaController@saveSale')}}">
  <div class="form-group">
    <label for="name">Nombre del producto</label>
    <p>{{$product[0]->name}}</p>
  </div>
  <div class="form-group">
    <label for="quantity">Cantidad</label>
    <p>{{$quantity}}</p>
  </div>
  <div class="form-group">
    <label for="description">Descripcion del Producto</label>
    <p>{{$product[0]->description}}</p>
  </div>
  <div class="form-group">
    <label for="total_price">Precio Total</label>
    <p>{{$sale[0]->total_price}}</p>
  </div>
  <div class="form-group">
    <label for="date">Fecha de compra</label>
    <p>{{$date}}</p>
  </div>
    <input type="hidden" name="invoice_id" value="{{$sale[0]->id}}">
    <input type="hidden" name="product_id" value="{{$product[0]->id}}">
    <input type="hidden" name="quantity" value="{{$quantity}}">

  <button type="submit" class="btn btn-success">Finalizar Compra</button>
  
</form>



@endsection
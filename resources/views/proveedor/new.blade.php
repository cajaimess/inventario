@extends('menu.layout')
@section('content')
<link rel="stylesheet" href="/alertjs/css/alertify.min.css" />
<!-- include a theme -->
<link rel="stylesheet" href="/alertjs/css/themes/default.min.css" />
<h1>Ingresar Producto</h1>
<form action="{{action('ProveedorController@save')}}">
<div class="form-group ">
      <label for="products">Producto</label>
      <select id="product" name="product" class="form-control">
      @foreach($providers as $provider)
        <option value="0">Seleccione</option>
        <option value="{{$provider->id}}">{{$provider->name}}</option>
        @endforeach
      </select>
    </div>
  <div class="form-group">
    <label for="lot_number">Numero de lote</label>
    <input type="number" class="form-control" id="lot_number"  name="lot_number">
  </div>
  <div class="form-group">
    <label for="quantity">Cantidad</label>
    <input type="number" class="form-control" id="quantity" name="quantity">
  </div>
  <div class="form-group">
    <label for="expiration_date">Fecha de vencimiento</label>
    <input type="date" class="form-control" id="expiration_date" name="expiration_date">
  </div>
  <div class="form-group">
    <label for="price">Precio</label>
    <input type="number" class="form-control" id="price" name="price">
  </div>

  <button type="submit" class="btn btn-default">Guardar</button>
</form>

@endsection
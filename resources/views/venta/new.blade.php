@extends('menu.user')
@section('content')
<link rel="stylesheet" href="/alertjs/css/alertify.min.css" />
<!-- include a theme -->
<link rel="stylesheet" href="/alertjs/css/themes/default.min.css" />
<form action="{{action('VentaController@save')}}" onsubmit="return validacion()">
  <div class="form-group">
    <label for="name">Nombre</label>
    <p>{{$products[0]->name}}</p>
  </div>
  <div class="form-group">
    <label for="name">Stock</label>
    <p>{{$inventories[0]->quantity}}</p>
  </div>
  <div class="form-group">
    <label for="name">Descripcion del Producto</label>
    <p>{{$products[0]->description}}</p>
  </div>
  <div class="form-group">
    <label for="name">Precio</label>
    <p>{{$products[0]->price}}</p>
  </div>
  <input type="hidden" name="inventory_id" id="name" value="{{$inventories[0]->id}}">
  <input type="hidden" name="price" id="price" value="{{$products[0]->price}}">
  <input type="hidden" name="id" id="id" value="{{$products[0]->id}}">
  <input type="hidden" name="stock" id="stock" value="{{$inventories[0]->quantity}}">
  <div class="form-group">
    <label for="quantity">Cantidad</label>
    <input type="number" class="form-control" id="quantity" name="quantity">
  </div>


  <button type="submit" class="btn btn-success">Comprar</button>
</form>
<script src="/alertjs/alertify.min.js"></script>
<script>
function validacion() {
  let quantity = document.getElementById("quantity").value;
  let stock = document.getElementById("stock").value;
  let q=parseInt(quantity);
  let s=parseInt(stock);
  console.log(quantity)
  if (quantity.length==0 ) {
    alertify.alert('Campo Cantidad vacio')
    return false;
  }
  if (q>s) {
    alertify.alert('Cantidad no puede ser mayor al Stock')
    return false;
  }
 

  return true;
}
</script>

@endsection
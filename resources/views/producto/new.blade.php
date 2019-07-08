@extends('menu.layout')
@section('content')
<link rel="stylesheet" href="/alertjs/css/alertify.min.css" />
<!-- include a theme -->
<link rel="stylesheet" href="/alertjs/css/themes/default.min.css" />
<h1>Ingresar Producto</h1>

<form action="{{action('ProductoController@save')}}" onsubmit="return validacion()">
  <div class="form-group">
  <label for="provider">Seleccione el proveedor</label>
  <select name="provider" id="provider" class="form-control">
          <option value="">Seleccione un Tipo</option>
          @foreach($providers as $provider)
          <option value="{{$provider->id}}">{{$provider->name}}</option>
          @endforeach
        </select>
    <label for="name">Nombre</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="description">Descripcion</label>
    <input type="text" class="form-control" id="description" name="description">
  </div>
  <div class="form-group">
    <label for="price">Precio</label>
    <input type="number" class="form-control" id="price" name="price">
  </div>
  
  <button type="submit" class="btn btn-default">Guardar</button>
</form>
<script src="/alertjs/alertify.min.js"></script>
<script>
function validacion() {
 
 let provider=document.getElementById("provider").value;
 let name = document.getElementById("name").value;
 let description = document.getElementById("description").value;
 let price = document.getElementById("price").value;
 if( provider == null || provider == 0 ) {
 alertify.alert('Seleccione un proveedor')
   return false;
 }
 if (name.length==0|| name== null||/^\s+$/.test(name) ) {
   alertify.alert('Campo Nombre vacio')
   return false;
 }
 if( description == null || description.length == 0 || /^\s+$/.test(description) ) {
 alertify.alert('Campo Descripción Vacio')
   return false;
 }
 if (price.length==0) {
    alertify.alert('Campo Precio vacio')
    return false;
  }

 
 return true;
}
</script>
@endsection
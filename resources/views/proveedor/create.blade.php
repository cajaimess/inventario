@extends('menu.layout')
@section('content')
<link rel="stylesheet" href="/alertjs/css/alertify.min.css" />
<!-- include a theme -->
<link rel="stylesheet" href="/alertjs/css/themes/default.min.css" />


<form action="{{action('ProveedorController@newProvider')}}" onsubmit="return validacion()">
@if(isset($provider) && is_object($provider))
<h1>Editar Proveedor</h1>
@else
<h1>Crear Proveedor</h1>
@endif
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" id="name"  name="name" value="{{$provider->name or ''}}">
  </div>
  <div class="form-group">
    <label for="phone_number">Telefono</label>
    <input type="number" class="form-control" id="phone_number" name="phone_number" value="{{$provider->phone_number or ''}}">
  </div>
  <div class="form-group">
    <label for="city">Ciudad</label>
    <input type="text" class="form-control" id="city" name="city" value="{{$provider->city or ''}}">
  </div>


  <button type="submit" class="btn btn-default">Guardar</button>
</form>
<script src="/alertjs/alertify.min.js"></script>
<script>
function validacion() {
 
  let name=document.getElementById("name").value;
  let phone_number = document.getElementById("phone_number").value;
  let city = document.getElementById("city").value;
  if( name == null || name.length == 0 || /^\s+$/.test(name) ) {
  alertify.alert('Campo Nombre Vacio')
    return false;
  }
  if (phone_number.length==0|| phone_number.length<10||phone_number.length>10 ) {
    alertify.alert('Campo Telefono debe tener 10 numeros')
    return false;
  }
  if( city == null || city.length == 0 || /^\s+$/.test(city) ) {
  alertify.alert('Campo Ciudad Vacio')
    return false;
  }

  
  return true;
}
</script>
@endsection
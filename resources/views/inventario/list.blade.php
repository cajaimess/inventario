@extends('menu.layout')
@section('content')

<div class="container">
    <table class="table table-striped">
    <thead>
    <tr>
    <th>Nombre</th>
    <th>Cantidad</th>
    <th>Numero de lote</th>
    <th>Fecha de Vecimiento</th>
    <th>Precio</th>
    
    </tr>
    </thead>
    <tbody>
    
    @foreach($inventories as $inventory)
    <tr>
        <td >{{$inventory->name}}</td>
        <td>{{$inventory->quantity}}</td>
        <td>{{$inventory->lot_number}}</td>
        <td>{{$inventory->expiration_date}}</td>
        <td>{{$inventory->price}}</td>
        <td><a class="btn btn-info" role="button">Generar Factura</a></td>
        </tr>
    
    @endforeach

    
    </tbody>
    </table>
    </div>
  
    <script type="text/javascript">
</script>
  @endsection
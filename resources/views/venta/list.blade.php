@extends('menu.user')
@section('content')

<div class="container">
    <table class="table table-striped">
    <thead>
    <tr>
    <th>Nombre</th>
    <th>Cantidad</th>
    <th>Precio</th>
    
    </tr>
    </thead>
    <tbody>
    
    @foreach($inventories as $inventory)
    <tr>
        <td >{{$inventory->name}}</td>
        <td >{{$inventory->quantity}}</td>
        <td>{{$inventory->price}}</td>
        <td><a href="{{action('VentaController@create',['id'=>$inventory->id])}}" class="btn btn-default" role="button">Seguir con la compra</a></td>
        </tr>
    
    @endforeach

    
    </tbody>
    </table>
    </div>
  
    <script type="text/javascript">
</script>
  @endsection
  

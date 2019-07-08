@extends('menu.layout')
@section('content')


<div class="container">
    <table class="table table-striped">
    <thead>
    <tr>
    <th>Nombre</th>
    <th>Telefono</th>
    <th>Ciudad</th>
    
    </tr>
    </thead>
    <tbody>
        @foreach($providers as $provider)
        <input type="hidden" value="{{$provider->id}}"name="id" id="id">
        <tr>
        <td>{{$provider->name}}</td>
        <td>{{$provider->phone_number}}</td>
        <td>{{$provider->city}}</td>
        <td><a href="{{action('ProveedorController@create',['id'=>$provider->id])}}" class="btn btn-info" role="button">Crear Entrada</a></td>
        <td><a href="{{action('ProveedorController@edit',['id'=>$provider->id])}}" class="btn btn-success" role="button">Editar</a></td>
        </tr>
        @endforeach
    </tbody>
    </table>
    </div>
  
    <script type="text/javascript">
</script>
  @endsection



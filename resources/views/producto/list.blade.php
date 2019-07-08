@extends('menu.layout')
@section('content')



<div class="container">
    <table class="table table-striped">
    <thead>
    <tr>
    <th>Nombre</th>
    <th>Descripcion</th>
    <th>Precio</th>
    
    </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
        <td>{{$product->name}}</td>
        <td>{{$product->description}}</td>
        <td>{{$product->price}}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
    </div>
  
  @endsection

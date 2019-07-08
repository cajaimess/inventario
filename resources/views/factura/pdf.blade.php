
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<table border="1" style=”width: 300%”>
			<colgroup>
				<col style="width: 20%"/>
				<col style="width: 40%"/>
				<col style="width: 40%"/>
			</colgroup>
			<thead>
				<tr>
					<th rowspan="2">Tienda</th>
					@foreach($invoices as $invoice)
					<th colspan="2">Factura n° {{$invoice->invoice_number}}</th>
					@endforeach
				</tr>
				<tr>
					<th>Cliente</th>
					<th>{{$user}}</th>
				</tr>
			</thead>
		
			<tbody>
				<tr>
					<th>Producto</th>
					@foreach($products as $product)
					<td>{{$product->name}}</td>
					<td>{{$product->description}}</td>
					@endforeach
				</tr>
				<tr>
					<th>Fecha</th>
					<td>{{$sale->date_sale}}</td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
				@foreach($invoices as $invoice)
					<td colspan="3">Precio Total: {{$invoice->total_price}}</td>
					@endforeach
				</tr>
			</tfoot>
		</table>
	</body>
</html>
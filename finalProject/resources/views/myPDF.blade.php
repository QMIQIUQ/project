<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
	<h1>MiniBarServices Receipt</h1>
	<p>Product List</p>
	
	<div >
		<div>

				<table>

					<thead>
						<tr >

						
							<th>Name</th>

							<th>Quantity</th>
							<th>Amount</th>
							<th>Address</th>
						</tr>
					</thead>
					<tbody>
						@php
						$total=0;
						@endphp
						@foreach($myorders as $orders)

						<tr>

							
							<td style="max-width:300px">
								<h6>{{$orders->name}}</h6>
							</td>

							<td>{{$orders->qty}}</td>
							@php
							$subtotal = $orders->qty*$orders->price;

							$total=$total+$subtotal;
							@endphp

							<td>{{$subtotal}}</td>

							<td>{{$orders->Address}}</td>
						</tr>
						

						@endforeach




						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						




							<td>Total:  RM{{ $total }}</td>

						</tr>
		
			</tbody>
			</table>

		</div>
	</div>
</body>

</html>
@extends('layouts.app2')
@section('content')


@guest
@if (Route::has('login'))
<script>
	window.location.href='{{ route('login') }}'
</script>

@endif

@elseif (Auth::user()->admin == 0||Auth::user()->admin == 1||Auth::user()->admin == 2)


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	.btn {
		background-color: #4E4E4E;
		border: none;
		color: white;
		padding: 12px 16px;
		font-size: 16px;
		cursor: pointer;
	}

	/* Darker background on mouse-over */
	.btn:hover {
		background-color: RoyalBlue;
	}
</style>




@if(Session::has('deleteSuccess'))
<div class="alert alert-success" role="alert">
	{{Session::get('deleteSuccess')}}

</div>
@endif
<div class="container">
	<div class="row">
		<table class="table table-hover table-striped">
			<thead>
				<tr class="thead-dark">

					<th>Image</th>
					<th>Name</th>
					<th>CategoryID</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($products as $product)
				<tr>

					<td><img src="{{ asset('images/') }}/{{$product->image}}" alt="" width="50"></td>
					<td style="max-width:300px">
						<h6>{{$product->name}}</h6>
						<em class="text-muted">
							{{$product->description}}
						</em>
					</td>
					<td>{{$product->CategoryID}}</td>
					<td>{{$product->quantity}}</td>
					<td>{{$product->price}}</td>
					
					<td>
						<a href="{{route('editPhone', ['id' => $product->id])}}"><i class="btn fa fa-pencil"></i></a>
						<a href="{{ route('deletePhone', ['id' => $product->id]) }}" class="btn fa fa-trash"
							onclick="return confirm('Sure Want Delete?')"></a>
					</td>
				</tr>
				@endforeach


			</tbody>
		</table>

		<div class="text-center">

			{{ $products->links('pagination::bootstrap-4')}}
		</div>

	</div>
</div>

@endguest
@endsection
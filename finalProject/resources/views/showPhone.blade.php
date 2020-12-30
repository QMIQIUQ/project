@extends('layouts.app2')
@section('content')


@guest
@if (Route::has('login'))
<script>
	window.location.href='{{ route('login') }}'
</script>

@endif

@elseif (Auth::user()->admin == 0||Auth::user()->admin == 1)







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
					<th>ID</th>
					<th>Image</th>
					<th>Name</th>
					<th>Category</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($products as $product)
				<tr>
					<td>{{$product->id}}</td>
					<td><img src="{{ asset('images/') }}/{{$product->image}}" alt="" width="50"></td>
					<td style="max-width:300px">
						<h6>{{$product->name}}</h6>
						<em class="text-muted">
							{{$product->description}}
						</em>
					</td>
					<td>{{$product->categoryID}}</td>
					<td>{{$product->quantity}}</td>
					<td>{{$product->price}}</td>
					<td>
						<a href="{{route('editPhone', ['id' => $product->id])}}" class="btn btn-warning"><i
								class="fas fa-edit">Edit</i></a> |
						<a href="{{ route('deletePhone', ['id' => $product->id]) }}" class="btn btn-danger"
							onclick="return confirm('Sure Want Delete?')">Delete</a>
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
@extends('layouts.app2')
@section('content')

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
		            <th>PhoneID</th>
                    <th>CategoryID</th>
                    <th>Image</th>
		            <th>Name</th>
                    <th>Description</th>
					<th>Quantity</th>
					<th>Price</th>
					<th style="text-align:center">Action</th>
		        </tr>
		    </thead>
		        <tbody>	
                @foreach($products as $product)
		            <tr>
		                <td>{{$product->id}}</td>
                        <td>{{$product->CategoryID}}</td>
                        <td><img src="{{ asset('images/') }}/{{$product->image}}" alt="" width="50" style="max-width:300px"></td>
		                <td>{{$product->name}}</td>
						<td>{{$product->description}}</td>	   
						<td>{{$product->quantity}}</td>
                        <td>{{$product->price}}</td>
		                <td>
		                    <a href="{{route('editPhone', ['id' => $product->id])}}" class="btn btn-warning"><i class="fas fa-edit">Edit</i></a> | 
		                    <a href="{{ route('deletePhone', ['id' => $product->id]) }}"class="btn btn-danger"style="width:100px" >Delete</a>
		                </td>
		            </tr> 
                @endforeach

				
		        </tbody>
		    </table>
		
		<div class="text-center">
			{{ $products->links() }}
        </div>

	</div>
</div>

@endsection('content')
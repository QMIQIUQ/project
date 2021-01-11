@extends('layouts.app2')
@section('content')


@guest
@if (Route::has('login'))
<script>
	window.location.href='{{ route('login') }}'
</script>

@endif

@elseif ((Auth::user()->admin == 2 && Auth::user()->services == 3)|Auth::user()->admin == 1)

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
<div class="container-fluid ">
	<div class="row">
		<table class="table table-hover ">
			<thead>
				<tr class="thead-dark">
					<th>CompanyID</th>
					<th>Name</th>
					<th>Address</th>
					<th>City</th>
					<th>State</th>
					<th>Country</th>
					<th>ZIPcode</th>
					<th>phone Number</th>
					<th>Rating Points</th>
					<th>Number Rating</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($shops as $shops)
				<tr>
					<td>{{$shops->companyID}}</td>
					<td>{{$shops->name}}</td>
					<td>{{$shops->address}}</td>
					<td>{{$shops->city}}</td>
					<td>{{$shops->state}}</td>
					<td>{{$shops->country}}</td>
					<td>{{$shops->ZIPcode}}</td>
					<td>{{$shops->phoneNumber}}</td>
					<td>{{$shops->ratingPoints}}</td>
					<td>{{$shops->ratingUser}}</td>

					<td>
						<a href="{{route('editShop', ['id' => $shops->id])}}"><i class="btn fa fa-pencil"></i></a>
						<a href="{{ route('deleteShop', ['id' => $shops->id]) }}" class="btn fa fa-trash"
							onclick="return confirm('Sure Want Delete?')"></a>
					</td>
				</tr>
				@endforeach


			</tbody>
		</table>

		<div class="text-center">


		</div>

	</div>

</div>

@endguest
@endsection
@extends('layouts.app2')
@section('content')

@guest
@if (Route::has('login'))
<script>
    window.location.href='{{ route('login') }}'
</script>

@endif

@elseif (Auth::user()->admin == 0)




@elseif (Auth::user()->admin == 1)


@if(Session::has('deleteSuccess'))
<div class="alert alert-success" role="alert">
    {{Session::get('deleteSuccess')}}

</div>
@endif
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
<div class="container">
    <div class="row">
        <table class="table table-hover table-striped">
            <tr class="thead-dark">
                <th>Image</th>
                <th>Name</th>
                <th>Action</th>
            </tr>


            @foreach($categories as $category)
            <tr>
                <td><img src="{{ asset('images/') }}/{{$category->image}}" alt="" width="100" style="max-width:300px">
                </td>
                <td>{{$category->name}}</td>
                <td>
                    <a href="{{ route('deleteCategory', ['id' => $category->id]) }}" class="btn fa fa-trash"
                        onclick="return confirm('Sure Want Delete?')"></a>
                </td>
            </tr>
            @endforeach
        </table>



    </div>
</div>




@endguest


@endsection('content')
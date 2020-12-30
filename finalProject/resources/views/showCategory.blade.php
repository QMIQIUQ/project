@extends('layouts.app2')
@section('content')

@guest
@if (Route::has('login'))
<script>window.location.href='{{ route('login') }}'</script>

@endif

@elseif (Auth::user()->admin == 0)




@elseif (Auth::user()->admin == 1)


@if(Session::has('deleteSuccess'))
<div class="alert alert-success" role="alert">
    {{Session::get('deleteSuccess')}}

</div>
@endif

<div class="container">
	    <div class="row">
        <table class="table table-hover table-striped">
        <tr class="thead-dark" >
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Action</th>
        </tr>


        @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td><img src="{{ asset('images/') }}/{{$category->image}}" alt="" width="100" style="max-width:300px"></td>
            <td>{{$category->name}}</td>
            <td><a href="{{ route('deleteCategory', ['id' => $category->id]) }}" class="btn btn-danger">Delete</a></td>
        </tr>
        @endforeach
    </table>
		
		

	</div>
</div>




@endguest


@endsection('content')
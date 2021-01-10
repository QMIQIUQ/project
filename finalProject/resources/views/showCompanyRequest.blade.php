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
            <th>Image</th>
            <th>Company Name(with SSM)</th>
            <th>Company Description</th>
            <th>Company Address</th>
            <th>Company Tel</th>
            <th>Company Owner Name</th>
            <th>User Name</th>
            <th>Action</th>
        </tr>


        @foreach($company as $category)
        @if($category->userServices == 1 )
        <tr>
            <td><img src="{{ asset('images/') }}/{{$category->image}}" alt="" width="100" style="max-width:300px"></td>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            <td>{{$category->address}}</td>
            <td>{{$category->Tel}}</td>
            <td>{{$category->ownerName}}</td>
            <td>{{$category->userName}}</td>
            <td><a href="{{route('approveRegisterCompany',['id'=>$category->userID])}}" class="btn btn-success">Approve</a> <br>
                <a href="" class="btn btn-danger">Reject</a></td>
        </tr>
        @endif
        @endforeach
    </table>
		
		

	</div>
</div>




@endguest


@endsection('content')
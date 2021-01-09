@extends('layouts.app2')
@section('content')

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{Session::get('success')}}

</div>
@endif
                
<div>
                    <form action="{{ route('search.shop') }}" method="Get">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" name="searchShop" id="searchShop" placeholder="Search">
                            <button class="btn btn-success" type="submit">Search</button>
                        </div>
                    </form>
                  
                </div>
                @foreach($shops as $shops)
            <div class="card" style="width: 18rem;">
              <ul class="list-group list-group-flush">
               <li class="list-group-item"> fesf</li>
               <li class="list-group-item">fsefes</li>
               <li class="list-group-item">Vestibulum at eros</li>
              </ul>
            </div>
            @endforeach
            
@endsection
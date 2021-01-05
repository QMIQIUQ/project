@extends('layouts.app2')
@section('content') 

@guest

@if (Route::has('login'))
<script>window.location.href='{{ route('login') }}'</script>
@endif

@elseif (Auth::user()->services == 1||Auth::user()->admin == 1)

<body>

    <div class="container" align="center">
      

      <div class="jumbotron" >
        <h1 class="display-3"><b>Register Status</b></h1>
        <p></p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Pending</a></p>
        <p>Register is processing</p>
        <p>1-3days needed to Process the Request</p> 
    </div>

     
      

    </div> <!-- /container -->
  

</body>
@endguest
@endsection


@extends('layouts.app2')
@section('content') 

@guest

@if (Route::has('login'))
<script>window.location.href='{{ route('login') }}'</script>
@endif

@elseif (Auth::user()->services == 1||Auth::user()->services == 2||Auth::user()->admin == 1)

<body>

    <div class="container" align="center">
      

      <div class="jumbotron" >
        <h1 class="display-3"><b>Register Status</b></h1>
        <p></p>
        @if(Auth::user()->services == 1)
          <p><a class="btn btn-lg btn-success" href="#" role="button">Pending</a></p>
          <p>Register is processing</p>
          <p>1-3days needed to Process the Request</p> 
        @endif
        @if(Auth::user()->services == 2)
        <p><a class="btn btn-lg btn-danger" href="#" role="button">Rejected</a></p>
        <p>Register has been Rejected</p>
        <p>Please resubmint the completed information of your Company and register again</p> 
        @endif
    </div>

     
      

    </div> <!-- /container -->
  

</body>
@endguest
@endsection


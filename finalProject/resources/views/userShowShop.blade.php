
@extends('layouts.app2')
@section('content') 
<link href="{{asset('css/phonedetail.css')}}" rel="stylesheet" type="text/css">
<body id="subpage">
<div id="templatemo_wrapper">
    <div class="cleaner h20"></div>
    <div id="templatemo_main_top"></div>
    <div id="templatemo_main">
    	
       
   
    <div id="content">
       
    <h2>Repair Shop</h2>
             <div>
                <form action="{{ route('search.shop') }}" method="Get">
                 @csrf
                 <div class="input-group">
                    <input type="text" class="form-control" name="searchShop" id="searchShop" placeholder="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                 </div>
                </form>
              </div>
    <form action="" method="post">
        @csrf
          
        <div class="row">
             @foreach($shops as $shops)
            <div class="col-sm-6">
            <div class="card mb-3 text-center " style="width: 16rem;">
                <div class="card-body">
                    <h3 class="card-title"><strong>{{$shops->name}}</strong></h3>
    
                    <h3 class="card-text " >Rating:{{$shops->ratingPoints}}</h3>
                    <p class="card-text  "style="padding: 0px 0px 0 20px" ></p>
         
                    <p class="card-text" ><small class="text-muted">Contact:{{$shops->phoneNumber}}</small></p>
                </div>
                <div class="card-footer bg-transparent ">
                    <small class="text-muted">
                     <strong>Location:</strong>{{$shops->address}},{{$shops->ZIPcode}},{{$shops->city}},{{$shops->state}},{{$shops->country}}.
                    </small>
                </div>
            </div>
            </div>
            @endforeach
        </div>
       
       
    </form>   
     
    </div> <!-- END of content -->
    </div> <!-- END of main -->
    
</body>    
   


@endsection

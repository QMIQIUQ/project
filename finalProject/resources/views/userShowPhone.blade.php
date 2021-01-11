@extends('layouts.app2')
@section('content')

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{Session::get('success')}}
    
</div>
@endif
@if(Session::has('paymentSuccess'))
<div class="alert alert-success" role="alert">

{{Session::get('paymentSuccess')}}

</div>
@endif

<body id="subpage">
    <link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
 


    <div id="templatemo_wrapper">


        <div class="ddsmoothmenu">


        </div> <!-- end of templatemo_menu -->

        <div class="cleaner h20"></div>
        <div id="templatemo_main_top">


        </div>
        <div id="templatemo_main">


            <div id="sidebar">
                <h3>Categories</h3>

                <ul class="sidebar_menu">
                    <li><a href="{{route('userShowPhone')}}">All</a></li>

                    @foreach($categories as $category)
                    <li><a href="{{route('userShowPhone',['category'=>$category->id])}}">{{$category->name}}</a></li>

                    @endforeach
                </ul>

            </div> <!-- END of sidebar -->

            <div id="cont">
               
                <div>
                    <form action="{{ route('search.product') }}" method="Get">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" name="searchProduct" id="searchProduct" placeholder="Search">
                            <button class="btn btn-success" type="submit">Search</button>
                        </div>
                    </form>
                  
                </div>

                @if($categoryName==null)
                <h2></h2>
                @else
                @foreach ($categoryName as $CName)

                <h2>{{$CName->name}}</h2>
                @endforeach
                @endif
                
                <div class="row row-cols-1 row-cols-md-2">        
                @foreach($products as $product) 
               
                <div class="col mb-4 product_gallery">
               
                <div class="card-group">
                   
                <div class="card-body">
                <p class="username">Seller:{{$product->username}}</p>
                     <a href="{{ route('product.detail', ['id' => $product->id]) }}">
                    <img class="" src="{{ asset('images/') }}/{{$product->image}}"  alt="" width="100px"></a>
                   
                    <h3 class="card-text">{{$product->name}}</h3>
                <p class="card-text product_price">RM{{$product->price}}</p>
                </div>
                </div>
              
                </div> 
                @endforeach         
                </div>         
                  



     
                <div class="cleaner h50"></div>

                {{ $products->links('pagination::bootstrap-4')}}
                <div class="cleaner"></div>
            </div> <!-- END of content -->

           
            <div class="cleaner"></div>
           
        </div> <!-- END of main -->
      


      
    </div>

</body>


@endsection
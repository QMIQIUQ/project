
@extends('layouts.app2')
@section('content') 

<body id="subpage">
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
<div id="templatemo_wrapper">
	
    
    <div class="ddsmoothmenu">
       
        
    </div> <!-- end of templatemo_menu -->
    
    <div class="cleaner h20"></div>
    <div id="templatemo_main_top"></div>
    <div id="templatemo_main">
    	
        
        <div id="sidebar">
            <h3>Categories</h3>
          
            <ul class="sidebar_menu" >
            <li><a href="{{route('showPhone')}}">All</a></li>
            
            @foreach($categories as $category)
			    <li><a href="{{route('showPhone',['category'=>$category->id])}}">{{$category->name}}</a></li>
                
            @endforeach
			</ul>
            
        </div> <!-- END of sidebar -->
        
        <div id="cont" >
           
               
          @foreach ($categoryName as $CName)
              <h2>{{$CName->name}}</h2>
          @endforeach
              
          
           
            
            @foreach($products as $product)
        	<div class="col col_14 product_gallery">
          
            	<a href="{{ route('product.detail', ['id' => $product->id]) }}"><img src="{{ asset('images/') }}/{{$product->image}}" alt="" width="50%" ></a>
                <h3 >{{$product->name}}</h3>
                <p class="product_price">RM{{$product->price}}</p>
                <a href="" class="add_to_cart">Add to Cart</a>
            </div>        	
           
            
            @endforeach
            
			<div class="cleaner h50"></div>
            
            
            <div class="cleaner"></div>
        </div> <!-- END of content -->
          
        
       
        <div class="cleaner"></div>
    </div> <!-- END of main -->
    
    
   
</div>

</body>
@endsection
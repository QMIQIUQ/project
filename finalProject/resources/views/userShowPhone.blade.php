
<!DOCTYPE html >
<html >
<head>

<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/styles.css" />



</head>

<body id="subpage">

<div id="templatemo_wrapper">
	
    
    <div id="templatemo_menu" class="ddsmoothmenu">
       
        
    </div> <!-- end of templatemo_menu -->
    
    <div class="cleaner h20"></div>
    <div id="templatemo_main_top"></div>
    <div id="templatemo_main">
    	
        
        <div id="sidebar">
            <h3>Categories</h3>
           
            <ul class="sidebar_menu">
			    <li><a href="#"></a></li>
                <li><a href="#">Aenean pulvinar</a></li>				
                <li><a href="#">Cras bibendum auctor</a></li>
                <li><a href="#">Donec sodales bibendum</a></li>				
            	<li><a href="#">Etiam in tellus</a></li>
                
			</ul>
      
        </div> <!-- END of sidebar -->
        
        <div id="content" >
     
            <h2>Etiam In Tellus</h2>
            @foreach($products as $product)
        	<div class="col col_14 product_gallery">
          
            	<a href="{{ route('product.detail', ['id' => $product->id]) }}"><img src="{{ asset('images/') }}/{{$product->image}}" alt="" width="50%" ></a>
                <h3>{{$product->name}}</h3>
                <p class="product_price">RM{{$product->price}}</p>
                <a href="" class="add_to_cart">Add to Cart</a>
            </div>        	
           
            
            @endforeach
            <a href="#" class="more float_r">View all</a>
			<div class="cleaner h50"></div>
            
            
            <div class="cleaner"></div>
        </div> <!-- END of content -->
        <div class="cleaner"></div>
    </div> <!-- END of main -->
    
    
   
</div>

</body>
</html>
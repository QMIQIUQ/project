
@extends('layouts.app2')
@section('content') 
<link href="{{asset('css/phonedetail.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body id="subpage">
<div id="templatemo_wrapper">
    <div class="cleaner h20"></div>
    <div id="templatemo_main_top"></div>
    <div id="templatemo_main">
    	
       
     @foreach($products as $product) 
        <div id="content">
       
        	<h2>Product Details</h2>
            <div class="col col_13"><img src="{{ asset('images/') }}/{{$product->image}}" width="200px" /></div>
            <form action="{{route('add.to.cart')}}" method="post">
            @csrf
            <div class="col col_13 no_margin_right">
                <table>
                    <tr>
                        <td height="30" width="160">Name:</td>
                        <td>{{$product->name}}</td>
                    </tr>
                    <tr>
                        <td height="30">Availability:</td>
                        <td>{{$product->quantity}}</td>
                    </tr>
                    <tr>
                        <td height="30">Price:</td>
                        <td>RM{{$product->price}}</td>
                    </tr>
                    <tr>
                        <td height="30">Seller:</td>
                        <td>{{$product->username}}</td>
                    </tr>
                    <tr><td height="50">Quantity</td><td><input type="number" name="quantity" id="qty" value="1" min="1" max="{{$product->quantity}}"></td></tr>
                </table>
                <div class="cleaner h20"></div>
                
                <input type="hidden" value = "{{ $count=$product->quantity}}" >
                @if ($count == 0)
                <button type="submit"  class="btn btn-danger"style="height:40px; font-size: 15px;" disabled	>sold out</button>
            @else
                
                    <button type="submit"  class="btn btn-secondary"style="height:40px; font-size: 15px;"	>Add To Cart</button>
               
             @endif
                
			</div>
            <div class="cleaner h30"></div>
            
            <h5><strong>Product Description</strong></h5>
            <p>{{$product->description}}</p>	
            
            <div class="cleaner h50"></div>
            <input type="hidden" name="id" id="id" value="{{$product->id}}">
            <input type="hidden" id="name" name="name" value="{{$product->name}}">
            <input type="hidden" id="amount" name="amount" value="">
            
            <h4><strong>Other Products</strong></h4>
        	@include('random')
            
            <div class="cleaner"></div>
        </form>   
     
    	<form method="post" action="{{route('addRate')}}">
              @csrf
				<!-- Add Comment -->
				<div class="card my-5">
					<h5 class="card-header">Add Rating & Comment</h5>
					<div class="card-body">
                    <div class="rate">
                            <input type="radio" id="star5" name="ratingPoints" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="ratingPoints" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="ratingPoints" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="ratingPoints" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="ratingPoints" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div>
                        
                        <input type="hidden" id="phoneID" name="phoneID" value="{{$phoneID}}" />
						<textarea name="comment" rows="1" class="form-control"></textarea>
						<input type="submit" class="btn btn-dark mt-2" />
					</div>
				</div>
        </form>
      
                <div class="card my-4">
					<h5 class="card-header">Rating & Comments <span class="badge badge-dark"></span></h5>
					<div class="card-body">
						<blockquote class="blockquote">
                            <p class="mb-0"></p>
                          
                            <footer class="blockquote-footer">Admin</footer>
                           
                            
                          
                          </blockquote>
                          <hr/>
								
							
				
					</div>
				</div>
                
                
       
        </div> <!-- END of content -->
        @endforeach
        <div class="cleaner"></div>
    </div> <!-- END of main -->
    
</body>    
@endsection
<style>
    
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
</style>
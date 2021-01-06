
@extends('layouts.app2')
@section('content') 
<link href="{{asset('css/phonedetail.css')}}" rel="stylesheet" type="text/css">
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
       
                
                
       
        </div> <!-- END of content -->
        @endforeach
        <div class="cleaner"></div>
    </div> <!-- END of main -->
    
</body>    
   


@endsection

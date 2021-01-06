
     
          
          <div class="row row-cols-1 row-cols-md-2 ">        
                @foreach($random as $product) 
               
                <div class="col mb-4 product_gallery">
                <div class="card-group">
                <div class="card">
                <div class="card-body">
               
                     <a href="{{ route('product.detail', ['id' => $product->id]) }}">
                    <img  src="{{ asset('images/') }}/{{$product->image}}"  alt="" width="70px"></a>
                   
                    <h3 class="card-text">{{$product->name}}</h3>
                <p class="card-text product_price">RM{{$product->price}}</p>
                </div>
                </div>
                </div>
                </div> 
                @endforeach         
                </div>  

<style>
  .product_gallery h3 {
	font-size: 16px;
	color: rgb(57, 56, 78);
	font-weight: 00;
}
</style>  

          @foreach ($random as $product)
          <div class="col col_14 product_gallery">
            	<a href="{{ route('product.detail', ['id' => $product->id]) }}"><img src="{{ asset('images/') }}/{{$product->image}}" width="70px" /></a>
                <h3>{{$product->name}}</h3>
                <p class="product_price">RM{{$product->price}}</p>
                
            </div>        	
            
          
          @endforeach

<style>
  .product_gallery h3 {
	font-size: 20px;
	color: rgb(57, 56, 78);
	font-weight: 00;
}
</style>  
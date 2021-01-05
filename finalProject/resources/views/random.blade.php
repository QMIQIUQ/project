
          @foreach ($random as $product)
          <div class="col col_14 product_gallery">
            	<a href="productdetail.html"><img src="{{ asset('images/') }}/{{$product->image}}" width="50px" /></a>
                <h3>{{$product->name}}</h3>
                <p class="product_price">RM{{$product->price}}</p>
                <a href="shoppingcart.html" class="add_to_cart">Add to Cart</a>
            </div>        	
            
            <a href="#" class="more float_r">View all</a>
          @endforeach

     
<style>
    .carousel-item {
  height: 100vh;
  min-height: 200px;
  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
section {
  padding-top: 5rem;
  padding-bottom: 5rem;
}

.lnr {
  display: inline-block;
  fill: currentColor;
  width: 1em;
  height: 1em;
  vertical-align: -0.05em;
  stroke-width: 1;
}

.services-icon {
  margin-bottom: 20px;
  font-size: 30px;
}
bgc2, .vLine, .hLine {
    background-color: #0F52BA;
}

.quote-icon {
  font-size: 40px;
  margin-bottom: 20px;
}
.services-icon {
    font-size: 60px;
    margin-left: 2rem;
}
.featured-section .products {
   
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    grid-gap: 60px 30px;
  }
.button-container {
  margin: 80px 0;
}
.button {
  border: 1px solid #212121;
  padding: 12px 40px;
}


a:visited {
  text-decoration: hide;
  color: #212121;
}

.button:hover {
  color: #e9e9e9;
  background: #212121;
}

 
</style>

@extends('layouts.app2')

@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" ><img src="{{ asset('images/banner.png')}} ">
        
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('')">
        
      </div>
      <!-- Slide Three - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">Third Slide</h2>
          <p class="lead">This is a description for the third slide.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
  </div>
  <!-- Page Content -->
  <div class="featured-section">

<div class="container">
    <h1 style="text-align: center">Mobile</h1>

    <div class="products text-center">
      
        @foreach ($products as $product)
            <div class="product">
                <a href="{{ route('product.detail', ['id' => $product->id]) }}"><img src="{{ asset('images/') }}/{{$product->image}}" alt="product" width="150"></a>
                <div class="product-name">{{ $product->name }}</div></a>
                <div class="product-price" >RM{{ $product->price }}</div>
            </div>
        @endforeach

    </div> <!-- end products -->

    <div class="text-center button-container">
        <a href="{{ route('userShowPhone') }}" class="button">View more products</a>
    </div>

</div> <!-- end container -->

</div> <!-- end featured-section -->

 



@endsection('content1')

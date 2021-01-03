@extends('layouts.app2')
@section('content')


<div class="container">
    <div class="row justify-content-center align-items-center ">
        <div class="col-md-6">
            <div class="col-md-12">
                <form class="form-group" method="post" action="{{ route('updatePhone') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- very important if you didn't insert CSRF, it not allow submit the data-->

                    <h2 class="text-center text-info">Edit Product</h2><br>
                    @foreach($products as $product)
                    <input type="hidden" name="id" id="id" class="form-control " value="{{$product->id}}" >
          
                    <div>
                        <label for="name" class="text-info">Product Name</label><br>
                        <input type="text" name="name" id="name" class="form-control " value="{{$product->name}}">
                    </div>
                    <div>
                        <label for="description" class="text-info">Description</label><br>
                        <textarea rows="5" name="description" id="description"
                            class="form-control  @error('description') is-invalid @enderror" name="description" required
                            autocomplete="description" autofocus required>{{$product->description}}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="category" class="text-info">Category</label><br>
                        <select name="category" id="category" class="form-control">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if($product->CategoryID==$category->id)
                                selected
                                @endif
                                >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div >
                        <label for="quantity" class="text-info">Quantity</label><br>
                        <input type="number" name="quantity" id="quantity" class="form-control"
                            value="{{$product->quantity}}">
                    </div>
                    <div >
                        <label for="price" class="text-info">Price</label><br>
                        <input type="number" name="price" id="price" class="form-control" value="{{$product->price}}">
                    </div>
                    <div >
                        <label for="image" class="text-info">Image</label><br>
                        <div>
                            @if ($product->image==null)
                            <img src="{{ asset('images/image.png')}}" onclick="triggerClick()" id="profileDisplay">

                            @else
                            <img src="{{ asset('images/') }}/{{$product->image}}" onclick="triggerClick()"
                                id="profileDisplay">

                            @endif
                            <input name="product-image" type="file" id="image" onchange="displayImage(this)"
                                style="display: none;" class="form-control" name="image" value="">

                        </div>
                    </div>

                    @endforeach
                    <div >
                        <button type="submit" class="btn btn-primary " name="insert" value="Insert">Edit
                            Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
    #profileDisplay {
        display: block;
        width: 50%;
        margin: 10px auto;
        border-radius: 0%;
    }
</style>
<script>
    function triggerClick() {
    document.querySelector('#image').click();
}

function displayImage(e){
    if(e.files[0]){
        var reader = new FileReader();

        reader.onload = function(e) {
            document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}
</script>
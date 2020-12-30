
@extends('layouts.app2')
@section('content') 

@guest
@if (Route::has('login'))
<script>window.location.href='{{ route('login') }}'</script>

@endif
@else

@if(Session::has('storeSuccess'));
<div class="alert alert-success" role="alert">
    {{Session::get('storeSuccess')}}

</div>
@endif
<div class="container">
    <div class="row justify-content-center align-items-center ">
        <div class="col-md-6">
            <div class="col-md-12">
            <form class="subform"  method="post" action="{{ route('addPhone') }}" enctype="multipart/form-data">
                    @csrf <!-- very important if you didn't insert CSRF, it not allow submit the data-->
                    <div class="form-group">
                        <h2 class="text-center text-info">Add New Product</h2><br>

                        <label for="name" class="text-info">Name</label><br>
                        <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Product name..." required >
                       
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                         <label for="description" class="text-info">Product Description</label><br>
                        <textarea rows="4" name="description" id="description" class="form-control  @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus placeholder="Product description..." required >
                        </textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                    <label for="category" class="text-info">Category</label><br>
                    <select name= "category" id= "category" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required autocomplete="category" autofocus placeholder="Search..." required >
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select> 
                    @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="text-info">Quantity</label><br>
                        <input type="number" name="quantity" id="quantity" class="form-control  @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required autocomplete="quantity" autofocus placeholder="Search..." required >
                       
                        @error('quantity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price" class="text-info">Price</label><br>
                        <input type="number" name="price" id="price" class="form-control  @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus placeholder="Search..." required >
                       
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label for="image" class="text-info">Image</label><br>

                        <div>
                            <img src="{{ asset('images/image.png')}}" onclick="triggerClick()" id="profileDisplay">
                            <input name="product-image" type="file" id="image" onchange="displayImage(this)"
                                style="display: none;" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Category Name" required >
                                @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                    </div>
                     <div class="form-group ">

                        <button  type="submit" class="btn btn-primary " name="insert" value="Insert">
                            Add New Product
                        </button>
                        
                    </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endguest

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
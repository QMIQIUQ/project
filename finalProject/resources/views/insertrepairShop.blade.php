
@extends('layouts.app2')
@section('content') 

@guest
@if (Route::has('login'))
<script>window.location.href='{{ route('login') }}'</script>

@endif

@elseif (Auth::user()->admin == 1||Auth::user()->admin == 2)



@if(Session::has('success'));
<div class="alert alert-success" role="alert">
    {{Session::get('success')}}

</div>
@endif
<div class="container">
    <div class="row justify-content-center align-items-center ">
        <div class="col-md-6">
            <div class="col-md-12">
            <form class="subform"  method="post" action="{{ route('addShop') }}" enctype="multipart/form-data">
                    @csrf <!-- very important if you didn't insert CSRF, it not allow submit the data-->
                    
                    <div class="form-group">
                        <h2 class="text-center text-info">Add Shop</h2><br>

                        
                    </div>
                    <div class="form-group">
                    <label for="company" class="text-info">Category</label><br>
                    <select name= "company" id= "company" class="form-control @error('company') is-invalid @enderror" name="company" value="{{ old('company') }}" required autocomplete="company" autofocus placeholder="Search..." required >
                   
                        @foreach($insert_companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select> 
                    @error('company')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                         <label for="description" class="text-info">Product Description</label><br>
                        <textarea rows="4" name="description" id="description" class="form-control  @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus placeholder="Product description..." required ></textarea>
                        @error('description')
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
                            Add Shop
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

@extends('layouts.app2')
@section('content') 

@guest
@if (Route::has('login'))
<script>window.location.href='{{ route('login') }}'</script>

@endif

@elseif (Auth::user()->admin == 0||Auth::user()->admin == 1)



@if(Session::has('success'));
<div class="alert alert-success" role="alert">
    {{Session::get('success')}}

</div>
@endif


<div class="container">
    <div class="row justify-content-center align-items-center ">
        <div class="col-md-6">
            <div class="col-md-12">
            <form class="subform"  method="post" action="{{route('insertRepairServices')}}" enctype="multipart/form-data">
                    @csrf <!-- very important if you didn't insert CSRF, it not allow submit the data-->
                    <div class="form-group">
                        <h2 class="text-center text-info">Register Repair Services</h2><br>

                        <label for="name" class="text-info">Company Name</label><br>
                        <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Company Name..." required >
                       
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    
                    <div class="form-group">
                         <label for="description" class="text-info">Product Description</label><br>
                        <textarea rows="4" name="description" id="description" class="form-control  @error('name') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus placeholder="Company description..." required ></textarea>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address" class="text-info">address</label><br>
                        <input type="text" name="address" id="address" class="form-control  @error('name') is-invalid @enderror" value="{{ old('address') }}" required autocomplete="quantity" autofocus placeholder="address..." required >
                       
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Tel" class="text-info">Company Tel</label><br>
                        <input type="text" name="Tel" id="Tel" class="form-control  @error('name') is-invalid @enderror" value="{{ old('Tel') }}" required autocomplete="Tel" autofocus placeholder="Tel number..." required >
                       
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div> 

                    <div class="form-group">
                        <label for="ownerName" class="text-info">Owner Name</label><br>
                        <input type="text" name="ownerName" id="ownerName" class="form-control  @error('name') is-invalid @enderror" value="{{ old('ownerName') }}" required autocomplete="ownerName" autofocus placeholder="ownerName..." required >
                       
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image" class="text-info">Company Image</label><br>

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
                            Register
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
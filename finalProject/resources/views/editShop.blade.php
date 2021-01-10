@extends('layouts.app2')
@section('content')



@guest
@if (Route::has('login'))
<script>
	window.location.href='{{ route('login') }}'
</script>

@endif

@elseif ((Auth::user()->admin == 2 && Auth::user()->services == 3)|Auth::user()->admin == 1)


<div class="container">
    <div class="row justify-content-center align-items-center ">
        <div class="col-md-6">
            <div class="col-md-12">
                <form class="form-group" method="post" action="{{ route('updateShop') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- very important if you didn't insert CSRF, it not allow submit the data-->

                    <h2 class="text-center text-info">Edit Product</h2><br>
                    @foreach($shops as $shop)
                    <input type="hidden" name="id" id="id" class="form-control " value="{{$shop->id}}" >
                    <div>
                        <label for="name" class="text-info">Name</label><br>
                        <input type="text" name="name" id="name" class="form-control " value="{{$shop->name}}">
                    </div>
                    <div>
                        <label for="address" class="text-info">Address</label><br>
                        <input type="text" name="address" id="address" class="form-control " value="{{$shop->address}}">
                    </div>
                    <div>
                        <label for="city" class="text-info">City</label><br>
                        <input type="text" name="city" id="city" class="form-control " value="{{$shop->city}}">
                    </div>
                    <div>
                        <label for="state" class="text-info">State</label><br>
                        <input type="text" name="state" id="state" class="form-control " value="{{$shop->state}}">
                    </div>
                    <div>
                        <label for="country" class="text-info">Country</label><br>
                        <input type="text" name="country" id="country" class="form-control " value="{{$shop->country}}">
                    </div>
                    <div>
                        <label for="ZIPcode" class="text-info">ZIPcode</label><br>
                        <input type="text" name="ZIPcode" id="ZIPcode" class="form-control " value="{{$shop->ZIPcode}}">
                    </div>
                    <div>
                        <label for="phoneNumber" class="text-info">Phone Number</label><br>
                        <input type="text" name="phoneNumber" id="phoneNumber" class="form-control " value="{{$shop->phoneNumber}}">
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
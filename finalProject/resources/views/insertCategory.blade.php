@extends('layouts.app2')
@section('content')


@if(Session::has('storeSuccess'));
<div class="alert alert-success" role="alert">
    {{Session::get('storeSuccess')}}

</div>
@endif
<div class="container">
    <div class="row justify-content-center align-items-center ">
        <div class="col-md-6">
            <div class="col-md-12">
                <form class="form" method="post" action="{{ route('addCategory') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- very important if you didn't insert CSRF, it not allow submit the data-->
                    <div class="form-group">
                        <h2 class="text-center text-info">Add New Category</h2><br>

                        <label for="name" class="text-info">Name</label><br>
                        <input type="text" name="name" id="name"
                            class="form-control  @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Search..."
                            required>

                        @error('name')
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
                                style="display: none;" class="form-control  @error('image') is-invalid @enderror"
                                 value="{{ old('image') }}" required autocomplete="image" autofocus
                                placeholder="Category image">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group ">

                        <button type="submit" class="btn btn-primary " name="insert" value="Insert">
                            Add New Category
                        </button>

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
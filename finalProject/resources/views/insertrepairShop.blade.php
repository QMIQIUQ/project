
@extends('layouts.app2')
@section('content') 

@guest
@if (Route::has('login'))
<script>window.location.href='{{ route('login') }}'</script>

@endif

@elseif ((Auth::user()->admin == 2 && Auth::user()->services == 3)||Auth::user()->admin == 1)



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
                    <label for="company" class="text-info">Company</label><br>
                    @foreach($companyID as $company)
                    <input type="hidden" id="company" name="company" value="{{ $company->id }} " readonly>{{ $company->name }}
                    @endforeach
                    </div>
                    <div class="form-group">
                         <label for="name" class="text-info">Name</label><br>
                        <textarea rows="3" name="name" id="name" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Shop name..." required ></textarea>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                         <label for="address" class="text-info">Address</label><br>
                        <textarea rows="3" name="address" id="address" class="form-control  @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Address..." required ></textarea>
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="city" class="text-info">City</label><br>
                        <input type="text" name="city" id="city" class="form-control  @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus placeholder="City..." required >
                       
                        @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="state" class="text-info">State</label><br>
                        <input type="text" name="state" id="state" class="form-control  @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required autocomplete="state" autofocus placeholder="state..." required >
                       
                        @error('state')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="country" class="text-info">Country</label><br>
                        <input type="text" name="country" id="country" class="form-control  @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country" autofocus placeholder="country..." required >
                       
                        @error('country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="ZIPcode" class="text-info">ZIPcode</label><br>
                        <input type="text" name="ZIPcode" id="ZIPcode" class="form-control  @error('ZIPcode') is-invalid @enderror" name="ZIPcode" value="{{ old('ZIPcode') }}" required autocomplete="ZIPcode" autofocus placeholder="ZIP Code" required >
                       
                        @error('ZIPcode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber" class="text-info">Phone Number</label><br>
                        <input type="text" name="phoneNumber" id="phoneNumber" class="form-control  @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{ old('phoneNumber') }}" required autocomplete="phoneNumber" autofocus placeholder="phoneNumber..." required >
                       
                        @error('phoneNumber')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
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

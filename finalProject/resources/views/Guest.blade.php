@guest
@if (Route::has('login'))
<script>window.location.href='{{ route('login') }}'</script>

@endif

@elseif (Auth::user()->admin == 0)




@elseif (Auth::user()->admin == 1)






@endguest

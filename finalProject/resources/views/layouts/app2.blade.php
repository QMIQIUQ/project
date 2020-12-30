<!DOCTYPE html>
<html lang="en">

<head>
  <title>MiniBarPhone&Services</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>

  <style>
    .context-dark,
    .bg-gray-dark,
    .bg-primary {
      color: rgba(255, 255, 255, 0.8);
    }

    .footer-classic a,
    .footer-classic a:focus,
    .footer-classic a:active {
      color: #ffffff;
    }

    .nav-list li {
      padding-top: 5px;
      padding-bottom: 5px;
    }

    .nav-list li a:hover:before {
      margin-left: 0;
      opacity: 1;
      visibility: visible;
    }

    ul,
    ol {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .social-inner {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 100%;
      padding: 23px;
      font: 900 13px/1 "Lato", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
      text-transform: uppercase;
      color: rgba(255, 255, 255, 0.5);
    }

    .social-container .col {
      border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .nav-list li a:before {
      content: "\f14f";
      font: 400 21px/1 "Material Design Icons";
      color: #4d6de6;
      display: inline-block;
      vertical-align: baseline;
      margin-left: -28px;
      margin-right: 7px;
      opacity: 0;
      visibility: hidden;
      transition: .22s ease;
    }
  </style>

</head>


<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">



    <a class="navbar-brand" href="{{url('/')}}">
      <img src="{{ asset('images/MiniBar Icon.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
      MiniBarServices
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/userShowPhone')}}">Shop</a>
        </li>

      </ul>
    </div>

    <ul class="nav navbar-nav navbar-right">


      <!-- Authentication Links -->
      @guest
      @if (Route::has('login'))
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">
          <span class="glyphicon glyphicon-log-in"></span> {{ __('Login') }}
        </a>
      </li>
      @endif

      @if (Route::has('register'))
      <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}"> {{ __('Register') }}</a>
      </li>
      @endif


{{-- login --}}
      @else


      <li class="nav-item dropdown">
        

        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false" v-pre>
          @if (Auth::user()->admin == 1)
      Admin 
      @endif
          {{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <a class="dropdown-item" href="{{url('/showmyCart')}}">
            MyCart
          </a>
          @if (Auth::user()->admin == 1)
          <a class="dropdown-item" href="{{url('/insertCategory')}}">
            Add Category
          </a>

          @endif

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </li>
      @endguest


    </ul>
    </div>
    </div>
  </nav>

  <main class="py-4">

    @yield('content')


  </main>




</body>


<footer class="section footer-classic context-dark bg-image bg-dark" style="margin-top: 20%">
  <div class="container">
    <div class="row row-30">
      <div class="col-md-4 col-xl-5">
        <div class="pr-xl-4"><a class="brand" href="index.html"><img class="brand-logo-light"
              src="images/agency/logo-inverse-140x37.png" alt="" width="140" height="37"
              srcset="images/agency/logo-retina-inverse-280x74.png 2x"></a>
          <p>We are an award-winning creative agency, dedicated to the best result in web design, promotion, business
            consulting, and marketing.</p>
          <!-- Rights-->
          <p class="rights"><span>©  </span><span
              class="copyright-year">2018</span><span> </span><span>Waves</span><span>. </span><span>All Rights
              Reserved.</span></p>
        </div>
      </div>
      <div class="col-md-4">
        <h5>Contacts</h5>
        <dl class="contact-list">
          <dt>Address:</dt>
          <dd>798 South Park Avenue, Jaipur, Raj</dd>
        </dl>
        <dl class="contact-list">
          <dt>email:</dt>
          <dd><a href="mailto:#">dkstudioin@gmail.com</a></dd>
        </dl>
        <dl class="contact-list">
          <dt>phones:</dt>
          <dd><a href="tel:#">https://karosearch.com</a> <span>or</span> <a href="tel:#">https://karosearch.com</a>
          </dd>
        </dl>
      </div>
      <div class="col-md-4 col-xl-3">
        <h5>Links</h5>
        <ul class="nav-list">
          <li><a href="#">About</a></li>
          <li><a href="#">Projects</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Contacts</a></li>
          <li><a href="#">Pricing</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="row no-gutters social-container">
    <div class="col"><a class="social-inner" href="#"><span
          class="icon mdi mdi-facebook"></span><span>Facebook</span></a></div>
    <div class="col"><a class="social-inner" href="#"><span
          class="icon mdi mdi-instagram"></span><span>instagram</span></a></div>
    <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-twitter"></span><span>twitter</span></a>
    </div>
    <div class="col"><a class="social-inner" href="#"><span
          class="icon mdi mdi-youtube-play"></span><span>google</span></a></div>
  </div>
</footer>

</html>
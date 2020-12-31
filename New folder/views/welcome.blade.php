<style>
    .carousel-item {
  height: 100vh;
  min-height: 350px;
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
      <div class="carousel-item active" ><img src="{{ asset('images/banner.jpg')}} ">
        
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('https://4.bp.blogspot.com/-InDD3Hm_bhU/XB4_TK3TT7I/AAAAAAAAAJ4/r5tUeCOqq1MTchFh7D7pWdf582A4qYIIwCEwYBhgL/s1600/Businesswoman-working-at-a-computer-1280x720.jpg')">
        
      </div>
      <!-- Slide Three - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('https://1.bp.blogspot.com/-GWl5F8P4t-8/XB4_VV4VE5I/AAAAAAAAAKE/SmHRzas-LpMpDBoLn6otR9AznVsr6L7OgCEwYBhgL/s1600/t1larg.africa.cnn.jpg')">
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
<section class="py-5 text-center">
    <div class="container"> 
      <h2 class="text-center">Luckmoshy`s Services</h2>
      <p class="text-muted mb-5 text-center">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
      <div class="row">
        <div class="col-sm-6 col-lg-4 mb-3">
          <svg class="lnr text-primary services-icon">
            <use xlink:href="#lnr-magic-wand"></use>
          </svg>
          <h6>Ex cupidatat eu</h6>
          <p class="text-muted">Ex cupidatat eu officia consequat incididunt labore occaecat ut veniam labore et cillum id et.</p>
        </div>
        <div class="col-sm-6 col-lg-4 mb-3">
          <svg class="lnr text-primary services-icon">
            <use xlink:href="#lnr-heart"></use>
          </svg>
          <h6>Tempor aute occaecat</h6>
          <p class="text-muted">Tempor aute occaecat pariatur esse aute amet.</p>
        </div>
        <div class="col-sm-6 col-lg-4 mb-3">
          <svg class="lnr text-primary services-icon">
            <use xlink:href="#lnr-rocket"></use>
          </svg>
          <h6>Voluptate ex irure</h6>
          <p class="text-muted">Voluptate ex irure ipsum ipsum ullamco ipsum reprehenderit non ut mollit commodo.</p>
        </div>
        <div class="col-sm-6 col-lg-4 mb-3">
          <svg class="lnr text-primary services-icon">
            <use xlink:href="#lnr-paperclip"></use>
          </svg>
          <h6>Tempor commodo</h6>
          <p class="text-muted">Tempor commodo nostrud ex Lorem occaecat duis occaecat minim.</p>
        </div>
        <div class="col-sm-6 col-lg-4 mb-3">
          <svg class="lnr text-primary services-icon">
            <use xlink:href="#lnr-screen"></use>
          </svg>
          <h6>Et fugiat sint occaecat</h6>
          <p class="text-muted">Et fugiat sint occaecat voluptate incididunt anim nostrud ea cillum cillum consequat.</p>
        </div>
        <div class="col-sm-6 col-lg-4 mb-3">
          <svg class="lnr text-primary services-icon">
            <use xlink:href="#lnr-inbox"></use>
          </svg>
          <h6>Et labore tempor et</h6>
          <p class="text-muted">Et labore tempor et adipisicing dolor.</p>
        </div>
      </div>
    </div>
</section>
<section class="main">
<div class="container mt-4">
  <h1 class="text-center mb-4 p-4 text-secondary">From The Blog</h1>
    <div class="row">

 <div class="card-columns">
<div class="card shadow border-0">
  <img class="card-img-top" src="https://4.bp.blogspot.com/-InDD3Hm_bhU/XB4_TK3TT7I/AAAAAAAAAJ4/r5tUeCOqq1MTchFh7D7pWdf582A4qYIIwCEwYBhgL/s1600/Businesswoman-working-at-a-computer-1280x720.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title that wraps to a new line</h5>
    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
  </div>
</div>
<div class="card shadow border-0  p-3">
  <blockquote class="blockquote mb-0 card-body">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
    <footer class="blockquote-footer">
      <small class="text-muted">
        Someone famous in <cite title="Source Title">Source Title</cite>
      </small>
    </footer>
  </blockquote>
</div>
<div class="card shadow border-0">
  <img class="card-img-top" src="https://4.bp.blogspot.com/-InDD3Hm_bhU/XB4_TK3TT7I/AAAAAAAAAJ4/r5tUeCOqq1MTchFh7D7pWdf582A4qYIIwCEwYBhgL/s1600/Businesswoman-working-at-a-computer-1280x720.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
  </div>
</div>
<div class="card shadow border-0 bg-primary text-white text-center p-3">
  <blockquote class="blockquote mb-0">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
    <footer class="blockquote-footer">
      <small>
        Someone famous in <cite title="Source Title">Source Title</cite>
      </small>
    </footer>
  </blockquote>
</div>
<div class="card shadow border-0 text-center">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">This card has a regular title and short paragraphy of text below it.</p>
    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
  </div>
</div>
<div class="card shadow border-0">
  <img class="card-img" src="https://4.bp.blogspot.com/-InDD3Hm_bhU/XB4_TK3TT7I/AAAAAAAAAJ4/r5tUeCOqq1MTchFh7D7pWdf582A4qYIIwCEwYBhgL/s1600/Businesswoman-working-at-a-computer-1280x720.jpg" alt="Card image">
</div>
<div class="card shadow border-0 p-3 text-right">
  <blockquote class="blockquote mb-0">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
    <footer class="blockquote-footer">
      <small class="text-muted">
        Someone famous in <cite title="Source Title">Source Title</cite>
      </small>
    </footer>
  </blockquote>
</div>
<div class="card shadow border-0">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">This is another card with title and supporting text below. This card has some additional content to make it slightly taller overall.</p>
    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
  </div>
</div>
</div>
</div>
 </div>
 </section>
 
 <!-- Header -->
<header class="bg-primary text-center py-5 mb-4">
<div class="container">
  <h1 class="font-weight-light text-white">Meet the Team</h1>
</div>
</header>

<!-- Page Content -->
<div class="container">
<div class="row">
  <!-- Team Member 1 -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-0 shadow">
      <img src="https://source.unsplash.com/TMgQMXoglsM/500x350" class="card-img-top" alt="...">
      <div class="card-body text-center">
        <h5 class="card-title mb-0">Team Member</h5>
        <div class="card-text text-black-50">Web Developer</div>
      </div>
    </div>
  </div>
  <!-- Team Member 2 -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-0 shadow">
      <img src="https://source.unsplash.com/9UVmlIb0wJU/500x350" class="card-img-top" alt="...">
      <div class="card-body text-center">
        <h5 class="card-title mb-0">Team Member</h5>
        <div class="card-text text-black-50">Web Developer</div>
      </div>
    </div>
  </div>
  <!-- Team Member 3 -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-0 shadow">
      <img src="https://source.unsplash.com/sNut2MqSmds/500x350" class="card-img-top" alt="...">
      <div class="card-body text-center">
        <h5 class="card-title mb-0">Team Member</h5>
        <div class="card-text text-black-50">Web Developer</div>
      </div>
    </div>
  </div>
  <!-- Team Member 4 -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-0 shadow">
      <img src="https://source.unsplash.com/ZI6p3i9SbVU/500x350" class="card-img-top" alt="...">
      <div class="card-body text-center">
        <h5 class="card-title mb-0">Team Member</h5>
        <div class="card-text text-black-50">Web Developer</div>
      </div>
    </div>
  </div>
</div>
<!-- /.row -->

</div>

<div class="container">
  <div class="row">
       <div class="col-md-8">
      <blockquote class="blockquote text-center mb-0">
        <svg class="lnr text-muted quote-icon pull-left">
          <use xlink:href="#lnr-heart">                                       
        </use></svg>
        <p class="mb-0">Keep in touch with me for more Theme  right here!</p>
        <footer class="blockquote-footer">Luckmoshy Designing
          <cite title="Source Title">Webublog @</cite>
        </footer>
      </blockquote>
      </div>
      <div class="col-md-4">
      <a class="flot-right btn btn-white border-0 rounded shadow post-pager-link p-0 next ml-4" href="">
             <span class="d-flex h-100">
            <span class="p-3 d-flex flex-column justify-content-center w-100">
          <div class="indicator mb-1 text-uppercase text-muted">webublog<i class="fa fa-bars ml-2"></i></div>
               <p class="f-13">See next awesome themes</p>
                   </span>
             <span class="bg-primary p-2 d-flex align-items-center text-white">
             <i class="fa fa-arrow-circle-right"></i>
        </span>
       </span>
</a></div>
      </div>
      
    </div>

@endsection('content1')
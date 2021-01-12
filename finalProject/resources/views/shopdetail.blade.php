@extends('layouts.app2')
@section('content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body id="subpage">
    <div id="templatemo_wrapper">
        <div class="cleaner h20"></div>
        <div id="templatemo_main_top"></div>
        <div id="templatemo_main">


            @foreach($shops as $shops)
            <div id="content">

                <h2>Shop Details</h2>
                <div class="col col_13">

                    <table>
                        <tr>
                            <td height="30" width="160">Shop Name:</td>
                            <td>{{$shops->name}}</td>
                        </tr>

                        <tr>
                            <td>Contact No:</td>
                            <td><i class="fa fa-whatsapp" style="color:green"></i><a
                                    href=" https://wa.me/+60{{$shops->phoneNumber}}" data-action="share/whatsapp/share"
                                    onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes');return false;"
                                    target="_blank" title="Share on whatsapp">
                                    {{$shops->phoneNumber}}
                                </a></td>


                        </tr>
                    </table>
                </div>

                <div class="col col_13 no_margin_right">
                    <table>

                        <tr>
                            <td>
                                @if($shops->ratingUser != 0)
                                <h3>Rating: ★ {{number_format($shops->ratingPoints/$shops->ratingUser,1)}}<h6> {{$shops->ratingUser}} users ratted </h6></h3>
                               
                                @else

                                <h3>No Ratting Yet</h3>
                                @endif

                                @guest
                                @if (Route::has('login'))


                                <div>
                                    <div class="rate">
                                        <input type="radio" id="star5" name="ratingPoints" value="5" disabled />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="ratingPoints" value="4" disabled />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="ratingPoints" value="3" disabled />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="ratingPoints" value="2" disabled />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="ratingPoints" value="1" disabled />
                                        <label for="star1" title="text">1 star</label>
                                    </div>
                                    <div>
                                        <a href="{{ route('login') }}"> <input type="submit" class="btn btn-dark "
                                                value="Login to Rate" />
                                        </a>
                                    </div>


                                </div>


                                @endif
                                @else
                                <form method="post" action="{{route('addShopRate')}}">
                                    @csrf
                                    <!-- Add Comment -->


                                    <div>
                                        <div class="rate">
                                            <input type="radio" id="star5" name="ratingPoint" value="5"/>
                                            <label for="star5" title="text">5 stars</label>
                                            <input type="radio" id="star4" name="ratingPoint" value="4" />
                                            <label for="star4" title="text">4 stars</label>
                                            <input type="radio" id="star3" name="ratingPoint" value="3"/>
                                            <label for="star3" title="text">3 stars</label>
                                            <input type="radio" id="star2" name="ratingPoint" value="2" />
                                            <label for="star2" title="text">2 stars</label>
                                            <input type="radio" id="star1" name="ratingPoint" value="1"/>
                                            <label for="star1" title="text">1 star</label>
                                        </div>

                                        <input type="hidden" name="ratingP" id="ratingP" value="{{$shops->ratingPoints}}">
                                        @php
                                         $ratingU = $shops->ratingUser + 1
                                        @endphp
                                        <input type="hidden" name="ratingU" id="ratingU" value="{{$ratingU}}">
                                        <input type="hidden" name="id" id="id" value="{{$shops->id}}">
                                        <input type="submit" class="btn btn-dark mt-2" />
                                    </div>

                                </form>
                                @endguest
                            </td>

                        </tr>

                    </table>
                </div>
                <div class="cleaner h20"></div>




                <div class="cleaner h30"></div>

                <h5><strong>Shop Address</strong></h5>
                <p>{{$shops->address}},{{$shops->ZIPcode}},{{$shops->city}},{{$shops->state}},{{$shops->country}}.</p>

                <div class="cleaner h50"></div>



                <div class="cleaner"></div>


            </div>







        </div> <!-- END of content -->
        @endforeach
        <div class="cleaner"></div>
    </div> <!-- END of main -->

</body>
@endsection
<style>
    .rate {

        height: 46px;
        padding: 0 10px;
    }

    .rate:not(:checked)>input {
        position: absolute;
        top: -9999px;

    }

    .rate:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: #ffc700;
    }

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: #c59b08;
    }
    
body {
	margin: 0;
	padding: 0;
	color: #666;
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 20px;
	line-height: 1.4em; 
	background-color: #f7f7f7;
	background-repeat: repeat-x;
	background-position: top;
}



a, a:link, a:visited { color: #666; font-weight: normal; text-decoration: none }
a:hover { text-decoration: underline; }

a.more { display: inline-block; padding: 3px 10px; font-size: 12px; font-weight: bold; color: #21bdd0; background: #e9e9e9 }
a.more:hover { background: #333; text-decoration: none }

p { margin: 0 0 10px 0; padding: 0; }
img { border: none; }
blockquote { border: 1px solid #ccc; border-left: 5px solid #000; padding: 19px; margin: 20px 0 0 0}
cite a, cite a:link, cite a:visited  { font-size: 12px; text-decoration: none; font-style: normal }
cite span { font-weight: 400; color: #333; }




h1, h2, h3, h4, h5, h6 { color: #333; font-weight: normal; }
h1 { font-size: 30px; margin: 0 0 30px; padding: 5px 0 }
h2 { font-size: 26px; margin: 0 0 25px; padding: 5px 0 }
h3 { font-size: 20px; margin: 0 0 20px; padding: 0; }
h4 { font-size: 16px; margin: 0 0 15px; padding: 0; }
h5 { font-size: 14px; margin: 0 0 10px; padding: 0;  }
h6 { font-size: 12px; margin: 0 0 5px; padding: 0; }

.cleaner { clear: both }
.h10 { height: 10px }
.h20 { height: 20px }
.h30 { height: 30px }
.h40 { height: 40px }
.h50 { height: 50px }

.float_l { float: left }
.float_r { float: right }

#templatemo_wrapper {
	width: 960px;
	padding: 0 10px;
	margin: 0 auto;
}
#templatemo_main_top {
	width: 960px;
	height: 12px;
	background: url(../images/templatemo_main_top.png) no-repeat top
}

#templatemo_main {
	width: 960px;
	background: url(../images/templatemo_main_middle.png) repeat-y
}


#content {
	width: 950px;
	padding: 20px 30px 20px;
}


#content h2 { font-size: 24px; padding-bottom: 10px; border-bottom: 2px solid #ccc; margin-bottom: 20px;}

table td { border-bottom: 2px solid #ccc; }





.product_gallery {
	margin-bottom: 60px;
	text-align: center
}

.product_gallery img {
	margin-bottom: 5px;
}

.product_gallery h3 {
	font-size: 12px;
	color: #999;
	font-weight: 700;
}

.product_gallery .product_price {
	color: #000;
	font-weight: 700
}
.add_to_cart {
	display: inline-block;
	padding-right: 30px;
	background: url(../images/cart.png) no-repeat right center	
}


.col { float: left; margin-right: 20px }
.col_13 { width: 400px }
.col_14 { width: 220px }



.no_margin_right { margin-right: 0}
</style>
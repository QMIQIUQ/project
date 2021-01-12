@extends('layouts.app2')
@section('content')

<link href="{{asset('css/phonedetail.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body id="subpage">
    <div id="templatemo_wrapper">
        <div class="cleaner h20"></div>
        <div id="templatemo_main_top"></div>
        <div id="templatemo_main">


            @foreach($shops as $shops)
            <div id="content">

                <h2>Shop Details</h2>
                <div class="col col_13"></div>
                <form action="" method="post">
                    @csrf
                    <div class="col col_13 no_margin_right">
                        <table>
                            <tr>
                                <td height="30" width="160">Shop Name:</td>
                                <td>{{$shops->name}}</td>
                            </tr>

                            <tr>
                                <td height="30">Price:</td>
                                <td><a href=" https://wa.me/+60{{$shops->phoneNumber}}"
                                        data-action="share/whatsapp/share"
                                        onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes');return false;"
                                        target="_blank" title="Share on whatsapp">
                                        Contact:{{$shops->phoneNumber}}
                                    </a></td>
                            </tr>


                        </table>
                        <div class="cleaner h20"></div>





                    </div>
                    <div class="cleaner h30"></div>

                    <h5><strong>Shop Address</strong></h5>
                    <p>{{$shops->address}},{{$shops->ZIPcode}},{{$shops->city}},{{$shops->state}},{{$shops->country}}.</p>

                    <div class="cleaner h50"></div>
                    <input type="hidden" name="id" id="id" value="{{$shops->id}}">
                    
                   
                    <div class="cleaner"></div>
                </form>

                @guest
                @if (Route::has('login'))
                <div class="card my-5">
                    <h5 class="card-header">Add Rating & Comment</h5>
                    <div class="card-body">
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

                        <textarea name="comment" rows="1" class="form-control" disabled></textarea>
                        <a href="{{ route('login') }}"> <input type="submit" class="btn btn-dark mt-2"
                                value="Login to submint" /></a>

                    </div>
                </div>

                @endif
                @else
                <form method="post" action="{{route('addRate')}}">
                    @csrf
                    <!-- Add Comment -->
                    <div class="card my-5">
                        <h5 class="card-header">Add Rating & Comment</h5>
                        <div class="card-body">
                            <div class="rate">
                                <input type="radio" id="star5" name="ratingPoints" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="ratingPoints" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="ratingPoints" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="ratingPoints" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="ratingPoints" value="1" />
                                <label for="star1" title="text">1 star</label>
                            </div>

                            <input type="hidden" id="phoneID" name="phoneID" value="{{$phoneID}}" />
                            <textarea name="comment" rows="1" class="form-control"></textarea>
                            <input type="submit" class="btn btn-dark mt-2" />
                        </div>
                    </div>
                </form>
                @endguest



                <div class="card my-4">
                    <h5 class="card-header">Rating & Comments <span class="badge badge-dark"></span></h5>
                    <div class="card-body">


                        @php
                        $total=0;
                        $calpoint=0;
                        $numComment=0;
                        @endphp
                        @foreach($rating as $item)
                        @php
                        $calpoint= $calpoint+($item->ratingPoints);
                        $numComment=$numComment+1;
                        @endphp

                        @endforeach



                        @if($numComment != 0)
                        @php
                        $total= number_format($calpoint/$numComment,1);
                        @endphp

                        Total user Ratting {{$total}} ★
                        @endif


                        @foreach($rating as $ratings)
                        <blockquote class="blockquote">
                            <p class="mb-0">{{$ratings->comment}}</p>
                            <footer class="blockquote-footer">by:{{$ratings->username}} | ★:{{$ratings->ratingPoints}}
                            </footer>
                        </blockquote>
                        @endforeach
                    </div>

                </div>



            </div> <!-- END of content -->
            @endforeach
            <div class="cleaner"></div>
        </div> <!-- END of main -->

</body>
@endsection
<style>
    .rate {
        float: left;
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
</style>
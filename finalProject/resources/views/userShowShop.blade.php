@extends('layouts.app2')
@section('content')
<link href="{{asset('css/phonedetail.css')}}" rel="stylesheet" type="text/css">

<body id="subpage">
    <div id="templatemo_wrapper">
        <div class="cleaner h20"></div>
        <div id="templatemo_main_top"></div>
        <div id="templatemo_main">



            <div id="content">

                <h2>Repair Shop</h2>
                <div>
                    <form action="{{ route('search.shop') }}" method="Get">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" name="searchShop" id="searchShop"
                                placeholder="Search">
                            <button class="btn btn-success" type="submit">Search</button>
                        </div>
                    </form>
                </div>
               
                <form action="" method="post">
                
                    @csrf
                    <div class="row">
                        @foreach($shops as $shop)
                        <div class="col-sm-6">
                            <a href="{{ route('shop.detail', ['id' => $shop->id]) }}">
                            <div class="card mb-6 text-center " >
                                <div class="card-body" hre="" >
                                    <h3 class="card-title"><strong>{{$shop->name}}</strong></h3>
                                    @if($shop->ratingUser != 0)
                                    <h3 class="card-text  " >Rating: ★ {{number_format($shop->ratingPoints/$shop->ratingUser,1)}}<h6> {{$shop->ratingUser}} users ratted </h6></h3>
                                   
                                    @else
    
                                    <h3 class="card-text  " >No Ratting Yet</h3>
                                    @endif
                                   
                                    <p class="card-text  " style="padding: 0px 0px 0 20px"></p>
                                   
                                    <a href=" https://wa.me/+60{{$shop->phoneNumber}}"
                                        data-action="share/whatsapp/share"
                                        onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes');return false;"
                                        target="_blank" title="Share on whatsapp">
                                        Contact:{{$shop->phoneNumber}}
                                    </a>
                                </div>
                                <div class="card-footer bg-transparent ">
                                    <small class="text-muted">
                                        <strong>Location:</strong>{{$shop->address}},{{$shop->ZIPcode}},{{$shop->city}},{{$shop->state}},{{$shop->country}}.
                                    </small>
                                </div>
                            </div>
                            </a>
                        </div>
                       
                        @endforeach
                       
                    </div>
                  
                </form>
                {{$shops->links('pagination::bootstrap-4')}}
            </div> <!-- END of content -->
        </div> <!-- END of main -->

</body>



@endsection
@extends('layouts.app2')
@section('content')

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{Session::get('success')}}

</div>
@endif

<body id="subpage">
    <link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
 


    <div id="templatemo_wrapper">


        <div class="ddsmoothmenu">


        </div> <!-- end of templatemo_menu -->

        <div class="cleaner h20"></div>
        <div id="templatemo_main_top">


        </div>
        <div id="templatemo_main">


            <div id="sidebar">
                <h3>Categories</h3>

                <ul class="sidebar_menu">
                    <li><a href="{{route('userShowPhone')}}">All</a></li>

                    @foreach($categories as $category)
                    <li><a href="{{route('userShowPhone',['category'=>$category->id])}}">{{$category->name}}</a></li>

                    @endforeach
                </ul>

            </div> <!-- END of sidebar -->

            <div id="cont">
                {{-- search --}}
                <div>
                    <form action="{{ route('search.product') }}" method="post">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" name="searchProduct" id="searchProduct" placeholder="Search">
                            <button class="btn btn-success" type="submit">Search</button>
                        </div>
                    </form>
                    {{-- end Search --}}
                    <script type="text/javascript">
                        var path = "{{ route('autocomplete') }}";
                        $('input.typeahead').typeahead({
                            source:  function (query, process) {
                            return $.get(path, { query: query }, function (data) {
                             return process(data);
                                });
                            }
                        });
                    </script>
                </div>

                @if($categoryName==null)
                <h2></h2>
                @else
                @foreach ($categoryName as $CName)

                <h2>{{$CName->name}}</h2>
                @endforeach
                @endif








                @foreach($products as $product)
                <div class="col col_14 product_gallery">

                    <a href="{{ route('product.detail', ['id' => $product->id]) }}"><img
                            src="{{ asset('images/') }}/{{$product->image}}" alt="" width="50%"></a>
                    <h3>{{$product->name}}</h3>
                    <p class="product_price">RM{{$product->price}}</p>
                    <a href="{{ route('product.detail', ['id' => $product->id]) }}" class="add_to_cart">Add to Cart</a>
                </div>


                @endforeach

                <div class="cleaner h50"></div>


                <div class="cleaner"></div>
            </div> <!-- END of content -->



            <div class="cleaner"></div>
        </div> <!-- END of main -->



    </div>

</body>


@endsection
@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{asset('css/multi.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.css"/>
@endsection
@section('content')
    <div class="row">
        <div class="col-2">
            @include('layouts.panel')
        </div>
        <div id="panel"  class="col-10 pt-5">
            <div class="container">
                <div class="row d-flex justify-content-center">



                    <div id="imagesProduct" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                                <li data-target="#imagesProduct" data-slide-to="0" ></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner" id="elementCarousel">
                            <img src="{{$product['image']}}"  alt="" height="300" width="600">
                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev " href="#imagesProduct" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next " href="#imagesProduct" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>

                    </div>

                </div>
                <div class="dropdown-divider"></div>
                <div class="row d-flex justify-content-center border bg-secondary ">

                        <div class="row border bg-light">
                            <div class="col border">
                                <p>Product: <strong>{{$product['name']}}</strong></p>
                                <p>Type Product: <strong>{{$product['type_product']}}</strong></p>
                                <p>Price: <strong>{{$product['price']}} $</strong></p>
                                <p>Total Number Of Times Purchased: <strong>{{$sales}} Items</strong></p>

                            </div>
                            <div class="col">
                                <p>Description</p>
                                <strong>{{$product['description']}}</strong>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="{{route('product.edit',array('username' => Auth::user()->username,'product' => $product))}}"><i class="fas fa-edit fa-2x"></i></a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection


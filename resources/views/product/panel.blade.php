@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{asset('css/multi.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.css"/>
    <style>
        a .rounded:hover{
            border: 2px solid white;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2">
            @include('layouts.panel')
        </div>
        <div id="panel"  class="col-md-10 pt-5">
            <div class="container">
                <ul class="nav nav-tabs mb-5">
                    <li class="nav-item">
                        <a class="nav-link active" id="homeProduct" href="{{route('product.panel',array('username' => Auth::user()->username))}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="listProduct" href="#">List Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="newProduct" href="#">Create New Product</a>
                    </li>
                </ul>
                <div class="row">
                <div class="col-5">
                    <h5 class="text-center bg-info">Top Product Last Week</h5>

                    <div id="topProducts" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            @for($i = 0 ; $i < count($topProducts) ; $i++)
                                <li data-target="#topProducts" data-slide-to="{{$i+1}}"></li>
                            @endfor
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner" id="elementCarousel">
                            @forelse($topProducts as $product)
                                <div class="carousel-item @if($loop->first) active @endif ">
                                    <div class="card card-cascade bg-dark">
                                        <!--Card image-->
                                        <a class="align-self-center" href="{{route('product.profile',array('username' => Auth::user()->username,'product' => $product))}}"> <img class=" rounded pt-2 position-relative" src="{{$product->image}}" width="200" height="200" alt="Card image of customer"></a>
                                        <!--/Card image-->

                                        <!--Card content-->
                                        <div class="card-body">
                                            <h4 class="text-center text-white">{{$product->name}}</h4>
                                            <div class="row d-flex justify-content-around">
                                                <p class="card-text text-center text-white">Type Product <br> <strong>{{$product->type_product}}</strong></p>
                                                <p class="card-text text-center text-white">Price <br> <strong>{{$product->price}}</strong></p>
                                            </div>


                                            <div id="footerCard" class=" bg-secondary text-center d-flex justify-content-center">
                                                <p>Created: {{$product->created_at->format('d/m/Y')}}</p>
                                            </div>
                                        </div>

                                        <!--/.Card content-->
                                    </div>
                                </div>
                            @empty
                                <p>No Se Han vendido Productos en la ultima semana</p>
                            @endforelse

                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev " href="#topProducts" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next " href="#topProducts" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>

                    </div>

                </div>

                <div class="col-5">
                    <h5 class="text-center bg-info">More Expensive Products</h5>

                    <div id="moreExpensiveProduct" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            @for($i = 0 ; $i < count($moreExpensiveProduct) ; $i++)
                                <li data-target="#moreExpensiveProduct" data-slide-to="{{$i+1}}"></li>
                            @endfor
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner" id="elementCarousel">
                            @forelse($moreExpensiveProduct as $product)
                                <div class="carousel-item @if($loop->first) active @endif ">
                                    <div class="card card-cascade bg-dark">
                                        <!--Card image-->
                                        <a class="align-self-center" href="{{route('product.profile',array('username' => Auth::user()->username,'product' => $product))}}"> <img class=" rounded pt-2 position-relative" src="{{$product->image}}" width="200" height="200" alt="Card image of customer"></a>
                                        <!--/Card image-->

                                        <!--Card content-->
                                        <div class="card-body">
                                            <h4 class="text-center text-white">{{$product->name}}</h4>
                                            <p class="card-text text-center text-white">Price <br> <strong>{{$product->price}}$</strong></p>
                                            <div id="footerCard" class=" bg-secondary text-center d-flex justify-content-center">
                                                <p>Created: {{$product->created_at->format('d/m/Y')}}</p>
                                            </div>
                                        </div>

                                        <!--/.Card content-->
                                    </div>
                                </div>
                            @empty
                                <p>No Se Han vendido Productos en la ultima semana</p>
                            @endforelse

                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev " href="#moreExpensiveProduct" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next " href="#moreExpensiveProduct" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>

                    </div>

                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.js"></script>
    <script src="{{asset('js/panelProduct.js')}}" ></script>
@endpush


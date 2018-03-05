@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{asset('css/multi.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.css"/>
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
                        <a class="nav-link active" href="{{route('customer.panel',array('username' => Auth::user()->username))}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="listCustomer" href="#">List Customers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="newCustomer" href="#">Create New Customer</a>
                    </li>
                </ul>
                <div class="row">
                    <div class="col-md-5">
                        <h5 class="text-center bg-info">Customers Created Last Week</h5>

                        <div id="customersOfTheWeek" class="carousel slide" data-ride="carousel">

                            <!-- Indicators -->
                            <ul class="carousel-indicators">
                                @for($i = 0 ; $i < count($customersOfTheWeek) ; $i++)
                                    <li data-target="#customersOfTheWeek" data-slide-to="{{$i+1}}"></li>
                                @endfor
                            </ul>

                            <!-- The slideshow -->
                            <div class="carousel-inner" id="elementCarousel">
                                @forelse($customersOfTheWeek as $customer)
                                    <div class="carousel-item @if($loop->first) active @endif ">
                                        <div class="card card-cascade bg-dark">
                                            <!--Card image-->
                                            <img class="align-self-center rounded pt-2 position-relative" src="{{$customer->image}}" width="200" height="200" alt="Card image of customer">
                                            <!--/Card image-->

                                            <!--Card content-->
                                            <div class="card-body bg-light">
                                                <h4 class="text-center text-white">{{$customer->name}} {{$customer->surnames}}</h4>
                                                <p class="card-text text-center text-white">Type Customer:<strong>{{$customer->type_customers}}</strong></p>
                                                <div id="footerCard" class=" bg-secondary text-center d-flex justify-content-center">
                                                    <p>Created: {{$customer->created_at->format('d/m/Y')}}</p>
                                                </div>
                                            </div>

                                            <!--/.Card content-->
                                        </div>
                                    </div>
                                @empty
                                    <p>No Se Han creado Clientes en la ultima semana</p>
                                @endforelse

                            </div>

                            <!-- Left and right controls -->
                            <a class="carousel-control-prev " href="#customersOfTheWeek" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next " href="#customersOfTheWeek" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>

                        </div>


                    </div>
                    <div class="col-md-5">
                        <h5 class="text-center bg-info">Customers With More Purchases</h5>
                        <div id="customersMorePurchases" class="carousel slide" data-ride="carousel">

                            <!-- Indicators -->
                            <ul class="carousel-indicators">
                                @for($i = 0 ; $i < count($customersMorePurchases) ; $i++)

                                    <li data-target="#customersMorePurchases" data-slide-to="{{$i+1}}" ></li>
                                @endfor
                            </ul>

                            <!-- The slideshow -->
                            <div class="carousel-inner" id="elementCarousel">
                                @forelse($customersMorePurchases as $customer)
                                    <div class="carousel-item @if($loop->first) active @endif ">
                                        <div class="card card-cascade bg-dark">
                                            <!--Card image-->
                                            <img class=" align-self-center rounded pt-2" src="{{$customer->image}}" width="200" height="200" alt="Card image of customer">
                                            <!--/Card image-->

                                            <!--Card content-->
                                            <div class="card-body">
                                                <h4 class="text-center text-white">{{$customer->name}} {{$customer->surnames}}</h4>
                                                <p class="card-text text-center text-white">Total Purchases<br><strong>{{$customer->bills()->get()->max('total')}}$ </strong></p>
                                                <div id="footerCard" class=" bg-secondary text-center d-flex justify-content-center">
                                                    <p>Created: {{$customer->created_at->format('d/m/Y')}}</p>
                                                </div>
                                            </div>

                                            <!--/.Card content-->
                                        </div>
                                    </div>
                                @empty
                                    <p>De momento ningun cliente a echo una compra</p>
                                @endforelse

                            </div>

                            <!-- Left and right controls -->
                            <a class="carousel-control-prev " href="#customersMorePurchases" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next " href="#customersMorePurchases" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{asset('js/chart.min.js')}}"></script>
    <script src="{{asset('js/multi.min.js')}}" ></script>
    <script src="{{asset('js/iziModal.min.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.js"></script>
    <script src="{{asset('js/panel.js')}}" ></script>
@endpush



@extends('layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.css"/>
    <style>
        a .rounded:hover{
            border: 2px solid white;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-2">
            @include('layouts.panel')
        </div>
        <div id="panel"  class="col-10 pt-5">
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
                    <div class="col-5">
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
                                            <a class="align-self-center" href="{{route('customer.profile',array('username' => Auth::user()->username,'customer' => $customer))}}"> <img class=" rounded pt-2 position-relative" src="{{$customer->image}}" width="200" height="200" alt="Card image of customer"></a>
                                            <!--/Card image-->

                                            <!--Card content-->
                                            <div class="card-body">
                                                <h4 class="text-center text-white">{{$customer->name}} {{$customer->surnames}}</h4>
                                                <p class="card-text text-center text-white">Type Customer <br> <strong>{{$customer->type_customers}}</strong></p>
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
                    <div class="col-5">
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
                                            <a class="align-self-center" href="{{route('customer.profile',array('username' => Auth::user()->username,'customer' => $customer))}}"> <img class=" rounded pt-2 position-relative" src="{{$customer->image}}" width="200" height="200" alt="Card image of customer"></a>
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
                                    <p>De momento ningun cliente a realizado una compra</p>
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
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.js"></script>
    <script src="{{asset('js/panelCustomer.js')}}" ></script>
@endpush



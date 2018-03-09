@extends('layouts.app')
@section('style')
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
        <div id="panel"  class="col-md-10">
            <div class="dropdown-divider m-5"></div>

            <h3 class=" text-center bg-success w-25 mb-5">Customers</h3>

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

            <div class="dropdown-divider m-5"></div>
            <h3 class=" text-center bg-success w-25 mb-5">Products</h3>
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
                                        <a class="align-self-center" href="{{route('product.profile',array('username' => Auth::user()->username,'product' => $product))}}"> <img class=" rounded pt-2 position-relative" src="{{$product->image}}" width="200" height="200" alt="Card image of Product"></a>
                                        <!--/Card image-->

                                        <!--Card content-->
                                        <div class="card-body">
                                            <h4 class="text-center text-white">{{$product->name}}</h4>
                                            <div class="row d-flex justify-content-around">
                                                <p class="card-text text-center text-white">Type Product <br> <strong>{{$product->type_product}}</strong></p>
                                                <p class="card-text text-center text-white">Price <br> <strong>{{$product->price}} $</strong></p>
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
                                        <a class="align-self-center" href="{{route('product.profile',array('username' => Auth::user()->username,'product' => $product))}}"> <img class=" rounded pt-2 position-relative" src="{{$product->image}}" width="200" height="200" alt="Card image of Product"></a>
                                        <!--/Card image-->

                                        <!--Card content-->
                                        <div class="card-body">
                                            <h4 class="text-center text-white">{{$product->name}}</h4>
                                            <p class="card-text text-center text-white">Price <br> <strong>{{$product->price}} $</strong></p>
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
            <div class="dropdown-divider m-5"></div>
            <h3 class=" text-center bg-success w-25 mb-5">Bills</h3>
            <div class="row">
                <div class="col-md-5">
                    <h5 class="text-center bg-info">Bill Created Last Month</h5>
                    <div class="card card-cascade">
                        <div class="card-body ">
                            <div id="demo" class="carousel slide" data-ride="carousel">

                                <!-- Indicators -->
                                <ul class="carousel-indicators">
                                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                                    <li data-target="#demo" data-slide-to="1"></li>
                                    <li data-target="#demo" data-slide-to="2"></li>
                                </ul>

                                <!-- The slideshow -->
                                <div class="carousel-inner" id="elementCarousel">
                                    <div class="carousel-item active">
                                        <img src="https://cdn.elgrupoinformatico.com/Noticias/2017/12/jaja-inocentes-550x312.jpg" width="700" height="300" alt="Los Angeles">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="http://clcdn02.mundotkm.com/2016/01/013.jpg" width="700" height="300" alt="Chicago">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="http://images.nationalgeographic.com.es/medio/2017/12/22/eclipse-en-estados-unidos_04beaf08.jpg" width="700" height="300" alt="New York">
                                    </div>
                                </div>

                                <!-- Left and right controls -->
                                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </a>
                                <a class="carousel-control-next" href="#demo" data-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </a>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-5">
                    <h5 class="text-center bg-info">Bill With More Purchases</h5>
                    <div class="card card-cascade">
                        <div class="card-body">
                            <div id="demo2" class="carousel slide" data-ride="carousel">

                                <!-- Indicators -->
                                <ul class="carousel-indicators">
                                    <li data-target="#demo2" data-slide-to="0" class="active"></li>
                                    <li data-target="#demo2" data-slide-to="1"></li>
                                    <li data-target="#demo2" data-slide-to="2"></li>
                                </ul>

                                <!-- The slideshow -->
                                <div class="carousel-inner" id="elementCarousel">
                                    <div class="carousel-item active">
                                        <div class="card card-cascade">
                                            <!--Card image-->
                                            <img class="card-img-top" src="" alt="Card image of customer">
                                            <!--/Card image-->

                                            <!--Card content-->
                                            <div class="card-body">
                                                <h4 class="text-center">Customers  ID#</h4>
                                                <p class="card-text">Name: <br><strong></strong></p>
                                                <p class="card-text">Type Customer: <br><strong></strong></p>
                                                <div id="option" class="d-flex justify-content-around">
                                                    <form action="" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="btn btn-danger"><img src="https://es.seaicons.com/wp-content/uploads/2017/02/delete-icon-1.png" width="25" height="25" alt=""></button>
                                                    </form>
                                                    <a class="btn btn-success" href="#"><img src="https://cdn0.iconfinder.com/data/icons/social-messaging-ui-color-shapes/128/write-circle-green-256.png" width="25" height="25" alt=""></a>
                                                    <a class="btn btn-info" href="#"><img src="http://www.tecnovirtual.edu.ec/virtual/pluginfile.php/2005/block_html/content/icon-user.png" width="25" height="25" alt=""></a>
                                                </div>
                                            </div>
                                            <div id="footerCard" class=" bg-secondary text-center">
                                                <p>Created: <strong class="align-text-top"></strong></p>
                                            </div>
                                            <!--/.Card content-->
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="http://clcdn02.mundotkm.com/2016/01/013.jpg" width="700" height="300" alt="Chicago">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="http://images.nationalgeographic.com.es/medio/2017/12/22/eclipse-en-estados-unidos_04beaf08.jpg" width="700" height="300" alt="New York">
                                    </div>
                                </div>

                                <!-- Left and right controls -->
                                <a class="carousel-control-prev" href="#demo2" data-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </a>
                                <a class="carousel-control-next" href="#demo2" data-slide="next">
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
    <script src="{{asset('js/chart.min.js')}}"></script>
    <script src="{{asset('js/multi.min.js')}}" ></script>
    <script src="{{asset('js/iziModal.min.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.js"></script>
    <script src="{{asset('js/panel.js')}}" ></script>
@endpush
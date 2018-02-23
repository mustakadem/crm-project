
    <div class="container">
        <ul class="nav nav-tabs mb-5">
            <li class="nav-item">
                <a class="nav-link active" href="#">Home</a>
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
            <div class="card card-cascade">
                <div class="card-body">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            @for($i = 0 ; $i < count($customersOfTheWeek) ; $i++)
                                <li data-target="#demo" data-slide-to="0" class="active"></li>
                                <li data-target="#demo" data-slide-to="{{$i+1}}"></li>
                             @endfor
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner" id="elementCarousel">
                            @forelse($customersOfTheWeek as $customer)
                            <div class="carousel-item @if($loop->first) active @endif ">
                                <div class="card card-cascade">
                                    <!--Card image-->
                                    <img class="card-img-top" src="{{$customer->image}}" width="200" height="200" alt="Card image of customer">
                                    <!--/Card image-->

                                    <!--Card content-->
                                    <div class="card-body">
                                        <h4 class="text-center">{{$customer->name}} {{$customer->surnames}}</h4>
                                        <p class="card-text">Type Customer:{{$customer->type_customers}} <br><strong></strong></p>
                                        <div id="footerCard" class=" bg-secondary text-center">
                                            <p>Created: {{$customer->created_at->format('d/m/Y')}} <strong class="align-text-top"></strong></p>
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
                <h5 class="text-center bg-info">Customers With More Purchases</h5>
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
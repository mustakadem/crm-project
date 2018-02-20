@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <nav class="nav flex-column navbar-dark bg-dark pt-5 position-fixed h-100">
                <a class="nav-link  " href="{{route('user.home')}}">Home</a>
                <div class="dropright m-3 btn-group">
                    <span class="button-group-addon" ><img src="http://simpleicon.com/wp-content/uploads/account.svg" width="30" height="30" alt=""></span>
                    <button class="btn dropdown-toggle ml-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Customers
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item btn " href="{{route('customer.home',array('user' =>  Auth::user()))}}">List</a>
                        <a class="dropdown-item" href="{{route('customer.new',array('user' => Auth::user()))}}">Create</a>
                    </div>
                </div>
                <div class="dropright m-3 btn-group">
                    <span class="button-group-addon " ><img src="https://www.peerby.com/img/archetypes/moving_boxes-big.png" width="30" height="30" alt=""></span>
                    <button class="btn dropdown-toggle ml-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Products
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{route('product.new',array('user' => Auth::user()))}}">Create</a>
                    </div>
                </div>
                <div class="dropright m-3 btn-group">
                    <span class="button-group-addon" ><img src="https://image.flaticon.com/icons/png/512/522/522575.png" width="30" height="30" alt=""></span>
                    <button class="btn dropdown-toggle ml-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Bills
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item btn " href="{{route('bills.list',array('user' =>  Auth::user()->username))}}">List</a>
                        <a class="dropdown-item" href="{{route('bill.new',array('user' => Auth::user()->username))}}">Create</a>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="nav-link " href="#">Statics</a>
                <a class="nav-link" href="#">Messages</a>
            </nav>
        </div>
        <div class="container pt-3 w-75 mt-5">
            <div class="col-md-12">
                <h3 class="text-center bg-info">List Of Products</h3>
                <div class="row m-2">
                    @forelse($products as $product)
                        <div class="col-md-4 mb-3">
                            <!--Card-->
                            <div class="card card-cascade">
                                <!--Card image-->
                                <img class="card-img-top" src="{{$product['image']}}" alt="Card image of product {{$product['name']}}">
                                <!--/Card image-->

                                <!--Card content-->
                                <div class="card-body">
                                    <h4 class="text-center">Product  ID#{{$product['id']}}</h4>
                                    <p class="card-text">Name: <br><strong>{{$product['name']}}</strong></p>
                                    <p class="card-text">Description: <br> <strong>{{$product['description']}}</strong></p>
                                    <p class="card-text">Price: <br><strong>{{$product['price']}}$</strong></p>
                                    <p class="card-text">Type Product: <br><strong>{{$product['type_product']}}</strong></p>
                                </div>

                                <div id="option" class="d-flex justify-content-around">
                                    <form action="{{route('product.delete',array('id' => $product['id']))}}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger"><img src="https://es.seaicons.com/wp-content/uploads/2017/02/delete-icon-1.png" width="25" height="25" alt=""></button>
                                    </form>                                    <a class="btn btn-success" href="#"><img src="https://cdn0.iconfinder.com/data/icons/social-messaging-ui-color-shapes/128/write-circle-green-256.png" width="25" height="25" alt=""></a>
                                    <a class="btn btn-info" href="#"><img src="http://pgatinasycamisetasshop.com/wp-content/uploads/2015/05/icono_paquetes.png" width="25" height="25" alt=""></a>
                                </div>
                                <br>
                                <div id="footerCard" class="flex-row bg-secondary text-center">
                                    <p>Created: <strong class="align-text-top">{{$product['created_at']}}</strong></p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No hay Productos</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection

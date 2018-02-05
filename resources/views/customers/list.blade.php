@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2">
        <nav class="nav flex-column navbar-dark bg-dark pr-2 pb-5 pl-4 h-100 position-fixed">
            <a class="nav-link " href="{{route('user.home')}}">Home</a>
            <div class="dropright m-3 btn-group">
                <span class="button-group-addon" ><img src="http://simpleicon.com/wp-content/uploads/account.svg" width="30" height="30" alt=""></span>
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Customers
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{route('customer.new',array('user' => Auth::user()))}}">Create</a>
                </div>
            </div>
            <div class="dropright m-3 btn-group">
                <span class="button-group-addon " ><img src="https://www.peerby.com/img/archetypes/moving_boxes-big.png" width="30" height="30" alt=""></span>
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Products
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{route('product.list',array('user' => Auth::user()))}}">List</a>
                    <a class="dropdown-item" href="{{route('product.new',array('user' => Auth::user()))}}">Create</a>
                </div>
            </div>
            <div class="dropdown-divider"></div>
            <a class="nav-link " href="#">Statics</a>
            <a class="nav-link disabled" href="#">Messages</a>
        </nav>
        </div>
<div class="container pt-3">
    <div class="col-md-10">
        <h3 class="text-center bg-info">List Of Costumers</h3>
    <div class="row m-2">
    @forelse($customers as $customer)
                <div class="col-md-4 mb-3">
                    <!--Card-->
                    <div class="card card-cascade">
                        <!--Card image-->
                        <img class="card-img-top" src="{{$customer['image']}}" alt="Card image of customer {{$customer['name']}}">
                        <!--/Card image-->

                        <!--Card content-->
                        <div class="card-body">
                            <h4 class="text-center">Customers  ID#{{$customer['id']}}</h4>
                            <p class="card-text">Name: <br><strong>{{$customer['name']}} {{$customer['surnames']}}</strong></p>
                            <p class="card-text">Email: <br><strong>{{$customer['email']}}</strong></p>
                            <p class="card-text">Movil: <br><strong>{{$customer['movil']}}</strong></p>
                            <p class="card-text">Type Customer: <br><strong>{{$customer['type_customers']}}</strong></p>
                            <div id="option" class="d-flex justify-content-around">
                                <a class="btn btn-danger" href="#"><img src="https://es.seaicons.com/wp-content/uploads/2017/02/delete-icon-1.png" width="25" height="25" alt=""></a>
                                <a class="btn btn-success" href="#"><img src="https://cdn0.iconfinder.com/data/icons/social-messaging-ui-color-shapes/128/write-circle-green-256.png" width="25" height="25" alt=""></a>
                                <a class="btn btn-info" href="#"><img src="http://www.tecnovirtual.edu.ec/virtual/pluginfile.php/2005/block_html/content/icon-user.png" width="25" height="25" alt=""></a>
                            </div>
                        </div>
                        <div id="footerCard" class=" bg-secondary text-center">
                            <p>Created: <strong class="align-text-top">{{$customer['created_at']}}</strong></p>
                        </div>
                        <!--/.Card content-->
                    </div>
                </div>
    @empty
    <p>No hay Clientes</p>
    @endforelse
    </div>
    </div>
</div>
</div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2">
                <nav class="nav flex-column navbar-dark bg-dark pr-5 pb-5 pl-4  h-100">
                    <a class="nav-link disabled" href="#">Home</a>
                    <div class="dropright m-3 btn-group">
                        <span class="button-group-addon" ><img src="https://icon-icons.com/icons2/876/PNG/512/user-circle_icon-icons.com_68282.png" width="30" height="30" alt=""></span>
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Customers
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item btn " href="{{route('customer.home',array('user' =>  Auth::user()))}}">List</a>
                            <a class="dropdown-item" href="{{route('customer.new',array('user' => Auth::user()))}}">Create</a>
                        </div>
                    </div>
                    <div class="dropright m-3 btn-group">
                        <span class="button-group-addon " ><img src="https://www.peerby.com/img/archetypes/moving_boxes-big.png" width="30" height="30" alt=""></span>
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Products
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">List</a>
                            <a class="dropdown-item" href="#">Create</a>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a class="nav-link " href="#">Statics</a>
                    <a class="nav-link" href="#">Messages</a>
                </nav>
        </div>
        <div class="col-md-10">
        <div class="container pt-5 pl-5">
            <img src="https://www.faq-mac.com/wp-content/uploads/2012/03/captura-pantalla-2012-03-05-114445_36103_640.jpg" alt="">
        </div>
    </div>
    </div>
@endsection
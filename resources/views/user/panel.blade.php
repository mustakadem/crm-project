@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <nav class="nav flex-column navbar-dark bg-dark pt-5 position-fixed h-100">
                <a class="nav-link disabled" href="#">Home</a>
                <div class="dropright m-3 btn-group">
                    <span class="button-group-addon" ><img src="http://simpleicon.com/wp-content/uploads/account.svg" width="30" height="30" alt=""></span>
                    <button class="btn dropdown-toggle ml-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Customers
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item btn " href="{{route('customer.home',array('username' =>  Auth::user()->username))}}">List</a>
                        <a class="dropdown-item" href="{{route('customer.new',array('user' => Auth::user()->username))}}">Create</a>
                    </div>
                </div>
                <div class="dropright m-3 btn-group">
                    <span class="button-group-addon " ><img src="https://www.peerby.com/img/archetypes/moving_boxes-big.png" width="30" height="30" alt=""></span>
                    <button class="btn dropdown-toggle ml-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Products
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{route('product.list',array('user' => Auth::user()))}}">List</a>
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
    </div>
@endsection
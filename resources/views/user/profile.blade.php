@extends('layouts.app')

@section('cdn')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
@endsection


@section('content')
    <div class="row">
        @if (!Auth::guest())
        <nav class="nav flex-column navbar-dark bg-dark pr-5 pb-5 pl-4 ">
            <a class="nav-link " href="{{route('user.home')}}">Home</a>
            <div class="dropright m-3 btn-group">
                <span class="button-group-addon" ><img src="http://simpleicon.com/wp-content/uploads/account.svg" width="30" height="30" alt=""></span>
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
                    <a class="dropdown-item" href="{{route('product.list',array('user' => Auth::user()))}}">List</a>
                    <a class="dropdown-item" href="{{route('product.new',array('user' => Auth::user()))}}">Create</a>
                </div>
            </div>
            <div class="dropdown-divider"></div>
            <a class="nav-link " href="{{route('user.edit',array('user'=>$user->username))}}">Edit Data</a>
            <a class="nav-link " href="#">Statics</a>
            <a class="nav-link disabled" href="#">Messages</a>
        </nav>
        @endif
    <div class="container ">
    <div class="row pt-5">
        <div class="col-md-2 ">
            <img src="{{$user->avatar }}" alt="user image" width="150" height="150">
            <p>Nick: <strong>{{$user->username }}</strong></p>
            <input type="hidden" id="username" value="{{$user->username }}">
        </div>
        <div class="col-md-2">
            <p>Name: <strong>{{$user->name }}</strong></p>
            <p>Surnames: <strong>{{$user->surnames }}</strong></p>
        </div>
        <div class="col-md-2">
            <p>Email: <strong>{{$user->email }}</strong></p>
            <p>Movil: <strong>{{$user->movil }}</strong></p>
        </div>
        <div class="col-md-3">
            <p>Sector: <strong>{{$user->sector }}</strong></p>
            <p>Website: <strong>{{$user->website }}</strong></p>
        </div>
    </div>
        <div class="row">
            <div class="col-md-10">
            <canvas id="staticUser" width="100" height="30"></canvas>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('js')
    <script src="{{asset('js/statistics.js')}}" defer></script>
@endpush
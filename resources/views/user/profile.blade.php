@extends('layouts.app')


@section('content')
    <div class="row">
        @if (!Auth::guest())
            <div class="col-md-2">
                <nav class="nav flex-column navbar-dark bg-dark pt-5 position-fixed h-100">
                    <a class="nav-link" href="{{route('user.home')}}">Home</a>
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
                    <a class="nav-link " href="{{route('user.edit',array('user' => Auth::user()->username))}}">Edit Data</a>
                    <a class="nav-link " href="#">Statics</a>
                    <a class="nav-link" href="#">Messages</a>
                </nav>
            </div>
        @endif
    <div class="container  ">
    <div class="col-md-10 row pt-5 m-5">
        <div class="col-md-2  m-2">
            <img src="{{$user->avatar }}" alt="user image" width="150" height="150">
            <p>Nick: <strong>{{$user->username }}</strong></p>
            <input type="hidden" id="username" value="{{$user->username }}">
        </div>
        <div class="col-md-2 m-2">
            <p>Name: <strong>{{$user->name }}</strong></p>
            <p>Surnames: <strong>{{$user->surnames }}</strong></p>
        </div>
        <div class="col-md-2 ml-2 mr-2">
            <p>Email: <strong>{{$user->email }}</strong></p>
            <p>Movil: <strong>{{$user->movil }}</strong></p>
        </div>
        <div class="col-md-3 ml-5">
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
    <script src="{{asset('js/chart.min.js')}}"></script>
    <script src="{{asset('js/statistics.js')}}" ></script>
@endpush
@extends('layouts.app')

@section('content')
    <div class="row">
                <nav class="nav flex-column navbar-dark bg-dark pr-5 pb-5 pl-4 justify-content-center">
                    <a class="nav-link disabled" href="#">Home</a>
                    <div class="dropright m-3">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Customers
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item btn " href="{{route('customer.home',array('user' =>  Auth::user()))}}">List</a>
                            <a class="dropdown-item" href="{{route('customer.new',array('user' => Auth::user()))}}">Create</a>
                        </div>
                    </div>
                    <div class="dropright m-3">
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
@endsection
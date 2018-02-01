@extends('layouts.app')

@section('content')
    <div class="row">
        <nav class="nav flex-column navbar-dark bg-dark pr-5 pb-5 pl-4 ">
            <a class="nav-link " href="{{route('user.home')}}">Home</a>
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
            <a class="nav-link disabled" href="#">Messages</a>
        </nav>
<div class="container pt-5">

    <div class="col-md-10">
    <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Movil</th>
            <th>Type Customer</th>
            <th>Company</th>
        </tr>
        </thead>
    @forelse($customers as $customer)
        <tbody>
        <tr>
            <td> <img src="{{$customer['image']}}" alt="{{$customer['name']}}" height="150" width="150" ></td>
            <td>{{$customer['name']}}</td>
            <td>{{$customer['surnames']}}</td>
            <td>{{$customer['email']}}</td>
            <td>{{$customer['movil']}}</td>
            <td>{{$customer['type_customers']}}</td>
            <td>{{$customer['company']}}</td>
        </tr>
    @empty
    <p>No hay Clientes</p>
    @endforelse
        </tbody>
    </table>
    </div>
</div>
</div>
@endsection

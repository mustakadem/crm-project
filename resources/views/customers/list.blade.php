@extends('layouts.app')
@section('menu')
    <ol class="breadcrumb">
        <li><a href="{{route('user.home')}}">Home</a></li>
        <li class="active">Create Customers</li>
    </ol>
@endsection
@section('content')
    <div class="row">
    <div class="col-md-2 jumbotron">
        <nav class="nav flex-column">
            <a class="nav-link" href="{{route('user.home')}}">Home</a>
            <a class="nav-link active" href="">Customers</a>
            <a class="nav-link" href="{{route('customer.new',array('user' => Auth::user()))}}">Create Customer</a>
        </nav>
    </div>
<div class="container">

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

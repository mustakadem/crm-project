@extends('layouts.app')
@section('menu')
    <ol class="breadcrumb">
        <li><a href="{{route('raiz')}}">Home</a></li>
        <li class="active">Customers List</li>
    </ol>
@endsection
@section('content')
<div class="container">
    <div class="col-md-2">
        <ul class="nav nav-pills nav-stacked">
            <li role="presentation"><a href="{{route('raiz')}}">Home</a></li>
            <li role="presentation"><a href="{{route('customer.new')}}">Create Customer</a></li>
            <li role="presentation" class="active"><a href="{{route('customer.list')}}">List Customers</a></li>
        </ul>
    </div>
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
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <a class="btn btn-primary" role="botton" href="{{route('customer.new')}}">Create New Customer</a>
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
@endsection

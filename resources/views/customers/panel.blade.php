@extends('layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.css"/>
    <style>
        a .rounded:hover{
            border: 2px solid white;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-2">
            @include('layouts.panel')
        </div>
        <div id="panel"  class="col-10 pt-5">
            <div class="container">
                <ul class="nav nav-tabs mb-5">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('customer.panel',array('username' => Auth::user()->username))}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="newCustomer" href="#">Create New Customer</a>
                    </li>
                </ul>
                <h3 class="text-center bg-info">List Of Costumers</h3>
                <table id="tabla" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Surnames</th>
                        <th>movil</th>
                        <th>Company</th>
                        <th>Job Title</th>
                        <th>Type Customer</th>
                        <th>Delete</th>
                        <th>Profile</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Surnames</th>
                        <th>movil</th>
                        <th>Company</th>
                        <th>Job Title</th>
                        <th>Type Customer</th>
                        <th>Delete</th>
                        <th>Profile</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @forelse($customers as $customer)
                        <tr>
                            <td><img src="{{$customer['image']}}" alt=" image of customer {{$customer['name']}}"></td>
                            <td>{{$customer['name']}}</td>
                            <td>{{$customer['surnames']}}</td>
                            <td>{{$customer['movil']}}</td>
                            <td>{{$customer['company']}}</td>
                            <td>{{$customer['job_title']}}</td>
                            <td>{{$customer['type_customers']}}</td>
                            <td>
                                <button type="submit"  class="btn btn-danger"><i class="far fa-trash-alt fa-2x" data-toggle="modal" data-target="#deleteCustomer{{$customer->id}}"></i></button>
                                @include('customers.modalDelete', ['cliente' => $customer])
                            </td>
                            <td>
                                <a  href="{{route('customer.profile',array('username' => Auth::user()->username , 'customer' => $customer))}}"><i class="far fa-address-card fa-3x"></i></a>
                            </td>
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

@push('js')
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.js"></script>
    <script>
        $('#tabla').DataTable();
    </script>
    <script src="{{asset('js/panelCustomer.js')}}" ></script>
@endpush



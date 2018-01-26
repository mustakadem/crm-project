@extends('layouts.app')

@section('menu')
    <ol class="breadcrumb">
        <li><a href="{{route('raiz')}}">Home</a></li>
        <li class="active">Profile</li>
    </ol>
@endsection
@section('content')
    <div class="container">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked">
                <li role="presentation"><a href="#">Home</a></li>
                <li role="presentation" class="active"><a href="{{route('customer.new')}}">Edit User</a></li>
                <li role="presentation"><a href="{{route('customer.list')}}">Statistics</a></li>
            </ul>
        </div>

        <div class="col-md-2">
            <img src="{{Auth::user()->avatar }}" alt="user image" width="300" height="300">
            <p>Nick: <strong>{{Auth::user()->username }}</strong></p>

        </div>
        <div class="col-md-2">
            <p>Name: <strong>{{Auth::user()->name }}</strong></p>
            <p>Surnames: <strong>{{Auth::user()->surnames }}</strong></p>
        </div>
        <div class="col-md-2">
            <p>Email: <strong>{{Auth::user()->email }}</strong></p>
            <p>Movil: <strong>{{Auth::user()->movil }}</strong></p>
            <p>Address: <strong>{{Auth::user()->address }}</strong></p>
            <p>Movil: <strong>{{Auth::user()->movil }}</strong></p>
        </div>
        <div class="col-md-2">

        </div>
    </div>

@endsection
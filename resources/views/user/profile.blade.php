@extends('layouts.app')

@section('menu')
    <ol class="breadcrumb">
        <li><a href="{{route('user.home')}}">Home</a></li>
        <li class="active">Profile</li>
    </ol>
@endsection
@section('content')
    <div class="container">
        <div class="col-md-3 jumbotron">
            <ul class="nav nav-pills nav-stacked">
                <li role="presentation"><a href="{{route('user.home')}}">Home</a></li>
                <li role="presentation"><a href="{{route('user.edit',array('user'=> $user->username))}}">Edit User</a></li>
                <li role="presentation"><a href="#">Statistics</a></li>
            </ul>
        </div>

        <div class="col-md-2">
            <img src="{{$user->avatar }}" alt="user image" width="150" height="150">
            <p>Nick: <strong>{{$user->username }}</strong></p>

        </div>
        <div class="col-md-2">
            <p>Name: <strong>{{$user->name }}</strong></p>
            <p>Surnames: <strong>{{$user->surnames }}</strong></p>
        </div>
        <div class="col-md-2">
            <p>Email: <strong>{{$user->email }}</strong></p>
            <p>Movil: <strong>{{$user->movil }}</strong></p>
        </div>
        <div class="col-md-2">
            <p>Sector: <strong>{{$user->sector }}</strong></p>
            <p>Website: <strong>{{$user->website }}</strong></p>
        </div>


    </div>

@endsection
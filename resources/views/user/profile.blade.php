@extends('layouts.app')

@section('cdn')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
@endsection

@section('menu')
    <ol class="breadcrumb">
        <li><a href="{{route('user.home')}}">Home</a></li>
        <li class="active">Profile</li>
    </ol>
@endsection

@section('content')
    <div class="col-md-2 jumbotron">
        <ul class="nav nav-pills nav-stacked">
            <li role="presentation"><a href="{{route('user.home')}}">Home</a></li>
            <li role="presentation"><a href="{{route('user.edit',array('user'=> $user->username))}}">Edit User</a></li>
            <li role="presentation"><a href="#">Statistics</a></li>
        </ul>
    </div>
    <div class="col-md-1"></div>
    <div class="container">
    <div class="row">
        <div class="col-md-2">
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
            <div class="col-md-2"></div>
            <div class="col-md-10">
            <canvas id="staticUser" width="25" height="5"></canvas>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('js/statistics.js')}}"></script>
@endsection
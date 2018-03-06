@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{asset('css/multi.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.css"/>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2">
            @include('layouts.panel')
        </div>
        <div id="panel"  class="col-md-10 pt-5">
            <div class="container  ">
                <ul class="nav nav-tabs mb-5 justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" id="homeProfile" href="{{route('user.profile',array('username' => Auth::user()->username))}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Objectives" href="#">Objectives</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="editData" href="{{route('user.edit',array('username' => Auth::user()->username))}}">Edit Data</a>
                    </li>
                </ul>
                <div class="row col-md-10">
                    <div class="col-md-2  ml-5">
                        <p>Nick: <strong class="btn bg-info">{{$user->username }}</strong></p>
                        <input type="hidden" id="username" value="{{$user->username }}">
                        <p>Name: <strong>{{$user->name }}</strong></p>
                        <p>Surnames: <strong>{{$user->surnames }}</strong></p>
                    </div>
                    <div class="col-md-2 ml-5 mr-5">
                        <p>Email: <strong>{{$user->email }}</strong></p>
                        <p>Movil: <strong>{{$user->movil }}</strong></p>
                    </div>
                    <div class="col-md-3 ml-5">
                        <p>Sector: <strong>{{$user->sector }}</strong></p>
                        <p>Website: <strong>{{$user->website }}</strong></p>
                    </div>
                    <div class="col-md-10">
                        <canvas id="staticUser" width="100" height="30"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('js')
    <script src="{{asset('js/chart.min.js')}}"></script>
    <script src="{{asset('js/statistics.js')}}"></script>
    <script src="{{asset('js/panel.js')}}" ></script>
@endpush







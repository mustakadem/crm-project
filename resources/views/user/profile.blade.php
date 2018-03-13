@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{asset('css/multi.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.css"/>
@endsection
@section('content')
    <div class="row">
        <div class="col-2">
            @include('layouts.panel')
        </div>
        <div id="panel" class="col-10 pt-5">
            <div class="container  ">
                <ul class="nav nav-tabs mb-5 justify-content-center">

                    <li class="nav-item">
                        <a class="nav-link active" id="homeProfile"
                           href="{{route('user.profile',array('username' => Auth::user()->username))}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Objectives" href="#">Objectives</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="editData"
                           href="{{route('user.edit',array('username' => Auth::user()->username))}}">Edit Data</a>
                    </li>
                </ul>
                    <h5 class="text-center">Collection Data</h5>
                    <div class="progress mb-4">
                        <div  id="progressUserData" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"  aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                <div class="row col-10 justify-content-center">
                    <div class="col-2  ml-5">
                        <p>Nick <i class="fas fa-user ml-2"></i><br><strong id="username"
                                    class="badge badge-success">{{$user->username }}</strong></p>
                        <input type="hidden" id="username" value="{{$user->username }}">
                        <p>Name <br><strong id="name" class="badge badge-primary">{{$user->name }}</strong></p>
                        <p>Surnames <br><strong id="surnames" class="badge badge-primary">{{$user->surnames }}</strong></p>
                    </div>
                    <div class="col-2 ml-5 mr-5">
                        <p>Email
                            <i class="fas fa-envelope ml-2"></i> <br><strong id="email"
                                    class="badge badge-success">{{$user->email }}</strong></p>

                        <p>Movil <i class="fas fa-mobile-alt ml-2"></i><br><strong id="movil"
                                    class="badge badge-primary">{{$user->movil }}</strong></p>
                    </div>
                    <div class="col-3 ml-5">
                        <p>Sector <i class="fas fa-building ml-2"></i><br><strong id="sector"
                                    class="badge badge-primary">{{$user->sector }}</strong></p>
                        <p>Website <i class="fas fa-globe ml-2"></i><br><strong id="website"
                                    class="badge badge-primary">{{$user->website }}</strong></p>
                    </div>
                    <div class="col-10">
                        <canvas id="staticUser" width="100" height="30"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('js')
    <script src="{{asset('js/progressDataUser.js')}}"></script>
    <script src="{{asset('js/chart.min.js')}}"></script>
    <script src="{{asset('js/statistics.js')}}"></script>
@endpush







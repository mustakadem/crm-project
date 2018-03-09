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
                        <a class="nav-link " id="homeProfile" href="{{route('user.profile',array('username' => Auth::user()->username))}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="Objectives" href="#">Objectives</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="editData" href="{{route('user.edit',array('username' => Auth::user()->username))}}">Edit Data</a>
                    </li>
                </ul>
                <div class="row">
                    <div class="row col-md-4">
                        <ul class="list-group d-flex justify-content-start">
                            <li class="list-group-item   @if( Request::is('edit/data') ) active @endif  "><a class="@if( Request::is('edit/data') ) text-white @endif" href="{{route('user.edit')}}">Edit Data</a></li>
                            <li class="list-group-item  @if( Request::is('edit/password') ) active @endif"><a class="@if( Request::is('edit/password') ) text-white @endif" href="{{route('edit.password')}}">Edit Password</a></li>
                            <li class="list-group-item  @if( Request::is('edit/avatar') ) active @endif"><a class="@if( Request::is('edit/avatar') ) text-white @endif" href="{{route('edit.avatar')}}">Edit avatar</a></li>
                            <li class="list-group-item">
                                    <button type="submit"  class="btn btn-danger"><i class="far fa-trash-alt fa-2x"  data-toggle="modal" data-target="#deleteUser"></i></button>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        @if( session('exito') )
                            <div class="bg-success">
                                <h5 class="text-white">Actualización correcta</h5>
                            </div>
                        @elseif( session('error'))
                            <div class="bg-danger">
                                <h5 class="text-white text-center ">{{ session('error') }}</h5>
                            </div>
                        @endif
                        <form action="{{ Request::url() }}" method="POST" enctype="multipart/form-data" >
                            {{ csrf_field() }}


                            @if( Request::is('edit/data') )
                                @include('user.edit.data')
                            @elseif( Request::is('edit/password') )
                                @include('user.edit.password')
                            @elseif( Request::is('edit/avatar') )
                                @include('user.edit.avatar')
                            @endif


                        </form>
                    </div>
                </div>
            </div>
            @include('user.edit.modalDelete')
        </div>
    </div>
@endsection

@push('js')
@endpush






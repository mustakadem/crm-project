@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2">
            @include('layouts.panel')
        </div>
        <div id="panel"  class="col-md-10 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <img src="{{asset('img/500.png')}}" alt="" >
                    </div>
                    <div class="col">
                        <h1 class="bg-info text-center text-justify text-white"> Problema interno del servidor</h1>
                    </div>
                </div>

            </div>
        </div>

@endsection
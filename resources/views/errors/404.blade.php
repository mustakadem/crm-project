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
                        <img src="{{asset('img/404Opps.png')}}" alt="" >
                        <img src="{{asset('img/404.png')}}" alt="" >
                    </div>
                    <div class="col">
                        <h1 class="bg-info text-center text-justify text-white"> El recurso que buscas no existe o a sido removido</h1>
                    </div>
                </div>



            </div>
        </div>

@endsection
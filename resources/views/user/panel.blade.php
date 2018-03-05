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

        </div>
    </div>
@endsection

@push('js')
    <script src="{{asset('js/chart.min.js')}}"></script>
    <script src="{{asset('js/multi.min.js')}}" ></script>
    <script src="{{asset('js/iziModal.min.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.js"></script>
    <script src="{{asset('js/panel.js')}}" ></script>
@endpush
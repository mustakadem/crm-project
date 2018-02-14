@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{asset('css/iziModal.min.css')}}">
@endsection
@section('content')
    <header>
        <nav class="">
            <ul class="d-flex flex-row navbar-nav p-3 justify-content-end">
            <li class="nav-item p-2 "><a href="{{ route('login') }}" class="nav-link login">Login</a></li>
            <li class="nav-item p-2 "><a href="{{ route('register') }}" class="nav-link register">Register</a></li>
            </ul>
        </nav>
        <section>
            <img src="https://www.lcinternet.es/wp-content/uploads/2017/02/crm-1.jpg" class="img-fluid" alt="">
        </section>
    </header>









        @include('auth.login')
        @include('auth.register')

@endsection

@push('js')
    <script src="{{asset('js/iziModal.min.js')}}"></script>
    <script src="{{asset('js/modal.js')}}"></script>
    <script src="{{asset('js/ajaxCalls.js')}}"></script>
@endpush

@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{asset('css/iziModal.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.fullpage.min.css')}}">
    <style>
        .login:hover, .register:hover{
            border-top: 2px solid white;
        }
    </style>
@endsection
@section('content')
    <header>
        <nav class="fixed-top pr-4" id="nav">
            <ul class="d-flex flex-row navbar-nav p-1 justify-content-end ">
                @if(Auth::check())
                    <li class="nav-item p-2 bg-white "><a href="{{ route('/')}}" class="nav-link login">Home</a></li>
                @else
                    <li class="nav-item p-2 h4 "><a href="{{ route('login') }}" class="nav-link login text-white">Login</a></li>
                    <li class="nav-item p-2 h4 "><a href="{{ route('register') }}" class="nav-link register text-white">Register</a></li>
                 @endif
            </ul>
        </nav>
    </header>


    <div id="fullpage">
        <section class="section">
        </section>
      <section class="section ">
          <div class="slide">
          <div class="col-md-5">
              <img class="featurette-image img-fluid mx-auto w-75 h-100" src="https://cdn.onlinewebfonts.com/svg/img_21192.png" alt="">
          </div>
            <div class="col-md-7">
                <h2>ACCEDE DESDE DONDE QUIERAS</h2>
                <p>Una forma sencilla y eficaz de llevar tu negocio en el bolsillo</p>
            </div>
          </div>
          <div class="slide">
            <div class="col-md-5">
                <h2>CREA TU RED</h2>
                <p>Gestiona tus clientes y contactos de manera dinamica</p>
            </div>
            <div class="col-md-7">
                <img class="featurette-image img-fluid mx-auto w-75 h-100" src="http://www.westside-tennis.com/wp-content/uploads/2015/01/4-user-icon.png" alt="">
            </div>
          </div>
          <div class="slide">
              <div class="col-md-5">
                  <img class="featurette-image img-fluid mx-auto w-75 h-100" src="http://freevector.co/wp-content/uploads/2014/06/46998-bars-graphic-with-ascendant-arrow.png" alt="">
              </div>
              <div class="col-md-7">
                  <h2>AUMENTA TUS INGRESOS</h2>
                  <p>Gestiona tus facturas y visualiza estadisticas personalizadas</p>
              </div>
          </div>
        </section>

    <footer class="section fp-auto-height" >
        <section  class="row" >
            <div class="col-md-2">
            <ul class="d-flex  navbar-nav p-1 justify-content-between p-5">
                <li class="p-2">Hola</li>
                <li class="p-2">Adios</li>
                <li class="p-2">Quetal</li>
                <li class="p-2">Buenas</li>
            </ul>
            </div>
            <div class="col-md-4 pt-5">
                <h3 class="text-center">Clients</h3>
                <div class="row pl-5">
                    <div class="col-md-6">
                <ul class="navbar-nav">
                    <li class="p-2"><img class="featurette-image img-fluid mx-auto w-50 h-50"  src="http://range-trans.com/wp-content/uploads/2015/07/LG_logo.png" alt=""></li>
                    <li class="p-2"><img class="featurette-image img-fluid mx-auto w-50 h-50" src="http://www.staffcreativa.pe/blog/wp-content/uploads/03_El-uso-de-min%C3%BAsculas-en-dise%C3%B1o-de-logotipos-Un-enigma-de-marcas.png" alt=""></li>
                    <li class="p-2"><img class="featurette-image img-fluid mx-auto w-50 h-50"  src="https://www.xantaro.net/wp-content/uploads/2016/09/Cisco.png" alt=""></li>
                </ul>
                    </div>
                    <div class="col-md-6">
                <ul class="navbar-nav">
                    <li class="p-2"><img class="featurette-image img-fluid mx-auto w-50 h-50" src="https://seeklogo.com/images/S/senal-colombia-2005-2009-logo-B127E74CAB-seeklogo.com.png" alt=""></li>
                    <li class="p-2"><img class="featurette-image img-fluid mx-auto w-25 h-50" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Sena_Colombia_logo.svg/220px-Sena_Colombia_logo.svg.png" alt=""></li>
                    <li class="p-2"><img class="featurette-image img-fluid mx-auto w-50 h-50" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Walmart_Chile_Logo_1.svg/1280px-Walmart_Chile_Logo_1.svg.png" alt=""></li>
                </ul>
                    </div>
            </div>
            </div>
        </section>
        <hr class="featurette-divider bg-info">
        <section class="row">
            <div class="col-md-12">
                <p class="text-center">Copiright <strong>Multaso</strong></p>
            </div>
        </section>
    </footer>
    </div>
        @include('auth.login')
        @include('auth.register')
@endsection

@push('js')
    <script src="{{asset('js/iziModal.min.js')}}"></script>
    <script src="{{asset('js/modal.js')}}"></script>
    <script src="{{asset('js/ajaxCalls.js')}}"></script>
    <script src="{{asset('js/jquery.fullpage.min.js')}}"></script>
    <script src="{{asset('js/scrollPage.js')}}"></script>
@endpush

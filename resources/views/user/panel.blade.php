@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{asset('css/multi.min.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2">
            <nav class="nav flex-column navbar-dark bg-dark pt-1 position-fixed h-100">
                <div class="text-center">
                    <a href="{{route('user.profile',array('user'=> Auth::user()->username))}}" class="nav-link"><img src="{{Auth::user()->avatar}}" alt="user image" class="rounded-circle">
                    <p class="bg-info">hellow!! <strong>{{Auth::user()->name}}</strong></p></a>
                    <input type="hidden" id="username" value="{{Auth::user()->username}}">
                </div>
                <a class="nav-link disabled" href="#">Home</a>
                <div class="dropright m-3 btn-group">
                    <span class="button-group-addon" ><img src="http://www.onsiteinspecting.com/wp-content/uploads/2016/02/male-user.png" width="30" height="30" alt=""></span>
                    <button class="btn ml-2" type="button" id="buttonCustomer"  aria-haspopup="true" aria-expanded="false">
                        Customers
                    </button>
                </div>
                <div class="dropright m-3 btn-group">
                    <span class="button-group-addon " ><img src="https://www.peerby.com/img/archetypes/moving_boxes-big.png" width="30" height="30" alt=""></span>
                    <button class="btn ml-2" type="button" id="buttonProduct"  aria-haspopup="true" aria-expanded="false">
                        Products
                    </button>
                </div>
                <div class="dropright m-3 btn-group">
                    <span class="button-group-addon" ><img src="https://image.flaticon.com/icons/png/512/522/522575.png" width="30" height="30" alt=""></span>
                    <button class="btn  ml-2" type="button" id="buttonBill"  aria-haspopup="true" aria-expanded="false">
                        Bills
                    </button>
                </div>
                <div class="dropdown-divider"></div>
                <a class="nav-link " href="#">Statics</a>
                <a class="nav-link" href="#">Messages</a>
                <ul class="menu vertical list-unstyled">
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();" class="nav-link">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
        <div id="panel"  class="col-md-10 pt-5">
            <div>
                <canvas id="staticUser" width="100" height="30"></canvas>
            </div>
        </div>

    </div>
@endsection

@push('js')
    <script src="{{asset('js/panelAjax.js')}}" ></script>
    <script src="{{asset('js/ajaxCalls.js')}}" ></script>
    <script src="{{asset('js/multi.min.js')}}" ></script>
    <script src="{{asset('js/select.js')}}" ></script>
@endpush
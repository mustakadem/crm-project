@extends('layouts.app')

@section('content')
        <div class="col-md-2 jumbotron">
                <nav class="nav flex-column">
                    <a class="nav-link active" href="{{route('customer.home',array('user' =>  Auth::user()))}}">Customers</a>
                    <a class="nav-link" href="#">Product</a>
                    <a class="nav-link" href="#">Statics</a>
                    <a class="nav-link disabled" href="#">Messages</a>
                </nav>
        </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2">
            @include('layouts.panel')
        </div>
        <div id="panel"  class="col-md-10 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{asset('storage/'.$contact->image)}}" alt="" width="150" height="150">
                        <img src="{{$contact->image}}" alt="" width="150" height="150">

                        <p class="h5 pt-2"><strong>{{$contact['name']}} {{$contact['surnames']}}</strong></p>
                    </div>

                    <div class="col-md-3">
                        <p class="h5">email: <strong>{{$contact['email']}}</strong></p>
                        <p class="h5">movil: <strong>{{$contact['movil']}}</strong></p>
                        <p class="h5">address: <strong>{{$contact['address']}}</strong></p>
                    </div>


                    <div class="d-flex justify-content-end">
                        <a href="{{route('contact.edit',array('username' => Auth::user()->username , 'contact' => $contact))}}"><i class="fas fa-edit fa-3x"></i></a>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <div class="row">
                    <p class="h2">Notes: <strong>{{$contact['notes']}}</strong></p>
                </div>
            </div>
        </div>
    </div>
@endsection


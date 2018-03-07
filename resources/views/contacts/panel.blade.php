@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2">
            @include('layouts.panel')
        </div>
        <div id="panel"  class="col-md-10 pt-5">
            <div class="container">
                <ul class="nav nav-tabs mb-5">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('contacts.panel',array('username' => Auth::user()->username))}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="" href="#">Create New Contact</a>
                    </li>
                </ul>
                <div class="row">

                    <h3 class="text-center ">List Of Contacts</h3>
                    <table id="tabla" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Surnames</th>
                            <th>movil</th>
                            <th>email</th>
                            <th>Delete</th>
                            <th>Profile</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Surnames</th>
                            <th>movil</th>
                            <th>email</th>
                            <th>Delete</th>
                            <th>Profile</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @forelse($contacts as $contact)
                            <tr>
                                <td><img src="{{$contact['image']}}" alt=" image of contact {{$contact['name']}}"></td>
                                <td>{{$contact['name']}}</td>
                                <td>{{$contact['surnames']}}</td>
                                <td>{{$contact['movil']}}</td>
                                <td>{{$contact['email']}}</td>

                                <td>
                                    <form action="#" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt fa-2x"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <a   href="#"><i class="far fa-address-card fa-3x"></i></a>
                                </td>
                            </tr>
                        @empty
                            <p>No hay Contactos</p>
                        @endforelse
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    </div>
@endsection



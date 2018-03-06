@extends('layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.css"/>
@endsection
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
                                        <button type="submit" class="btn btn-danger"><img src="https://es.seaicons.com/wp-content/uploads/2017/02/delete-icon-1.png" width="25" height="25" alt=""></button>
                                    </form>
                                </td>
                                <td>
                                    <a class="btn btn-info edit"  href="#"><img  class="edit" src="http://www.tecnovirtual.edu.ec/virtual/pluginfile.php/2005/block_html/content/icon-user.png" width="25" height="25" alt=""></a>
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
@endsection

@push('js')
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.js"></script>
    <script src="{{asset('js/panel.js')}}" ></script>
@endpush


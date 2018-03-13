@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-2">
            @include('layouts.panel')
        </div>
        <div id="panel"  class="col-10 pt-5">
            <div class="container">
                <h3 class="text-center">Edit Contact {{$contact->name}}</h3>
                <div class="col-md-12">
                    <form action="{{route('contact.update',array('contact' => $contact))}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="name">Namel</label><i id="lableName" class=" pl-1 far fa-badge"></i>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control  {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="name" id="name" placeholder="User Name" value="{{ $contact->name }}">
                                        @if ($errors->has('name'))
                                            <div class="invalid-feedback">
                                                <strong class="text-center">{{ $errors->first('name') }}</strong>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="surnames">Surnames</label><i id="lableSurnames" class=" pl-1 far fa-badge"></i>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-info"></i></span>
                                        </div>
                                        <input type="text" class="form-control  {{ $errors->has('surnames') ? ' is-invalid' : '' }}"
                                               name="surnames" id="surnames" placeholder="Contact Surnames" value="{{ $contact->surnames }}">

                                        @if ($errors->has('surnames'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('surnames') }}</strong>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <div class="col">

                                <div class="form-group ">
                                    <label for="email">Email</label><i id="lableEmail" class=" pl-1 far fa-badge"></i>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email" id="email" placeholder="Contact  Email" value="{{ $contact->email}}">
                                        @if ($errors->has('email'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </div>
                                        @endif
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group ">
                                    <label for="address">Address</label><i id="lableAddress" class=" pl-1 far fa-badge"></i>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}"
                                               name="address" id="address" placeholder="Contact Address" value="{{ $contact->address }}">
                                        <div id="errorAddress"></div>
                                        @if ($errors->has('address'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group ">
                                    <label for="movil">Movil</label><i id="lableMovil" class=" pl-1 far fa-badge"></i>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="number" class="form-control {{ $errors->has('movil') ? ' is-invalid' : '' }}"
                                               name="movil" id="movil" min="0" placeholder="Contact Movil" value="{{ $contact->movil }}">
                                        <div id="errorMovil"></div>
                                        @if ($errors->has('movil'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('movil') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col">
                                <div class="form-group ">
                                    <label for="image" >Añadir Imagen</label>
                                    <input type="file" id="image" name="image" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="notes">Notes</label>
                                <textarea name="notes" id="notes" cols="5" rows="5" class="form-control" placeholder="enter Contact notes..">{{ $contact->notes }}</textarea>
                            </div>
                        </div>
                        <div id="button" class=" d-flex justify-content-center">
                            <button class="btn btn-primary" type="submit" >Enviar</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
@endsection


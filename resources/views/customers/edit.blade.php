@extends('layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.css"/>
@endsection
@section('content')
    <div class="row">
        <div class="col-2">
            @include('layouts.panel')
        </div>
        <div id="panel"  class="col-10 pt-5">
            <div class="container">
                <h3 class="text-center ">Update {{$customer['name']}} {{$customer['surnames']}}</h3>
                <div class="col-md-12 pt-4">
                    <form action="{{route('customer.update',array('username' => Auth::user()->username ,'customer' => $customer))}}" method="post" >
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control  {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" placeholder="{{$customer['name']}}"  value="{{old('name')}}">
                                    <div id="errorName"></div>
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="surnames">Surnames</label>
                                    <input type="text" class="form-control  {{ $errors->has('surnames') ? ' is-invalid' : '' }}" name="surnames" id="surnames" placeholder="{{$customer['surnames']}}"  value="{{old('surnames')}}">
                                    <div id="errorSurnames"></div>

                                    @if ($errors->has('surnames'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('surnames') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col">

                                <div class="form-group ">
                                    <label for="email" >Email</label>
                                    <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" placeholder="{{$customer['email']}}"  value="{{old('email')}}">
                                    <div id="errorEmail"></div>

                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group ">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="address" placeholder="{{$customer['address']}}"  value="{{old('address')}}">
                                    <div id="errorAddress"></div>
                                    @if ($errors->has('address'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group ">
                                    <label for="movil">Movil</label>
                                    <input type="number" class="form-control {{ $errors->has('movil') ? ' is-invalid' : '' }}" name="movil" id="movil" min="0" placeholder="{{$customer['movil']}}"  value="{{old('movil')}}">
                                    <div id="errorMovil"></div>
                                    @if ($errors->has('movil'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('movil') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="job_title">Job Title</label>
                                    <input type="text" class="form-control" name="job_title" id="job_title" placeholder="Job Title Customer"  value="{{$customer['job_title']}}">
                                    <div id="errorJob_title"></div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group ">
                                    <label for="type_customer">Type Customer</label>
                                    <select name="type_customer" id="type_customer" class="form-control {{ $errors->has('type_customer') ? ' is-invalid' : '' }}">
                                        <option value="select">Select</option>
                                        <option value="potencial">potencial</option>
                                        <option value="activo">activo</option>
                                        <option value="exporadico">exporadico</option>
                                    </select>
                                    @if ($errors->has('type_customer'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('type_customer') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="company">Company</label>
                                    <input type="text" class="form-control" name="company" id="company" placeholder="Customer Company"  value="{{$customer['company']}}">
                                    <div id="errorCompany"></div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">

                                <div class="form-group ">
                                    <label for="image">Image</label>
                                    <input type="text" class="form-control" name="image" id="image" placeholder="Customer URL image"  value="{{$customer['image']}}">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="notes">Notes</label>
                                <textarea name="notes" id="notes" cols="5" rows="5" class="form-control" placeholder="enter customer notes..">{{$customer['notes']}}</textarea>
                            </div>
                        </div>
                        <div id="button" class=" d-flex justify-content-center">
                            <button class="btn btn-primary" type="submit"  id="buttonForm">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection




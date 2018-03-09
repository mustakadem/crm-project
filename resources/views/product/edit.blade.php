@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{asset('css/multi.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.css"/>
@endsection
@section('content')
    <div class="row">
        <div class="col-2">
            @include('layouts.panel')
        </div>
        <div id="panel"  class="col-10 pt-5">
            <div class="container">
                <h3 class="text-center">Update Product {{$product['name']}}</h3>
                <div class="col-md-12">
                    <form  enctype="multipart/form-data" action="{{route('product.update',array('username' => Auth::user()->username,'product' => $product))}}" method="post" >
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col">
                                <div class="form-group ">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" placeholder="{{ $product['name'] }}"  value="{{$product['name'] }}">
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col">

                                <div class="form-group ">
                                    <label for="image" >Añadir Imagen</label>
                                    <input type="file" id="image" name="image" class="form-control">
                                    @if ($errors->has('image'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group ">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" id="price" min="0" placeholder="{{ $product['price'] }}"  value="{{$product['price']}}">
                                    @if ($errors->has('price'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group ">
                                    <label for="type_product">Type Product</label>
                                    <select name="type_product" id="type_product" class="form-control {{ $errors->has('type_product') ? ' is-invalid' : '' }}">
                                        <option value="select">Select</option>
                                        <option value="servicio">servicio</option>
                                        <option value="bienes">bienes</option>
                                    </select>
                                    @if ($errors->has('type_product'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('type_product') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">

                        </div>
                        <div class="row">

                        </div>
                        <div class="col">
                            <div class="form-group ">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="5" rows="5" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="enter description product">{{ $product['description'] }}</textarea>
                                @if ($errors->has('description'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </div>
                                @endif
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




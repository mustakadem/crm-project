@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="/public/bower_resources/bootstrap-select/dist/css/bootstrap-select.min.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2">
            <nav class="nav flex-column navbar-dark bg-dark pr-5 pb-5 pl-4 position-fixed h-100">
                <a class="nav-link disabled" href="#">Home</a>
                <div class="dropright m-3 btn-group">
                    <span class="button-group-addon" ><img src="http://simpleicon.com/wp-content/uploads/account.svg" width="30" height="30" alt=""></span>
                    <button class="btn dropdown-toggle ml-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Customers
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item btn " href="{{route('customer.home',array('user' =>  Auth::user()))}}">List</a>
                        <a class="dropdown-item" href="{{route('customer.new',array('user' => Auth::user()))}}">Create</a>
                    </div>
                </div>
                <div class="dropright m-3 btn-group">
                    <span class="button-group-addon " ><img src="https://www.peerby.com/img/archetypes/moving_boxes-big.png" width="30" height="30" alt=""></span>
                    <button class="btn dropdown-toggle ml-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Products
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{route('product.list',array('user' => Auth::user()))}}">List</a>
                        <a class="dropdown-item" href="{{route('product.new',array('user' => Auth::user()))}}">Create</a>
                    </div>
                </div>
                <div class="dropright m-3 btn-group">
                    <span class="button-group-addon" ><img src="https://image.flaticon.com/icons/png/512/522/522575.png" width="30" height="30" alt=""></span>
                    <button class="btn dropdown-toggle ml-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Bills
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item btn " href="{{route('customer.home',array('user' =>  Auth::user()))}}">List</a>
                        <a class="dropdown-item" href="{{route('bill.new',array('user' => Auth::user()->username))}}">Create</a>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="nav-link " href="#">Statics</a>
                <a class="nav-link" href="#">Messages</a>
            </nav>
        </div>
        <div class="container pt-5 ">
            <h3 class="text-center">Created New Product</h3>
            <div class="col-md-10 m-3">
                <form action="{{route('bill.store',array('user' =>  Auth::user()))}}" method="post" >
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col">
                            <div class="form-group ">
                                <label for="customer">Customer</label>
                                <select name="customer" id="customer"  class="selectpicker show-menu-arrow" multiple="multiple" data-style="form-control"  data-style="form-control" data-live-search="true">
                                    @forelse($customers as $customer)
                                        <option data-tokens="{{$customer['name']}}" value="{{$customer['id']}}">
                                           {{$customer['name']}}
                                        </option>
                                     @empty
                                            <option value="null" selected>No Tienes Clientes</option>
                                   @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="col">

                            <div class="form-group ">
                                <label for="name">Products</label>
                                <select name="product" id="product" class="selectpicker multiple">
                                    @forelse($products as $product)
                                        <option value="{{$product['id']}}">
                                            {{$product['name']}}
                                        </option>
                                    @empty
                                        <option value="null" selected>No Tienes Productos</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group ">
                                <label for="price">Price</label>
                                <input type="number" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" id="price" min="0" placeholder="Product Price"  value="{{ old('price') }}">
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
                            <textarea name="description" id="description" cols="5" rows="5" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="enter description product">{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Enviar</button>

                </form>
            </div>
        </div>
@endsection

@section('js')
            <script src="/public/bower_resources/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
            <script src="/public/js/select.js"></script>
@endsection
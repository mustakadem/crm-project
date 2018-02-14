@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-md-2">
            <nav class="nav flex-column navbar-dark bg-dark mt-5 position-fixed h-100">
                <a class="nav-link  " href="{{route('user.home')}}">Home</a>
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
                    </div>
                </div>
                <div class="dropright m-3 btn-group">
                    <span class="button-group-addon" ><img src="https://image.flaticon.com/icons/png/512/522/522575.png" width="30" height="30" alt=""></span>
                    <button class="btn dropdown-toggle ml-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Bills
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item btn " href="{{route('bills.list',array('user' =>  Auth::user()->username))}}">List</a>
                        <a class="dropdown-item" href="{{route('bill.new',array('user' => Auth::user()->username))}}">Create</a>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="nav-link " href="#">Statics</a>
                <a class="nav-link" href="#">Messages</a>
            </nav>
        </div>
        <div class="container pt-5 mt-5">
            <h3 class="text-center">Created New Product</h3>
            <div class="col-md-12">
                <form action="{{route('product.store',array('user' =>  Auth::user()))}}" method="post" >
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col">
                            <div class="form-group ">
                                <label for="name">Name</label>
                                <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" placeholder="Product Name"  value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col">

                            <div class="form-group ">
                                <label for="image">Image</label>
                                <input type="text" class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" id="image" placeholder="Customer URL image"  value="{{ old('image') }}">
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
    </div>
@endsection

@section('js')
    <script src="{{asset('ajaxCalls.jsls.js')}}"> </script>

@endsection
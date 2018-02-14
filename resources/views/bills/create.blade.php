@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{asset('css/multi.min.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2">
            <nav class="nav flex-column navbar-dark bg-dark  mt-5 position-fixed h-100">
                <a class="nav-link" href="{{route('user.home')}}">Home</a>
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
                        <a class="dropdown-item btn " href="{{route('bill.new',array('user' =>  Auth::user()))}}">List</a>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="nav-link " href="#">Statics</a>
                <a class="nav-link" href="#">Messages</a>
            </nav>
        </div>
        <div class="col-md-8">
        <div class="container pt-5 mt-5 ">
            <div class="w-50">
            <h3 class="text-center">Created New Bill</h3>
                <form action="{{route('bill.store',array('user' =>  Auth::user()))}}" method="post" >
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col">
                            <div class="form-group ">
                                <label for="customer">Customer</label>
                                <select name="customer" id="customer"  class="custom-select" >
                                    @forelse($customers as $customer)
                                        <option data-tokens="{{$customer['name']}}" value="{{$customer['id']}}">
                                           {{$customer['name']}}
                                        </option>
                                     @empty
                                            <option value="null" selected>No Tienes Clientes</option>
                                   @endforelse
                                </select>
                            </div>

                            <div class="form-group ">
                                <label for="products">Prducts</label>
                                <select name="products[]" id="products" multiple="multiple">
                                    @forelse($products as $product)
                                        <option data-token="{{$product['name']}}" value="{{$product['id']}}">
                                            {{$product['name']}}   <------------->   {{$product['price']}}$
                                        </option>
                                    @empty
                                        <option value="null" selected>No Tienes Productos</option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="form-group ">
                                <label for="price">Price</label>
                                <input type="text" readonly class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" id="price"   value="{{ old('price') }}">
                                @if ($errors->has('price'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group ">
                                <label for="discount">Discount</label>
                                <input type="number" class="form-control {{ $errors->has('discount') ? ' is-invalid' : '' }}" name="discount" id="discount" min="0" placeholder="Optional Discount"  value="{{ old('discount') }}">
                                @if ($errors->has('discount'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('discount') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group ">
                                <label for="total">Total</label>
                                <input type="text" readonly class="form-control {{ $errors->has('total') ? ' is-invalid' : '' }}" name="total" id="total" min="0" placeholder="Total Products Price"  value="{{ old('total') }}">
                                @if ($errors->has('total'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('total') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Create Bill</button>

                </form>
                </div>
        </div>
    </div>
    </div>
@endsection

@push('js')
             <script src="{{asset('js/ajaxCalls.js')}}"></script>
            <script src="{{asset('js/multi.min.js')}}"></script>
            <script src="{{asset('js/select.js')}}"></script>

@endpush
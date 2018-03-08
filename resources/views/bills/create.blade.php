
<div class="container">
    <ul class="nav nav-tabs mb-5">
        <li class="nav-item">
            <a class="nav-link " id="homeBill" href="{{route('bill.panel',array('username' => Auth::user()->username))}}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " id="listBill" href="#">List Bills</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" id="newBill" href="#">Create New Bill</a>
        </li>
    </ul>
            <div class="w-50 align-content-center">
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
                                <label for="products">Products</label><i id="labelProduct" class=" pl-1 far fa-badge"></i>
                                <select name="products[]" id="products" multiple="multiple">
                                    @forelse($products as $product)
                                        <option data-token="{{$product['name']}}" value="{{$product['id']}}">
                                            {{$product['name']}}   <------------->   {{$product['price']}}$
                                        </option>
                                    @empty
                                        <option value="null" selected>No Tienes Productos</option>
                                    @endforelse
                                </select>
                           <div id="errorProduct"></div>
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
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary" id="buttonForm"  type="submit">Create Bill</button>
                    </div>

                </form>
                </div>
        </div>


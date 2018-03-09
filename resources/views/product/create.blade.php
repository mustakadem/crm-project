<div class="container">
    <ul class="nav nav-tabs mb-5">
        <li class="nav-item">
            <a class="nav-link " id="homeProduct" href="{{route('product.panel',array('username' => Auth::user()->username))}}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" id="newProduct" href="#">Create New Product</a>
        </li>
    </ul>
            <h3 class="text-center">Created New Product</h3>
            <div class="col-md-12">
                <form action="{{route('product.store',array('user' =>  Auth::user()))}}" method="post" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col">
                            <div class="form-group ">
                                <label  for="name">Name</label><i id="labelName" class=" pl-1 far fa-badge"></i>
                                <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" placeholder="Product Name"  value="{{ old('name') }}">
                                <div id="errorName"></div>
                            @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col">

                            <div class="form-group ">
                                <label for="image" >Añadir Imagen</label><i id="labelImage" class=" pl-1 far fa-badge"></i>
                                 <input type="file" id="image" name="image" class="form-control">

                                <div id="errorImage"></div>

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
                                <label for="price">Price</label><i id="labelPrice" class=" pl-1 far fa-badge"></i>
                                <input type="number" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" id="price" min="0" placeholder="Product Price"  value="{{ old('price') }}">

                                <div id="errorPrice"></div>
                                @if ($errors->has('price'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group ">
                                <label for="type_product">Type Product</label><i id="labelType_product" class=" pl-1 far fa-badge"></i>
                                <select name="type_product" id="type_product" class="form-control {{ $errors->has('type_product') ? ' is-invalid' : '' }}">
                                    <option value="select">Select</option>
                                    <option value="servicio">servicio</option>
                                    <option value="bienes">bienes</option>
                                </select>
                                <div id="errorType_product"></div>

                            @if ($errors->has('type_product'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('type_product') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group ">
                            <label for="description">Description</label><i id="labelDescription" class=" pl-1 far fa-badge"></i>
                            <textarea name="description" id="description" cols="5" rows="5" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="enter description product">{{ old('description') }}</textarea>
                            <div id="errorDescription"></div>
                        @if ($errors->has('description'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div id="button" class=" d-flex justify-content-center">
                        <button class="btn btn-primary" disabled type="submit"  id="buttonForm">Enviar</button>
                    </div>
                </form>
            </div>
        </div>

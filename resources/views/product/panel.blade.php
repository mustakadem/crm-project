@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2">
            @include('layouts.panel')
        </div>
        <div id="panel" class="col-md-10 pt-5">
            <div class="container">
                <ul class="nav nav-tabs mb-5">
                    <li class="nav-item">
                        <a class="nav-link active" id="homeProduct"
                           href="{{route('product.panel',array('username' => Auth::user()->username))}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="newProduct" href="#">Create New Product</a>
                    </li>
                </ul>
                <h3 class="text-center bg-info">List Of Products</h3>
                <div class="row m-2">
                    @forelse($data as $datum)

                        <div class="col-4 mb-3">
                            <!--Card-->
                            <div class="card card-cascade">
                                <!--Card image-->
                                @foreach($datum as $key => $item)
                                    @if($key == 'imagenes')

                                        <div id="imagesProduct" class="carousel slide" data-ride="carousel">

                                            <!-- Indicators -->
                                            <ul class="carousel-indicators">
                                                @for($i = 0 ; $i < count($item) ; $i++)
                                                    <li data-target="#imagesProduct" data-slide-to="{{$i+1}}"></li>
                                                @endfor

                                            </ul>

                                            <!-- The slideshow -->
                                            <div class="carousel-inner" id="elementCarousel">
                                                @forelse($item as $image)
                                                    <div class="carousel-item @if($loop->first) active @endif ">
                                                        <img src="{{asset('storage/'.$image->path)}}" alt=""
                                                             height="300" width="600">
                                                        <img src="{{$image->path}}" alt="" height="300" width="600">
                                                    </div>
                                                @empty
                                                    <p>No hay imagenes</p>
                                                @endforelse

                                            </div>

                                            <!-- Left and right controls -->
                                            <a class="carousel-control-prev " href="#imagesProduct" data-slide="prev">
                                                <span class="carousel-control-prev-icon"></span>
                                            </a>
                                            <a class="carousel-control-next " href="#imagesProduct" data-slide="next">
                                                <span class="carousel-control-next-icon"></span>
                                            </a>

                                        </div>
                                    @endif
                                    @if($key == 'producto')
                                        <div class="card-body">
                                            <h4 class="text-center">Product ID#{{$item['id']}}</h4>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="card-text">Name:
                                                        <br>
                                                        <strong>{{$item['name']}}</strong>
                                                    </p>
                                                </div>

                                                <div class="col">
                                                    <p class="card-text">Price:
                                                        <br>
                                                        <strong>{{$item['price']}}$</strong>
                                                    </p>

                                                </div>
                                                <div class="col">
                                                    <p class="card-text">Type Product:
                                                        <br>
                                                        <strong>{{$item['type_product']}}$</strong>
                                                    </p>

                                                </div>
                                            </div>

                                        </div>

                                        <div id="option" class="d-flex justify-content-around">
                                            <button type="submit" class="btn btn-danger"><i
                                                        class="far fa-trash-alt fa-2x" data-toggle="modal"
                                                        data-target="#deleteProduct"></i></button>
                                            @include('product.modalDelete')

                                            <button class="btn btn-success" type="button" data-toggle="collapse"
                                                    data-target="#infoProduct{{$item['id']}}" aria-expanded="false"
                                                    aria-controls="collapse Porduct"><i
                                                        class="fas fa-info-circle fa-3x"></i></button>

                                            <a class="btn btn-info"
                                               href="{{route('product.profile',array('username' => Auth::user()->username , 'product' => $item))}}"><i
                                                        class="fas fa-box fa-2x"></i></a>
                                        </div>
                                        <br>
                                            <div class="collapse" id="infoProduct{{$item['id']}}">
                                                <div class="card card-body">
                                                    <div class="row">
                                                        <div class="col text-center">
                                                            <p>Description</p>
                                                            <strong>
                                                                {{$item->description}}
                                                            </strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <div id="footerCard" class="flex-row bg-secondary text-center">
                                            <p>Created: <strong class="align-text-top">{{$item['created_at']}}</strong>
                                            </p>
                                        </div>




                                    @endif
                                @endforeach
                            </div>
                        </div>

                    @empty
                        <p>No hay Productos</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>






@endsection

@push('js')
    <script src="{{asset('js/panelProduct.js')}}"></script>
@endpush


<div class="container">
    <ul class="nav nav-tabs mb-5">
        <li class="nav-item">
            <a class="nav-link " id="homeProduct" href="{{route('product.panel',array('username' => Auth::user()->username))}}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" id="listProduct" href="#">List Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="newProduct" href="#">Create New Product</a>
        </li>
    </ul>

                <h3 class="text-center bg-info">List Of Products</h3>
                <div class="row m-2">
                    @forelse($products as $product)
                        <div class="col-md-4 mb-3">
                            <!--Card-->
                            <div class="card card-cascade">
                                <!--Card image-->
                                <img class="card-img-top" src="{{$product['image']}}" alt="Card image of product {{$product['name']}}">
                                <!--/Card image-->

                                <!--Card content-->
                                <div class="card-body">
                                    <h4 class="text-center">Product  ID#{{$product['id']}}</h4>
                                    <p class="card-text">Name: <br><strong>{{$product['name']}}</strong></p>
                                    <p class="card-text">Description: <br> <strong>{{$product['description']}}</strong></p>
                                    <p class="card-text">Price: <br><strong>{{$product['price']}}$</strong></p>
                                    <p class="card-text">Type Product: <br><strong>{{$product['type_product']}}</strong></p>
                                </div>

                                <div id="option" class="d-flex justify-content-around">
                                    <form action="{{route('product.delete',array('username' => Auth::user()->username ,'id' => $product['id']))}}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit"  class="btn btn-danger"><i class="far fa-trash-alt fa-2x"></i></button>
                                    </form>
                                    <a class="btn btn-info" href="{{route('product.profile',array('username' => Auth::user()->username , 'product' => $product))}}"><i class="fas fa-box fa-2x"></i></a>
                                </div>
                                <br>
                                <div id="footerCard" class="flex-row bg-secondary text-center">
                                    <p>Created: <strong class="align-text-top">{{$product['created_at']}}</strong></p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No hay Productos</p>
                    @endforelse

                </div>
    <div class="d-flex justify-content-center">
        {{$products->links()}}
    </div>
</div>
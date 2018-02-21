<div class="container">
    <ul class="nav nav-tabs mb-5">
        <li class="nav-item">
            <a class="nav-link " id="homeProduct" href="#">Home</a>
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
                                    <form action="{{route('product.delete',array('id' => $product['id']))}}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger"><img src="https://es.seaicons.com/wp-content/uploads/2017/02/delete-icon-1.png" width="25" height="25" alt=""></button>
                                    </form>                                    <a class="btn btn-success" href="#"><img src="https://cdn0.iconfinder.com/data/icons/social-messaging-ui-color-shapes/128/write-circle-green-256.png" width="25" height="25" alt=""></a>
                                    <a class="btn btn-info" href="#"><img src="http://pgatinasycamisetasshop.com/wp-content/uploads/2015/05/icono_paquetes.png" width="25" height="25" alt=""></a>
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
</div>
<div class="container">

    <ul class="nav nav-tabs mb-5">
        <li class="nav-item">
            <a class="nav-link " href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" id="listCustomer" href="#">List Customers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="newCustomer"  href="#">Create New Customer</a>
        </li>
    </ul>

    <h3 class="text-center bg-info">List Of Costumers</h3>
    <div class="row m-2 ">
    @forelse($customers as $customer)
                <div class="col-md-4 mb-3">
                    <!--Card-->
                    <div class="card card-cascade">
                        <!--Card image-->
                        <img class="card-img-top" src="{{$customer['image']}}" alt="Card image of customer {{$customer['name']}}">
                        <!--/Card image-->

                        <!--Card content-->
                        <div class="card-body">
                            <h4 class="text-center">Customers  ID#{{$customer['id']}}</h4>
                            <p class="card-text">Name: <br><strong>{{$customer['name']}} {{$customer['surnames']}}</strong></p>
                            <p class="card-text">Type Customer: <br><strong>{{$customer['type_customers']}}</strong></p>
                            <div id="option" class="d-flex justify-content-around">
                                <form action="{{route('customer.delete',array('id' => $customer['id']))}}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger"><img src="https://es.seaicons.com/wp-content/uploads/2017/02/delete-icon-1.png" width="25" height="25" alt=""></button>
                                </form>
                                <a class="btn btn-success" href="#"><img src="https://cdn0.iconfinder.com/data/icons/social-messaging-ui-color-shapes/128/write-circle-green-256.png" width="25" height="25" alt=""></a>
                                <a class="btn btn-info" href="#"><img src="http://www.tecnovirtual.edu.ec/virtual/pluginfile.php/2005/block_html/content/icon-user.png" width="25" height="25" alt=""></a>
                            </div>
                        </div>
                        <div id="footerCard" class=" bg-secondary text-center">
                            <p>Created: <strong class="align-text-top">{{$customer['created_at']}}</strong></p>
                        </div>
                        <!--/.Card content-->
                    </div>
                </div>
    @empty
    <p>No hay Clientes</p>
    @endforelse
    </div>
</div>


<div class="container">
    <ul class="nav nav-tabs mb-5">
        <li class="nav-item">
            <a class="nav-link " id="homeBill" href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" id="listBill" href="#">List Bills</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="newBill" href="#">Create New Bill</a>
        </li>
    </ul>
                <h3 class="text-center bg-info">List Bills</h3>
                <div class="row m-2">
                    @forelse($bills as $bill)
                        <div class="col-md-4 mb-3">
                            <!--Card-->
                            <div class="card card-cascade">
                                <div class="card-body">
                                    <h4 class="text-center">Bill Number #{{$bill['id']}}</h4>
                                    <p class="card-text">Price: <br><strong>{{$bill['price']}}$</strong></p>
                                    <p class="card-text">Discount: <br><strong>{{ $bill['discount'] ? $bill['discount'] : '0' }}$</strong></p>
                                    <p class="card-text">Total: <br><strong>{{$bill['total']}}$</strong></p>

                                    <div id="option" class="d-flex justify-content-around">
                                        <a class="btn btn-danger" href="#"><img src="https://es.seaicons.com/wp-content/uploads/2017/02/delete-icon-1.png" width="25" height="25" alt=""></a>
                                        <a class="btn btn-success" href="#"><img src="https://cdn0.iconfinder.com/data/icons/social-messaging-ui-color-shapes/128/write-circle-green-256.png" width="25" height="25" alt=""></a>
                                        <a class="btn btn-info" href="#"><img src="http://www.tecnovirtual.edu.ec/virtual/pluginfile.php/2005/block_html/content/icon-user.png" width="25" height="25" alt=""></a>
                                    </div>
                                </div>
                                <div id="footerCard" class=" bg-secondary text-center">
                                    <p>Created: <strong class="align-text-top">{{$bill['created_at']}}</strong></p>
                                </div>
                                <!--/.Card content-->
                            </div>
                        </div>
                    @empty
                        <p>No hay Clientes</p>
                    @endforelse
                </div>
            </div>

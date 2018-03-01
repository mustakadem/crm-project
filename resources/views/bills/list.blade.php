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
                                    <h4 class="text-center">Bill  ID#{{$bill['id']}}</h4>
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col">Price</th>
                                            <th scope="col">Discount</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{$bill['price']}}$</td>
                                            <td>{{ $bill['discount'] ? $bill['discount'] : '0' }}$</td>
                                            <td>{{$bill['total']}}$</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <div id="option" class="d-flex justify-content-around">
                                        <a class="btn btn-danger" href="#"><img src="https://es.seaicons.com/wp-content/uploads/2017/02/delete-icon-1.png" width="25" height="25" alt=""></a>
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

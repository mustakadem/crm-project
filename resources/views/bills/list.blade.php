<div class="container">
    <ul class="nav nav-tabs mb-5">
        <li class="nav-item">
            <a class="nav-link " id="homeBill" href="{{route('bill.panel',array('username' => Auth::user()->username))}}">Home</a>
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
                                        <form action="{{route('bill.delete',array('id' => $bill['id']))}}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit"  class="btn btn-danger"><i class="far fa-trash-alt fa-2x"></i></button>
                                        </form>
                                        <a  href="#" ><i class="fas fa-tag fa-3x" data-toggle="modal" data-target="#perfilBillModal{{$bill->id}}"></i></a>
                                    </div>
                                </div>
                                <div id="footerCard" class=" bg-secondary text-center">
                                    <p>Created: <strong class="align-text-top">{{$bill['created_at']}}</strong></p>
                                </div>
                                <!--/.Card content-->
                            </div>
                        </div>
                        @include('bills.profile')
                    @empty
                        <p>No hay Facturas</p>
                    @endforelse
                </div>
            </div>

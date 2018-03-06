<div class="container">

    <ul class="nav nav-tabs mb-5">
        <li class="nav-item">
            <a class="nav-link" id="homeCostumer" href="{{route('customer.panel',array('username' => Auth::user()->username))}}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" id="listCustomer" href="#">List Customers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="newCustomer"  href="#">Create New Customer</a>
        </li>
    </ul>

    <h3 class="text-center bg-info">List Of Costumers</h3>
        <table id="tabla" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Surnames</th>
            <th>movil</th>
            <th>Company</th>
            <th>Job Title</th>
            <th>Type Customer</th>
            <th>Delete</th>
            <th>Profile</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Surnames</th>
            <th>movil</th>
            <th>Company</th>
            <th>Job Title</th>
            <th>Type Customer</th>
            <th>Delete</th>
            <th>Profile</th>
        </tr>
        </tfoot>
        <tbody>
    @forelse($customers as $customer)
                    <tr>
                        <td><img src="{{$customer['image']}}" alt=" image of customer {{$customer['name']}}"></td>
                        <td>{{$customer['name']}}</td>
                        <td>{{$customer['surnames']}}</td>
                        <td>{{$customer['movil']}}</td>
                        <td>{{$customer['company']}}</td>
                        <td>{{$customer['job_title']}}</td>
                        <td>{{$customer['type_customers']}}</td>
                        <td>
                            <form action="{{route('customer.delete',array('id' => $customer['id']))}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger"><img src="https://es.seaicons.com/wp-content/uploads/2017/02/delete-icon-1.png" width="25" height="25" alt=""></button>
                            </form>
                        </td>
                        <td>
                            <a class="btn btn-info"  href="{{route('customer.profile',array('username' => Auth::user()->username , 'customer' => $customer))}}"><img  class="edit" src="http://www.tecnovirtual.edu.ec/virtual/pluginfile.php/2005/block_html/content/icon-user.png" width="25" height="25" alt=""></a>
                        </td>
                    </tr>
    @empty
    <p>No hay Clientes</p>
    @endforelse
        </tbody>
        </table>
</div>
@include('customers.profile')




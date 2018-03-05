<nav class="nav flex-column navbar-dark bg-dark pt-1 position-fixed h-100">
    <div class="text-center">

        <a href="{{route('user.profile',array('username' => Auth::user()->username))}}" id="buttonProfile" class="nav-link"><img src="{{Auth::user()->avatar}}" alt="user image" class="rounded-circle">
            <p class="bg-info">hellow!! <strong>{{Auth::user()->name}}</strong></p></a>
        <input type="hidden" id="username" value="{{Auth::user()->username}}">
    </div>
    <a class="nav-link" href="{{route('user.home')}}">Home</a>
    <div class="dropright m-3 btn-group">
        <span class="button-group-addon" ><img src="http://www.onsiteinspecting.com/wp-content/uploads/2016/02/male-user.png" width="30" height="30" alt=""></span>
        <a class="btn ml-2 text-dark" type="button" id="buttonCustomer"  aria-haspopup="true"  href="{{route('customer.panel', array('username'=> Auth::user()->username))}}" aria-expanded="false">
            Customers
        </a>
    </div>
    <div class="dropright m-3 btn-group">
        <span class="button-group-addon " ><img src="https://www.peerby.com/img/archetypes/moving_boxes-big.png" width="30" height="30" alt=""></span>
        <a class="btn ml-2 text-dark" type="button" id="buttonProduct"  href="{{route('product.panel',array('username' => Auth::user()->username))}}" aria-haspopup="true" aria-expanded="false">
            Products
        </a>
    </div>
    <div class="dropright m-3 btn-group">
        <span class="button-group-addon" ><img src="https://image.flaticon.com/icons/png/512/522/522575.png" width="30" height="30" alt=""></span>
        <a class="btn  ml-2 text-dark" type="button" id="buttonBill" href="{{route('bill.panel',array('username' => Auth::user()->username))}}"  aria-haspopup="true" aria-expanded="false">
            Bills
        </a>
    </div>
    <div class="dropdown-divider"></div>
    <a class="nav-link " href="#">Calendar</a>
    <a class="nav-link" href="#">Contacts</a>
    <ul class="menu vertical list-unstyled">
        <li>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();" class="nav-link">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</nav>
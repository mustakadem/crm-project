

<nav class="nav  flex-column navbar-dark bg-dark pt-1 position-fixed ">
    <div class="text-center">

        <a href="{{route('user.profile',array('username' => Auth::user()->username))}}" id="buttonProfile" class="nav-link"><img src="{{Auth::user()->avatar}}" alt="user image" class="rounded-circle">
            <p class="bg-info">hellow!! <strong>{{Auth::user()->name}}</strong></p></a>
        <input type="hidden" id="username" value="{{Auth::user()->username}}">
    </div>
    <a class="nav-link" href="{{route('user.home')}}"><i class="fas fa-home"></i> Home</a>
    <div class="dropright m-3 btn-group">
        <span class="button-group-addon " ><i class="fas  fa-id-badge fa-3x"></i></span>
        <a class="btn ml-2 text-dark" type="button" id="buttonCustomer"  aria-haspopup="true"  href="{{route('customer.panel', array('username'=> Auth::user()->username))}}" aria-expanded="false">
            Customers
        </a>
    </div>
    <div class="dropright m-3 btn-group">
        <span class="button-group-addon " ><i class="fas fa-dolly fa-2x"></i></span>
        <a class="btn ml-2 text-dark" type="button" id="buttonProduct"  href="{{route('product.panel',array('username' => Auth::user()->username))}}" aria-haspopup="true" aria-expanded="false">
            Products
        </a>
    </div>
    <div class="dropright m-3 btn-group">
        <span class="button-group-addon" ><i class="fas fa-clipboard-list fa-3x"></i></span>
        <a class="btn  ml-2 text-dark" type="button" id="buttonBill" href="{{route('bill.panel',array('username' => Auth::user()->username))}}"  aria-haspopup="true" aria-expanded="false">
            Bills
        </a>
    </div>
    <div class="dropdown-divider"></div>
    <a class="nav-link " href="#"><i class="far fa-calendar-alt"></i> Calendar</a>
    <a class="nav-link" href="{{route('contacts.panel',array('username' => Auth::user()->username))}}"><i class="far fa-address-book"></i> Contacts</a>
    <ul class="menu vertical list-unstyled">
        <li>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();" class="nav-link">
                <i class="fas fa-sign-out-alt"></i>   Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</nav>
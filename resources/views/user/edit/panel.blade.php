
<div class="container  ">
    <ul class="nav nav-tabs mb-5 justify-content-center">
        <li class="nav-item">
            <a class="nav-link " id="homeProfile" href="{{route('product.panel',array('username' => Auth::user()->username))}}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " id="Objectives" href="#">Objectives</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" id="editData" href="#">Edit Data</a>
        </li>
    </ul>
    <div class="row">
        <div class="row col-md-2">
        <ul class="list-group d-flex justify-content-start">
            <li class="list-group-item "><a href="{{route('user.edit',array('username'=>Auth::user()->username))}}">Edit Data</a></li>
            <li class="list-group-item"><a href="{{route('edit.password')}}">Edit Password</a></li>
            <li class="list-group-item"><a href="{{route('edit.avatar')}}">Edit avatar</a></li>
        </ul>
        </div>
        <div class="col-md-10">
            <form action="{{ Request::url() }}" method="POST">
                {{ csrf_field() }}


                @if( Request::is('profile/account') )
                    @include('user.edit.avatar')
                @elseif( Request::is('/home/edit/password') )
                    @include('user.edit.password')
                @elseif( Request::is('/home/profile/'.Auth::user()->username.'/edit') )
                    @include('user.edit.avatar')
                @endif


            </form>
        </div>
    </div>
</div>

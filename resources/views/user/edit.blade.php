@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <nav class="nav flex-column navbar-dark bg-dark  mt-5 position-fixed h-100">
                <a class="nav-link " href="{{route('user.home')}}">Home</a>
                <div class="dropright m-3 btn-group">
                    <span class="button-group-addon" ><img src="http://simpleicon.com/wp-content/uploads/account.svg" width="30" height="30" alt=""></span>
                    <button class="btn dropdown-toggle ml-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Customers
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item btn " href="{{route('customer.home',array('user' =>  Auth::user()))}}">List</a>
                        <a class="dropdown-item" href="{{route('customer.new',array('user' => Auth::user()))}}">Create</a>
                    </div>
                </div>
                <div class="dropright m-3 btn-group">
                    <span class="button-group-addon " ><img src="https://www.peerby.com/img/archetypes/moving_boxes-big.png" width="30" height="30" alt=""></span>
                    <button class="btn dropdown-toggle ml-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Products
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{route('product.list',array('user' => Auth::user()))}}">List</a>
                        <a class="dropdown-item" href="{{route('product.new',array('user' => Auth::user()))}}">Create</a>
                    </div>
                </div>
                <div class="dropright m-3 btn-group">
                    <span class="button-group-addon" ><img src="https://image.flaticon.com/icons/png/512/522/522575.png" width="30" height="30" alt=""></span>
                    <button class="btn dropdown-toggle ml-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Bills
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item btn " href="{{route('bills.list',array('user' =>  Auth::user()->username))}}">List</a>
                        <a class="dropdown-item" href="{{route('bill.new',array('user' => Auth::user()->username))}}">Create</a>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="nav-link " href="#">Statics</a>
                <a class="nav-link" href="#">Messages</a>
            </nav>
        </div>
    <div class="container ">
        <div class="col-md-10 m-5 p-5">
        <h3 class="text-center">Edit User</h3>
        <form action="{{route('user.update',array('id'=>Auth::user()->id))}}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="col">
            <div class="row">
                <div class="form-group @if( $errors->has('name'))has-error @endif">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name"  value="{{ Auth::user()->name}}">
                    @if ($errors->has('name'))
                        <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
                    @endif
                </div>
                <div class="form-group @if( $errors->has('surname'))has-error @endif">
                    <label for="surnames">Surnames</label>
                    <input type="text" class="form-control" name="surname" id="surname" placeholder="Surnames"  value="{{ Auth::user()->surnames }}">
                    @if ($errors->has('surname'))
                        <span class="help-block">
                      <strong>{{ $errors->first('surname') }}</strong>
                  </span>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="avatar">Avatar</label>
                    <input type="text" class="form-control" name="avatar" id="avatar" placeholder="User URL image"  value="{{ Auth::user()->avatar }}">
                </div>
            </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="form-group @if( $errors->has('movil'))has-error @endif">
                        <label for="movil">Movil</label>
                        <input type="number" class="form-control" name="movil" id="movil" min="0" placeholder="Movil"  value="{{Auth::user()->movil}}">
                        @if ($errors->has('movil'))
                            <span class="help-block">
                      <strong>{{ $errors->first('movil') }}</strong>
                  </span>
                        @endif
                    </div>
                    <div class="form-group @if( $errors->has('email'))has-error @endif">
                        <label for="email" >Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email"  value="{{ Auth::user()->email }}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
                        @endif
                    </div>

                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="form-group">
                        <label for="sector">Sector</label>
                        <input type="text" class="form-control" name="sector" id="sector" placeholder="Sector"  value="{{ Auth::user()->sector }}">
                    </div>
                    <div class="form-group">
                        <label for="website">WebSite</label>
                        <input type="text" class="form-control" name="website" id="website" placeholder="WebSite"  value="{{ Auth::user()->website}}">
                    </div>
                </div>

            </div>

            <button class="btn btn-primary" type="submit">Enviar</button>
        </form>

        </div>
    </div>
    </div>


@endsection



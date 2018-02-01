@extends('layouts.app')

@section('menu')
    <ol class="breadcrumb">
        <li><a href="{{route('raiz')}}">Home</a></li>
        <li><a href="#">Customers List</a></li>
        <li class="active">New</li>
    </ol>
@endsection
@section('content')
    <div class="row">
    <div class="col-md-2 jumbotron">
        <nav class="nav flex-column">
            <a class="nav-link" href="{{route('user.home')}}">Home</a>
            <a class="nav-link" href="{{route('customer.home',array('user' =>  Auth::user()))}}">Costumers</a>
            <a class="nav-link active" href="#">Create Customer</a>
        </nav>
    </div>
    <div class="container">
        <h3 class="text-center">Created New Customer</h3>
        <div class="col-md-10">
        <form action="{{route('customer.store',array('user' =>  Auth::user()))}}" method="post">
            {{ csrf_field() }}


        <div class="row">
            <div class="col">
                <div class="form-group {{ $errors->has('name') ? ' is-invalid' : '' }}">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Customer Name"  value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
                    @endif
                </div>
            </div>

            <div class="col">
                <div class="form-group {{ $errors->has('surnames') ? ' is-invalid' : '' }}">
                    <label for="surnames">Surnames</label>
                    <input type="text" class="form-control" name="surnames" id="surnames" placeholder="Customer Surnames"  value="{{ old('surnames') }}">
                    @if ($errors->has('surnames'))
                        <span class="invalid-feedback">
                      <strong>{{ $errors->first('surnames') }}</strong>
                  </span>
                    @endif
                </div>
            </div>
            <div class="col">

                <div class="form-group {{ $errors->has('email') ? ' is-invalid' : '' }}">
                    <label for="email" >Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Customer Email"  value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group {{ $errors->has('address') ? ' is-invalid' : '' }}">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Customer Address"  value="{{ old('address') }}">
                    @if ($errors->has('address'))
                        <span class="invalid-feedback">
                      <strong>{{ $errors->first('address') }}</strong>
                  </span>
                    @endif
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="number">Number</label>
                    <input type="number" class="form-control" name="number" id="number" min="0" placeholder="Customer Number"  value="{{ old('number') }}">
                </div>
            </div>
           <div class="col">
               <div class="form-group {{ $errors->has('movil') ? ' is-invalid' : '' }}">
                   <label for="movil">Movil</label>
                   <input type="number" class="form-control" name="movil" id="movil" min="0" placeholder="Customer Movil"  value="{{ old('movil') }}">
                   @if ($errors->has('movil'))
                       <span class="invalid-feedback">
                      <strong>{{ $errors->first('movil') }}</strong>
                  </span>
                   @endif
               </div>
           </div>
        </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="job_title">Job Title</label>
                        <input type="text" class="form-control" name="job_title" id="job_title" placeholder="Job Title Customer"  value="{{ old('job_title') }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group {{ $errors->has('type_customers') ? ' is-invalid' : '' }}">
                        <label for="type_customer">Type Customer</label>
                        <select name="type_customer" id="type_customer" class="form-control">
                            <option value="select">Select</option>
                            <option value="potencial">potencial</option>
                            <option value="activo">activo</option>
                            <option value="exporadico">exporadico</option>
                        </select>
                        @if ($errors->has('type_customers'))
                            <span class="invalid-feedback">
                      <strong>{{ $errors->first('type_customers') }}</strong>
                  </span>
                        @endif
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="company">Company</label>
                        <input type="text" class="form-control" name="company" id="company" placeholder="Customer Company"  value="{{ old('company') }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <div class="form-group ">
                        <label for="image">Image</label>
                        <input type="text" class="form-control" name="image" id="image" placeholder="Customer URL image"  value="{{ old('image') }}">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="notes">Notes</label>
                    <textarea name="notes" id="notes" cols="5" rows="5" class="form-control" placeholder="enter customer notes..">{{ old('notes') }}</textarea>
                </div>
            </div>
                <button class="btn btn-primary" type="submit">Enviar</button>

        </form>
        </div>
    </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('js/validacion.js')}}"> </script>

@endsection
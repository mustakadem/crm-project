@extends('layouts.app')

@section('menu')
    <ol class="breadcrumb">
        <li><a href="{{route('raiz')}}">Home</a></li>
        <li><a href="{{route('customer.list')}}">Customers List</a></li>
        <li class="active">New</li>
    </ol>
@endsection
@section('content')
    <div class="container">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked">
                <li role="presentation"><a href="#">Home</a></li>
                <li role="presentation" class="active"><a href="{{route('customer.new')}}">Create Customer</a></li>
                <li role="presentation"><a href="{{route('customer.list')}}">List Customers</a></li>
            </ul>
        </div>
        <h3>Created New Customer</h3>
        <form action="{{route('customer.store')}}" method="post">
            {{ csrf_field() }}
        <div class="col-md-3">
          <div class="form-group @if( $errors->has('name'))has-error @endif">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Customer Name"  value="{{ old('name') }}">
              @if ($errors->has('name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
          </div>
            <div class="form-group @if( $errors->has('surnames'))has-error @endif">
                <label for="surnames">Surnames</label>
                <input type="text" class="form-control" name="surnames" id="surnames" placeholder="Customer Surnames"  value="{{ old('surnames') }}">
                @if ($errors->has('surnames'))
                    <span class="help-block">
                      <strong>{{ $errors->first('surnames') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group ">
                <label for="image">Image</label>
                <input type="text" class="form-control" name="image" id="image" placeholder="Customer URL image"  value="{{ old('image') }}">
            </div>
        </div>
        <div class="col-md-3 row">
            <div class="form-group @if( $errors->has('address'))has-error @endif">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Customer Address"  value="{{ old('address') }}">
                @if ($errors->has('address'))
                    <span class="help-block">
                      <strong>{{ $errors->first('address') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group">
                <label for="number">Number</label>
                <input type="number" class="form-control" name="number" id="number" min="0" placeholder="Customer Number"  value="{{ old('number') }}">
            </div>
            <div class="form-group @if( $errors->has('movil'))has-error @endif">
                <label for="movil">Movil</label>
                <input type="number" class="form-control" name="movil" id="movil" min="0" placeholder="Customer Movil"  value="{{ old('movil') }}">
                @if ($errors->has('movil'))
                    <span class="help-block">
                      <strong>{{ $errors->first('movil') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group @if( $errors->has('email'))has-error @endif">
                <label for="email" >Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Customer Email"  value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group @if( $errors->has('type_customers'))has-error @endif">
                <label for="type_customer">Type Customer</label>
                <select name="type_customer" id="type_customer" class="form-control">
                    <option value="select">Select</option>
                    <option value="potencial">potencial</option>
                    <option value="activo">activo</option>
                    <option value="exporadico">exporadico</option>
                </select>
                @if ($errors->has('type_customers'))
                    <span class="help-block">
                      <strong>{{ $errors->first('type_customers') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group">
                <label for="company">Company</label>
                <input type="text" class="form-control" name="company" id="company" placeholder="Customer Company"  value="{{ old('company') }}">
            </div>
            <div class="form-group">
                <label for="job_title">Job Title</label>
                <input type="text" class="form-control" name="job_title" id="job_title" placeholder="Job Title Customer"  value="{{ old('job_title') }}">
            </div>
        </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="notes">Notes</label>
                    <textarea name="notes" id="notes" cols="5" rows="5" class="form-control" placeholder="enter customer notes..">{{ old('notes') }}</textarea>
                </div>
            </div>
                <button class="btn btn-primary" type="submit">Enviar</button>

        </form>
    </div>

@endsection

@section('js')
    <script src="{{asset('js/validacion.js')}}"> </script>

@endsection
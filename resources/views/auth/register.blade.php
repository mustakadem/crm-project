@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-body">
                    <form role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div id="divUsername" class="form-group row">
                            <label class="col-lg-4 col-form-label text-lg-right">username</label>

                            <div class="col-lg-6">
                                <input
                                        type="text"
                                        class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                        name="username"
                                        id="username"
                                        value="{{ old('username') }}"
                                        required>
                                <div id="errorUsername"></div>
                                @if ($errors->has('username'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label text-lg-right">E-Mail Address</label>

                            <div class="col-lg-6">
                                <input
                                        type="email"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        name="email"
                                        id="userEmail"
                                        value="{{ old('email') }}"
                                        required>

                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label text-lg-right">Movil</label>

                            <div class="col-lg-6">
                                <input
                                        type="number"
                                        class="form-control{{ $errors->has('movil') ? ' is-invalid' : '' }}"
                                        name="movil"
                                        id="movil"
                                        value="{{ old('movil') }}"
                                        required>

                                @if ($errors->has('movil'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('movil') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label text-lg-right">Password</label>

                            <div class="col-lg-6">
                                <input
                                        type="password"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password"
                                        required
                                >
                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div  class="form-group row">
                            <label class="col-lg-4 col-form-label text-lg-right">Confirm Password</label>

                            <div class="col-lg-6">
                                <input
                                        type="password"
                                        class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                        name="password_confirmation"
                                        required
                                >
                                @if ($errors->has('password_confirmation'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6 offset-lg-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="{{asset('ajaajax.jscript>
@endpush

<div class="container">

    <ul class="nav nav-tabs mb-4">
        <li class="nav-item">
            <a class="nav-link "  id="homeCostumer" href="{{route('customer.panel',array('username' => Auth::user()->username))}}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" id="newCustomer"  href="#">Create New Customer</a>
        </li>
    </ul>

        <h3 class="text-center">Created New Customer</h3>
        <div class="col-md-12">
        <form action="{{route('customer.store',array('user' =>  Auth::user()))}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="name">Namel</label><i id="lableName" class=" pl-1 far fa-badge"></i>
                    <input type="text" class="form-control  {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" placeholder="Customer Name"  value="{{ old('name') }}">
                   <div id="errorName"></div>
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="surnames">Surnames</label><i id="lableSurnames" class=" pl-1 far fa-badge"></i>
                    <input type="text" class="form-control  {{ $errors->has('surnames') ? ' is-invalid' : '' }}" name="surnames" id="surnames" placeholder="Customer Surnames"  value="{{ old('surnames') }}">
                    <div id="errorSurnames"></div>

                @if ($errors->has('surnames'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('surnames') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col">

                <div class="form-group ">
                    <label for="email" >Email</label><i id="lableEmail" class=" pl-1 far fa-badge"></i>
                    <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" placeholder="Customer Email"  value="{{ old('email') }}">
                    <div id="errorEmail"></div>

                @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group ">
                    <label for="address">Address</label><i id="lableAddress" class=" pl-1 far fa-badge"></i>
                    <input type="text" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="address" placeholder="Customer Address"  value="{{ old('address') }}">
                    <div id="errorAddress"></div>
                @if ($errors->has('address'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('address') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
           <div class="col">
               <div class="form-group ">
                   <label for="movil">Movil</label><i id="lableMovil" class=" pl-1 far fa-badge"></i>
                   <input type="number" class="form-control {{ $errors->has('movil') ? ' is-invalid' : '' }}" name="movil" id="movil" min="0" placeholder="Customer Movil"  value="{{ old('movil') }}">
                   <div id="errorMovil"></div>
               @if ($errors->has('movil'))
                       <div class="invalid-feedback">
                           <strong>{{ $errors->first('movil') }}</strong>
                       </div>
                   @endif
               </div>
           </div>
        </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="job_title">Job Title</label>
                        <input type="text" class="form-control {{ $errors->has('job_title') ? ' is-invalid' : '' }}" name="job_title" id="job_title" placeholder="Job Title Customer"  value="{{ old('job_title') }}">
                        <div id="errorJob_title"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group ">
                        <label for="type_customer">Type Customer</label><i id="lableType_customer" class=" pl-1 far fa-badge"></i>
                        <select name="type_customer" id="type_customer" class="form-control {{ $errors->has('type_customer') ? ' is-invalid' : '' }}">
                            <option value="select">Select</option>
                            <option value="potencial">potencial</option>
                            <option value="activo">activo</option>
                            <option value="exporadico">exporadico</option>
                        </select>
                        <div id="errorType_customer"></div>
                        @if ($errors->has('type_customer'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('type_customer') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="company">Company</label>
                        <input type="text" class="form-control" name="company" id="company" placeholder="Customer Company"  value="{{ old('company') }}">
                        <div id="errorCompany"></div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group ">
                        <label for="image" >Añadir Imagen</label>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="notes">Notes</label>
                    <textarea name="notes" id="notes" cols="5" rows="5" class="form-control" placeholder="enter customer notes..">{{ old('notes') }}</textarea>
                </div>
            </div>
            <div id="button" class=" d-flex justify-content-center">
                <button class="btn btn-primary" type="submit" disabled id="buttonForm">Enviar</button>
            </div>
        </form>
        </div>
    </div>

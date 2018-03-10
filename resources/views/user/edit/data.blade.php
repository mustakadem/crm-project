{{ method_field('PATCH') }}
<div class="container">
    <div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" aria-describedby="name" placeholder="Enter name" value="{{Auth::user()->name}}">
            @if ($errors->has('name'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="surnames">Surnames</label>
            <input type="text" class="form-control {{ $errors->has('surnames') ? ' is-invalid' : '' }}"  name="surnames" id="surnames" aria-describedby="surnames" placeholder="Enter surnames" value="{{Auth::user()->surnames}}">
            @if ($errors->has('surnames'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('surnames') }}</strong>
                </div>
            @endif

        </div>
        <div class="form-group">
            <label for="movil">Movil</label>
            <input type="number" class="form-control  {{ $errors->has('movil') ? ' is-invalid' : '' }}" name="movil" id="movil" aria-describedby="movil" placeholder="Enter movil" value="{{Auth::user()->movil}}">
            @if ($errors->has('movil'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('movil') }}</strong>
                </div>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="sector">Sector</label>
            <input type="text" class="form-control {{ $errors->has('sector') ? ' is-invalid' : ''}}" name="sector" id="sector" aria-describedby="sector" placeholder="Enter sector" value="{{Auth::user()->sector}}">
            @if ($errors->has('sector'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('sector') }}</strong>
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="website">Website</label>
            <input type="text" class="form-control {{ $errors->has('website') ? ' is-invalid' : '' }}" name="website" id="website" aria-describedby="website" placeholder="Enter website" value="{{Auth::user()->website}}">
            @if ($errors->has('website'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('website') }}</strong>
                </div>
            @endif
        </div>
    </div>
    </div>
    <div class="mt-5">
        <button type="submit" class="btn btn-info">Update</button>
    </div>
</div>
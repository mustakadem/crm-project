{{ method_field('PATCH') }}

<div class="container">
    <div class="col-md-8">
        <div class="form-group">
            <label for="current_password">Current Password</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
            <input type="password" class="form-control {{ $errors->has('current_password') ? ' is-invalid' : '' }}" id="current_password" name="current_password" aria-describedby="current_password" placeholder="Enter current Password" >
            @if ($errors->has('current_password'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('current_password') }}</strong>
                </div>
            @endif
            </div>
        </div>
        <div class="form-group">
            <label for="password">New Password</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                </div>
            <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" aria-describedby="password" placeholder="Enter new Password" >
            @if ($errors->has('password'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @endif
            </div>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Repeat Password</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                </div>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" aria-describedby="password_confirmation" placeholder="Enter password Confirmate" >
            </div>
        </div>
        <div class="mt-5">
            <button type="submit" class="btn btn-info">Update</button>
        </div>
    </div>
</div>
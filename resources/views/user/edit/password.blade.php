{{ method_field('PATCH') }}

<div class="container">
    <div class="col-md-8">
        <div class="form-group">
            <label for="currentPassword">Current Password</label>
            <input type="password" class="form-control {{ $errors->has('currentPassword') ? ' is-invalid' : '' }}" id="currentPassword" name="currentPassword" aria-describedby="currentPassword" placeholder="Enter current Password" >
            @if ($errors->has('currentPassword'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('currentPassword') }}</strong>
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="newPassword">New Password</label>
            <input type="password" class="form-control {{ $errors->has('newPassword') ? ' is-invalid' : '' }}" id="newPassword" name="newPassword" aria-describedby="newPassword" placeholder="Enter new Password" >
            @if ($errors->has('newPassword'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('newPassword') }}</strong>
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="passwordConfirmate">Repeat Password</label>
            <input type="password" class="form-control" id="passwordConfirmate" name="passwordConfirmate" aria-describedby="passwordConfirmate" placeholder="Enter password Confirmate" >
        </div>
        <div class="mt-5">
            <button type="submit" class="btn btn-info">Update</button>
        </div>
    </div>
</div>
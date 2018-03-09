{{ method_field('PATCH') }}



<div class="container">
    <div class="form-group ">
        <label for="image" >Añadir Imagen</label>
        <input type="file" id="image" name="image" class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}">
        @if ($errors->has('image'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('image') }}</strong>
            </div>
        @endif
    </div>
    <div>
        <button type="submit" class="btn bg-success">Update</button>
    </div>
</div>
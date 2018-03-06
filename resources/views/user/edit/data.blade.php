{{ method_field('PATCH') }}
<div class="container">
    <div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="Enter name" value="{{Auth::user()->name}}">
        </div>
        <div class="form-group">
            <label for="surnames">Surnames</label>
            <input type="text" class="form-control"  name="surnames" id="surnames" aria-describedby="surnames" placeholder="Enter surnames" value="{{Auth::user()->surnames}}">
        </div>
        <div class="form-group">
            <label for="movil">Movil</label>
            <input type="number" class="form-control" name="movil" id="movil" aria-describedby="movil" placeholder="Enter movil" value="{{Auth::user()->movil}}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="sector">Sector</label>
            <input type="text" class="form-control" name="sector" id="sector" aria-describedby="sector" placeholder="Enter sector" value="{{Auth::user()->sector}}">
        </div>
        <div class="form-group">
            <label for="website">Website</label>
            <input type="text" class="form-control" name="website" id="website" aria-describedby="website" placeholder="Enter website" value="{{Auth::user()->website}}">
        </div>
    </div>
    </div>
    <div class="mt-5">
        <button type="submit" class="btn btn-info">Update</button>
    </div>
</div>
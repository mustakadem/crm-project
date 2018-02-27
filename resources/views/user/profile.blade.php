
    <div class="container  ">
        <ul class="nav nav-tabs mb-5 justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" id="homeProfile" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="editPassword" href="#">Edit Password</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="editData" href="#">Edit Data</a>
            </li>
        </ul>
        <div class="row">
        <div class="col-md-2  m-2">
            <p>Nick: <strong class="btn bg-info">{{$user->username }}</strong></p>
            <input type="hidden" id="username" value="{{$user->username }}">
            <p>Name: <strong>{{$user->name }}</strong></p>
            <p>Surnames: <strong>{{$user->surnames }}</strong></p>
        </div>
        <div class="col-md-2 ml-2 mr-2">
            <p>Email: <strong>{{$user->email }}</strong></p>
            <p>Movil: <strong>{{$user->movil }}</strong></p>
        </div>
        <div class="col-md-3 ml-5">
            <p>Sector: <strong>{{$user->sector }}</strong></p>
            <p>Website: <strong>{{$user->website }}</strong></p>
        </div>
        <div class="row">
            <div class="col-md-10">
            <canvas id="staticUser" width="100" height="30"></canvas>
            </div>
        </div>
        </div>
    </div>




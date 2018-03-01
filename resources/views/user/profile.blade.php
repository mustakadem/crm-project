
    <div class="container  ">
        <ul class="nav nav-tabs mb-5 justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" id="homeProfile" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="editPassword" href="#">Objectives</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="editData" href="#">Edit Data</a>
            </li>
        </ul>
        <div class="row col-md-10">
        <div class="col-md-2  ml-5">
            <p>Nick: <strong class="btn bg-info">{{$user->username }}</strong></p>
            <input type="hidden" id="username" value="{{$user->username }}">
            <p>Name: <strong>{{$user->name }}</strong></p>
            <p>Surnames: <strong>{{$user->surnames }}</strong></p>
        </div>
        <div class="col-md-2 ml-5 mr-5">
            <p>Email: <strong>{{$user->email }}</strong></p>
            <p>Movil: <strong>{{$user->movil }}</strong></p>
        </div>
        <div class="col-md-3 ml-5">
            <p>Sector: <strong>{{$user->sector }}</strong></p>
            <p>Website: <strong>{{$user->website }}</strong></p>
        </div>
            <div class="col-md-10">
                <canvas id="staticUser" width="100" height="30"></canvas>
            </div>
        </div>
    </div>




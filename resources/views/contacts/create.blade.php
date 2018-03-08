
    <div class="container">
        <ul class="nav nav-tabs mb-5">
            <li class="nav-item">
                <a class="nav-link " href="{{route('contacts.panel',array('username' => Auth::user()->username))}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" id="newContact" href="#">Create New Contact</a>
            </li>
        </ul>
    </div>

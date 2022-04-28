<header>
    <ul class="nav justify-content-end bg-secondary py-2 px-4 ">
        @if(Session::has('loginId'))
            <li class="nav-item">
                <a class="nav-link active text-danger mt-2 btn btn-warning rounded" href="{{ route('logout') }}">Logout</a>
              </li>
                <li class="nav-item">
                <a class="nav-link text-white btn-info mt-2 mx-2 rounded" href="{{ route('users.index') }}">Users Lists</a>
                </li>
        @endif 
        @if(!Session::has('loginId'))
    
        <li class="nav-item">
          <a class="nav-link text-white" href="/">Home</a>
        </li>
        @endif
      </ul>
</header>
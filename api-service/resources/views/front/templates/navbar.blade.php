<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="#">
    <img src="{{ asset('images/logo.svg') }}" width="100" height="30" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <a class="nav-link" href="{{ url('/consejo') }}">
                Home
            </a>
        
            <a class="nav-link" href="{{ url('/login') }}">
                Login
            </a>
        
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menu
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="nav-link" href="{{ url('/add-giphy') }}">
                        Giphy List
                    </a>
                    <a class="nav-link" href="{{ url('/stadistics') }}">
                        Stadistics
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="nav-link" href="{{ url('/contact') }}">
                        Contact with Admin
                    </a>
                </div>
            </li>
        </ul>
        <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search giphies!!!" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
    </div>
    </nav>
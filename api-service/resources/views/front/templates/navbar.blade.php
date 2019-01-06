<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="{{ url('/') }}">
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
            
            @guest
                <a class="nav-link" href="{{ url('/login') }}">
                    Login
                </a>    
            @endguest

            @auth
                <a class="nav-link" href="{{ url('/giphies-list') }}">
                    Giphy List
                </a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu  
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="nav-link" href="{{ url('/edit-profile') }}">
                            Edit Profile
                        </a>
                        <a class="nav-link" href="{{ url('/stadistics') }}">
                            Stadistics
                        </a>
                        <a class="nav-link" href="{{ url('/contact') }}">
                            Admin Contact
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="nav-link" href="{{ url('/logout') }}">
                            Logout
                        </a>   
                    </div>
                </li>

                @if(Auth::user()->type === 'admin')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAdmin" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Control Panel  
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownAdmin">
                            <a class="nav-link" href="{{ url('/admin/users') }}">
                                Users
                            </a>
                            <a class="nav-link" href="{{ url('/admin/giphies') }}">
                                Giphies
                            </a>
                            <a class="nav-link" href="{{ url('/admin/tags') }}">
                                Tags
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="nav-link" href="{{ url('/admin/users') }}">
                                Stadistics
                            </a>   
                        </div>
                    </li>
                @endif
            @endauth
        </ul>
        @auth
            <div class="navbar-nav ml-auto d-flex align-items-center">
                Welcome again master {{ Auth::user()->name }}!!!
                <div class="navbar-avatar">
                    <img src="{{ Auth::user()->url_image }}" alt="{{ 'Master '.Auth::user()->name }}">
                </div>
            </div>
        @endauth
        <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search giphies!!!" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
    </div>
    </nav>
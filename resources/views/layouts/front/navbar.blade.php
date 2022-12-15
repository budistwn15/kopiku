<nav class="navbar navbar-expand-lg bg-white p-3 border-bottom border-light">
    <div class="container">
        <a class="navbar-brand" href="{{route('welcome')}}">
            <img src="{{asset('assets/images/logo/kopiku.png')}}" alt="Kopiku" width="30" height="24">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-4 mb-lg-0">
                <li class="nav-item mx-2">
                    <a class="nav-link @yield('activeHome')" aria-current="page" href="{{route('welcome')}}">Home</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link @yield('activeCatalog')" href="{{route('catalogs.index')}}">Catalog</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link @yield('activeBlog')" href="{{route('blogs.index')}}">Blog</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link @yield('activeContact')" href="{{ route('contact.index') }}">Contact Us</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link @yield('activeAbout')" href="{{route('about')}}">About Us</a>
                </li>
            </ul>
            @guest
                <form class="d-flex" role="search">
                    <a class="btn btn-dark me-2" href="{{route('login')}}">Login</a>
                    <a class="btn btn-outline-dark border-0" href="{{route('register')}}">Register</a>
                </form>
            @endguest
            @auth()
            <ul class="navbar-nav ms-auto mb-4 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('carts.index')}}">
                        <i class="bi bi-cart position-relative">
                            <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                                <span class="visually-hidden">New alerts</span>
                            </span>
                        </i>
                    </a>
                </li>
                <li class="nav-item dropdown mx-2">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (file_exists("storage/assets/images/users/".auth()->user()->avatar))
                            <img src="{{asset('storage/assets/images/users/'.auth()->user()->avatar)}}"
                                class="rounded-circle me-2" width="25"> {{auth()->user()->name}}
                        @else
                            <img src="{{auth()->user()->avatar}}" class="rounded-circle me-2" width="25">
                            {{auth()->user()->name}}
                        @endif

                    </a>
                    <ul class="dropdown-menu border-0">
                        <li><a class="dropdown-item" href="{{route('profiles.index')}}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            @endauth
        </div>
    </div>
</nav>

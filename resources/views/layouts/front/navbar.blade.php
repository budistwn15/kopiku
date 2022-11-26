<nav class="navbar navbar-expand-lg bg-white p-3 border-bottom border-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{asset('assets/images/logo/kopiku.png')}}" alt="Kopiku" width="30" height="24">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-4 mb-lg-0">
                <li class="nav-item mx-2">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#">Catalog</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#">Blog</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#">About Us</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <button class="btn btn-dark me-2" type="submit">Login</button>
                <button class="btn btn-outline-dark border-0" type="submit">Register</button>
            </form>
        </div>
    </div>
</nav>

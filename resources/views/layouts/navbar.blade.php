<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <div class="w-100 d-flex justify-content-between">
                <a class="navbar-brand" href="/">{{ env('APP_NAME') }}</a>
                <div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav me-auto mb-2 mb-md-0">
                            @auth
                            <li class="nav-item">
                                <a class="nav-link" href="">{{ auth()->user()->name }}</a>
                            </li>
                            @endauth

                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login_page') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('signup_page') }}">Signup</a>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
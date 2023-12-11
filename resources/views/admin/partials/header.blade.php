<!-- Navbar -->
<nav class="navbar fixed-top navbar-dark navbar-expand-lg bg-dark-3 py-0 my-0">
    <div class="container-fluid mx-6 py-0 my-0">
        <a class="navbar-brand mx-auto" href="{{ route('index') }}">
            <img src="{{ url('img/asset/logo.png') }}" alt="Logo" width="117" height="106"></a>
        <div class="navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <button class="nav-link dropdown-toggle align-items-center center d-flex my-0 py-0 px-3"
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-l"></i>
                        <p class="my-auto align-self-center mx-2">{{ Auth::user()->name }}</span></p>
                    </button>
                    <ul class="dropdown-menu bg-dark-3">
                        <li>
                            <a class="dropdown-item d-flex justify-content-between text-light"
                                href="{{ route('index') }}">
                                <i class="bi bi-house-door"></i>
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex justify-content-between text-light"
                                href="{{ route('profile') }}">
                                <i class="bi bi-person-badge"></i>
                                Profil
                            </a>
                        </li>
                        <li>
                            <form action="{{ url('/logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item d-flex justify-content-between text-light">
                                    <i class="bi bi-box-arrow-right"></i>
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

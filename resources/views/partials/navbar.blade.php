<nav class="navbar navbar-dark navbar-expand-lg bg-dark-2 py-0 my-0">
    <div class="container-fluid mx-6 py-0 my-0">
        <a class="navbar-brand mx-auto" href="{{ route('index') }}">
            <img src="{{ url('img/asset/logo.png') }}" alt="Logo" width="117" height="106"></a>
        <div class="navbar-collapse justify-content-center">
            <ul class="navbar-nav column-gap-5 fs-5 align-items-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('index') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('index') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/img/asset/logo.png" download="telkomlogo">SOP</a>
                </li>
                <li class="nav-item text-center">
                    <a class="nav-link" href="/img/asset/logo.png" download="telkomlogo">Struktur Group Perusahaan</a>
                </li>
            </ul>
        </div>
        <div class="navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item">
                    @auth
                        <div class="dropdown">
                            <a class="nav-link btn btn-lg bg-secondary-subtle rounded-pill align-items-center d-flex my-0 py-0 px-3 dropdown-toggle"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle fs-l"></i>
                                <p class="my-auto align-self-center mx-2">{{ $user }}</p>
                            </a>
                            <ul class="dropdown-menu bg-dark-2">
                                <li>
                                    <a class="dropdown-item d-flex justify-content-between text-light"
                                        href="{{ route('dashboard') }}">
                                        <i class="bi bi-speedometer"></i>
                                        Dashboard
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
                                        <button type="submit"
                                            class="dropdown-item d-flex justify-content-between text-light">
                                            <i class="bi bi-box-arrow-right"></i>
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a class="nav-link btn btn-lg bg-secondary-subtle rounded-pill align-items-center d-flex my-0 py-0 px-3"
                            href="{{ route('login') }}">
                            <i class="bi bi-person-circle fs-l"></i>
                            <p class="my-auto align-self-center mx-2">LOGIN</p>
                        </a>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>

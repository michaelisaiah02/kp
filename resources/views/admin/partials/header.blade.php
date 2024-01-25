<!-- Navbar -->
<nav class="navbar sticky-top
navbar-dark navbar-expand-md bg-dark-3 py-0 my-0">
    <div class="container-fluid mx-6 py-0 my-0">
        <a class="navbar-brand mx-md-auto" href="{{ route('dashboard') }}">
            <img src="{{ url('img/asset/logo.png') }}" alt="Logo" id="logo"></a>
        <div id="pesan-lg">
            @if (session()->has('success'))
                <div class="navbar-collapse justify-content-center" id="profile-lg">
                    <ul class="navbar-nav">
                        <div class="alert alert-success alert-dismissible fade show my-1 mx-md-5 p-1 pe-5 d-flex align-content-center"
                            role="alert">
                            <p class="p-0 m-0">{{ session('success') }}</p>
                            <button type="button" class="btn-close p-0 m-2" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    </ul>
                </div>
            @endif
            @if ($errors->any())
                <div class="navbar-collapse justify-content-center" id="profile-lg">
                    <ul class="navbar-nav">
                        <div class="alert alert-danger alert-dismissible fade show my-1 mx-md-5 p-1 pe-5 d-flex align-content-center"
                            role="alert">
                            <h6>Foto gagal diunggah/diubah &emsp;:</h6>
                            @foreach ($errors->all() as $error)
                                {{ $loop->iteration }}. {{ $error }} <br>
                            @endforeach
                            <button type="button" class="btn-close p-0 m-2" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    </ul>
                </div>
            @endif
        </div>
        <div class="dropdown" id="profile-sm">
            <a class="nav-link btn btn-lg bg-secondary-subtle rounded-pill align-items-center d-flex my-0 py-0 px-3 dropdown-toggle"
                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle fs-l"></i>
                <p class="my-auto align-self-center mx-2">{{ Auth::user()->name }}</p>
            </a>
            <ul class="dropdown-menu bg-dark-2">
                <li>
                    <a class="dropdown-item d-flex justify-content-between text-light" href="{{ route('dashboard') }}">
                        <i class="bi bi-speedometer"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a class="dropdown-item d-flex justify-content-between text-light" href="{{ route('profile') }}">
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
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdmin"
            aria-controls="navbarAdmin" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarAdmin">
            <ul class="navbar-nav column-gap-5 mx-auto fs-5 align-items-center">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin') ? 'active-sidebar' : '' }}" href="{{ url('/admin') }}">
                        <div class="row justify-content-around align-items-center">
                            <div id="icon" class="col">
                                <i class="bi bi-speedometer fs-5"></i>
                            </div>
                            <div id="menu" class="col fs-6 collapse-horizontal show fade text-nowrap">Dashboard
                            </div>
                        </div>
                    </a>
                </li>
                @can('teknisi')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/dashboard/input_foto*') ? 'active-sidebar' : '' }}"
                            href="{{ url('/admin/dashboard/input_foto') }}">
                            <div class="row justify-content-around align-items-center">
                                <div id="icon" class="col">
                                    <i class="bi bi-file-earmark-arrow-up fs-5"></i>
                                </div>
                                <div id="menu" class="col fs-6 collapse-horizontal show fade text-nowrap">Input Foto
                                </div>
                            </div>
                        </a>
                    </li>
                @endcan
                @can('manager')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/dashboard/eviden*') ? 'active-sidebar' : '' }}"
                            href="{{ url('admin/dashboard/eviden') }}">
                            <div class="row justify-content-evenly align-items-center">
                                <div id="icon" class="col">
                                    <i class="bi bi-eye fs-5"></i>
                                </div>
                                <div id="menu" class="col fs-6 collapse-horizontal show fade text-nowrap">Daftar
                                    Evidence</div>
                            </div>
                        </a>
                    </li>
                @endcan
                @can('validator')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/dashboard/pelurusan*') ? 'active-sidebar' : '' }}"
                            href="{{ url('admin/dashboard/pelurusan') }}">
                            <div class="row justify-content-evenly align-items-center">
                                <div id="icon" class="col">
                                    <i class="bi bi-stack fs-5"></i>
                                </div>
                                <div id="menu" class="col fs-6 collapse-horizontal show fade text-nowrap">Pelurusan
                                </div>
                            </div>
                        </a>
                    </li>
                @endcan
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/dashboard/rekon*') ? 'active-sidebar' : '' }}"
                        href="{{ url('admin/dashboard/rekon') }}">
                        <div class="row justify-content-evenly align-items-center">
                            <div id="icon" class="col">
                                <i class="bi bi-bar-chart fs-5"></i>
                            </div>
                            <div id="menu" class="col fs-6 collapse-horizontal show fade text-nowrap">Rekon
                                Bulanan
                            </div>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/bantuan') ? 'active-sidebar' : '' }}"
                        href="{{ url('/admin/bantuan') }}">
                        <div class="row justify-content-around align-items-center">
                            <div id="icon" class="col">
                                <i class="bi bi-info-circle fs-5"></i>
                            </div>
                            <div id="menu" class="col fs-5 collapse-horizontal show fade text-nowrap">Bantuan
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="navbar-collapse justify-content-end" id="profile-lg">
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
                                <button type="submit"
                                    class="dropdown-item d-flex justify-content-between text-light">
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

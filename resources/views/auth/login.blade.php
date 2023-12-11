@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row my-3 ms-5 d-inline-flex">
            <a href="{{ route('index') }}">
                <i class="bi bi-arrow-left-square-fill fs-xl text-light rounded-smooth"></i>
            </a>
        </div>
        <div class="row justify-content-center align-items-center h-100vh">
            <div class="col-md-4-2">
                <div class="card rounded-5 border border-3 bg-dark bg-opacity-25 bg-blur px-3 mx-0">
                    <div class="card-body mx-5 mt-4 mb-5 text-light">
                        <div class="row mb-4 justify-content-between">
                            <div class="col-4 align-self-center">
                                <h1>Login</h1>
                            </div>
                            <div class="col-2 me-0 pe-0 align-self-center ">
                                <img src="{{ url('img/asset/logo.png') }}" alt="Logo" width="80" height="75">
                            </div>
                        </div>
                        <form method="POST" action="{{ url('/login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label text-secondary">Email</label>
                                <input type="email"
                                    class="form-control form-control-lg {{ session()->has('fail') ? 'is-invalid' : '' }}"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                    id="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label text-secondary">Password</label>
                                <input id="password" type="password"
                                    class="form-control form-control-lg {{ session()->has('fail') ? 'is-invalid' : '' }}"
                                    name="password" required autocomplete="current-password">
                            </div>
                            <div class="form-check {{ session()->has('fail') ? 'mb-3' : 'mb-6' }}">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>
                            @if (session()->has('fail'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <p>{{ session('fail') }}</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="row mb-3">
                                <div class="col">
                                    <button type="submit" class="btn btn-lg btn-success-light w-100">
                                        Sign in
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

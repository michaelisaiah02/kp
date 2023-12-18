@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid mx-6">
        <div class="row text-center d-inline-flex w-100" id='dashboard'>
            <i class="bi bi-person-square fs-xxxl p-0 m-0 d-inline"></i>
            <h1 class="p-0 mb-xxl-5" id="welcome-lg">
                Selamat Datang
                <span class="fw-bold fst-italic text-danger-2">{{ Auth::user()->name }}</span>
            </h1>
            <div id="welcome-sm">
                <h1 class="p-0 mb-xxl-5">Selamat Datang</h1>
                <h1 class="fw-bold fst-italic text-danger-2">{{ Auth::user()->name }}</h1>
            </div>
            @can('teknisi')
                <div class="col-md col-12">
                    <a href="{{ url('/admin/dashboard/input_foto') }}" class="text-decoration-none text-light">
                        <i class="bi bi-file-earmark-arrow-up-fill fs-xl text-danger-2"></i>
                        <h5>Input Foto ODP</h5>
                    </a>
                </div>
            @endcan
            @can('manager')
                <div class="col-md col-12">
                    <a href="{{ url('/admin/dashboard/eviden') }}" class="text-decoration-none text-light">
                        <i class="bi bi-eye-fill fs-xl text-danger-2"></i>
                        <h5>Daftar Evidence Web Valins</h5>
                    </a>
                </div>
            @endcan
            @can('validator')
                <div class="col-md col-12">
                    <a href="{{ url('/admin/dashboard/pelurusan') }}" class="text-decoration-none text-light">
                        <i class="bi bi-stack fs-xl text-danger-2"></i>
                        <h5>Pelurusan Data</h5>
                    </a>
                </div>
            @endcan
            <div class="col-md col-12">
                <a href="{{ url('/admin/dashboard/rekon') }}" class="text-decoration-none text-light">
                    <i class="bi bi-bar-chart-fill fs-xl text-danger-2"></i>
                    <h5>Rekon Bulanan</h5>
                </a>
            </div>
        </div>
    </div>
@endsection

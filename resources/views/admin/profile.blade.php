@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid mx-6 mt-5">
        <h1 class="fs-l fw-bold text-light mt-5 mb-4">
            Profil Akun {{ auth()->user()->name }}
        </h1>
        <div class="row">
            <div class="input-group input-group-lg mb-3">
                <span class="input-group-text fs-2 w-25 bg-danger-2 border border-3 border-light"
                    id="inputGroup-sizing-default">Email</span>
                <input type="text" class="form-control fs-2" aria-label="Sizing example input" disabled
                    aria-describedby="inputGroup-sizing-default" value="{{ Auth::user()->email }}">
            </div>
            <div class="input-group input-group-lg mb-3">
                <span class="input-group-text fs-2 w-25 bg-danger-2  border border-3 border-light"
                    id="inputGroup-sizing-default">Jabatan</span>
                <input type="text" class="form-control fs-2" aria-label="Sizing example input" disabled
                    aria-describedby="inputGroup-sizing-default" value="{{ Auth::user()->level_akses }}">
            </div>
            <div class="input-group input-group-lg mb-3">
                <span class="input-group-text fs-2 w-25 bg-danger-2  border border-3 border-light"
                    id="inputGroup-sizing-default">Akun Dibuat</span>
                <input type="text" class="form-control fs-2" aria-label="Sizing example input" disabled
                    aria-describedby="inputGroup-sizing-default"
                    value="{{ Auth::user()->created_at->format('d/m/Y H:i') }}">
            </div>
        </div>
    </div>
@endsection

@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center mb-3">
            <div class="col d-flex justify-content-center">
                <h1 class="py-1 px-5 bg-danger-2 border border-light rounded-3">Daftar WITEL</h1>
            </div>
            <div class="row justify-content-center bg-secondary border border-light rounded-2 mt-md-5 mt-2">
                <div class="row justify-content-center mb-xxl-3">
                    @foreach ($witels as $index => $witel)
                        @if ($index % 3 == 0)
                </div>
                <div class="row justify-content-center mb-xxl-3">
                    @endif
                    <a href="{{ url('/admin/dashboard/eviden/' . $witel->witel) }}"
                        class="col-md col-12 d-flex justify-content-center btn-danger-3 mx-md-3 border-danger-3 rounded-3 my-md-4 my-3 text-decoration-none ">
                        <div class="my-md-5 my-3 fs-1 text-light">
                            {{ $witel->witel }}
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

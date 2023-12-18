@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center mb-3 mx-4">
            <div class="col d-flex justify-content-center">
                <h1 class="py-1 px-5 bg-danger-4 text-danger-2 border-0 rounded-3 text-center">Pilih Rekon Bulanan</h1>
            </div>
            <div class="row justify-content-center bg-danger-4 border-0 rounded-2 mt-xxl-5 mt-3">
                <div class="row justify-content-center mt-xxl-5">
                    @foreach ($rekons as $index => $rekon)
                        @if ($index % 4 == 0)
                </div>
                <div class="row justify-content-center mb-xxl-5 my-md-3">
                    @endif
                    <a href="{{ url('/admin/dashboard/rekon/' . $rekon->bulan) }}"
                        class="col-md col-12 d-flex justify-content-center btn-danger-2 mx-xxl-4 mx-2 border border-4 border-dark rounded-3 my-2 text-decoration-none shadow">
                        <div class="my-3 fs-1">
                            {{ $rekon->bulan }}
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

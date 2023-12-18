@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid mx-5 mt-5">
        <div class="row">
            <div class="col-xxl-5 col-12 fs-6 me-5">
                <div
                    class="row text-secondary bg-light bg-opacity-10 border border-secondary border-3 rounded-3 justify-content-center">
                    <button class="badge rounded-3 w-25 bg-danger-2 mt-0 ms-0 mb-3 fs-5 me-auto" disabled>Result</button>
                    <div class="row mb-1 align-items-center justify-content-between">
                        <div class="col-xxl-5 col-12 text-center text-xxl-start">
                            <label class="col-form-label fs-2 ms-3 fw-bold text-secondary-2">WITEL</label>
                        </div>
                        <div class="col-xxl col-12">
                            <input type="text"
                                class="form-control bg-light-2 text-dark text-center p-0 fs-3 fw-bold mb-2 mb-md-0"
                                value="{{ $valin->witel->witel }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-1 align-items-center justify-content-between">
                        <div class="col-xxl-5 col-12 text-center text-xxl-start">
                            <label class="col-form-label fs-2 ms-3 fw-bold text-secondary-2">ID Valins</label>
                        </div>
                        <div class="col-xxl col-12">
                            <input type="text"
                                class="form-control bg-light-2 text-dark text-center p-0 fs-3 fw-bold mb-2 mb-md-0"
                                value="{{ $valin->id_valins }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-1 align-items-center justify-content-between">
                        <div class="col-xxl-5 col-12 text-center text-xxl-start">
                            <label class="col-form-label fs-2 ms-3 fw-bold text-secondary-2">REKON</label>
                        </div>
                        <div class="col-xxl col-12">
                            <input type="text"
                                class="form-control bg-light-2 text-dark text-center p-0 fs-3 fw-bold mb-2 mb-md-0"
                                value="{{ $valin->rekon->bulan }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-4 align-items-center justify-content-between">
                        <div class="col-xxl-5 col-12 text-center text-xxl-start">
                            <label class="col-form-label fs-2 ms-3 fw-bold text-secondary-2 mb-2 mb-md-0">Timestamp</label>
                        </div>
                        <div class="col-xxl col-12">
                            <input type="text" class="form-control bg-light-2 text-dark text-center py-0 fs-3 fw-bold"
                                value="{{ $valin->updated_at->format('d/m/Y H:i:s') }}" disabled>
                        </div>
                    </div>
                </div>
                <div
                    class="row justify-content-center text-secondary bg-light bg-opacity-10 border border-secondary border-3 rounded-3 mt-6 mb-3 mb-xxl-0">
                    <button class="badge rounded-3 w-25 bg-danger-2 mt-0 ms-0 mb-3 fs-5 me-auto" disabled>Status</button>
                    <div class="row justify-content-center">
                        <h1 class="text-center fw-bold text-light-2 mt-xxl-5 mt-2 mb-3">STATUS PELURUSAN ODP RAM3
                        </h1>
                        <div class="col d-flex justify-content-center {{ $valin->ram3 == 'NOK' ? 'mb-3' : 'mb-5' }}">
                            <button class="btn btn-lg {{ $valin->ram3 == 'OK' ? 'btn-success-2' : 'btn-danger-4' }} px-4"
                                disabled="disabled">{{ $valin->ram3 }}</button>
                        </div>
                        @if ($valin->ram3 == 'NOK')
                            <div class="row px-xxl-5 px-2 mb-xxl-5 mb-2">
                                <h3
                                    class="text-center text-uppercase bg-danger-3 py-2 border border-dark border-3 text-light">
                                    {{ $valin->keterangan }}
                                </h3>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xxl col-12">
                <div id="foto-odp" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ url('storage/' . $valin->gambar1) }}"
                                alt="{{ pathinfo($valin->gambar1)['basename'] }}" class="rounded-3 w-100 h-78vh">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ url('storage/' . $valin->gambar2) }}"
                                alt="{{ pathinfo($valin->gambar1)['basename'] }}" class="rounded-3 w-100 h-78vh">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ url('storage/' . $valin->gambar3) }}"
                                alt="{{ pathinfo($valin->gambar1)['basename'] }}" class="rounded-3 w-100 h-78vh">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#foto-odp" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#foto-odp" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

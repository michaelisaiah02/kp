@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center mb-3 mx-7">
            <div class="col d-flex justify-content-center">
                <h1 class="py-1 px-xxl-5 px-2 bg-dark-1 text-light rounded-3 fw-light border border-light text-nowrap">Daftar
                    Review
                    Rekon
                    {{ $rekon }}
                </h1>
            </div>
            <div class="row justify-content-center bg-danger-2 border-0 rounded-2 mt-3">
                <div id="carouselRekon" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach ($valins->chunk(6) as $index => $slideItems)
                            <div class="carousel-item{{ $index == 0 ? ' active' : '' }}">
                                <div class="row justify-content-center my-3">
                                    @foreach ($slideItems as $valin)
                                        <a href="{{ url('/admin/dashboard/pelurusan/' . $valin->id_valins . '/edit') }}"
                                            class="col-md-4 m-xxl-4 m-2 d-grid text-decoration-none text-light align-content-center bg-opacity-25"
                                            style="background-image: url('{{ asset('storage/' . $valin->gambar1) }}');"
                                            id="gambarPelurusan">
                                            <div class="row bg-blur-light">
                                                <div class="col d-grid align-content-center">
                                                    <h3 class="text-center bg-secondary">
                                                        {{ $valin->id_valins }}
                                                    </h3>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselRekon"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselRekon"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div id="pesan-sm">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <p>{{ session('success') }}</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

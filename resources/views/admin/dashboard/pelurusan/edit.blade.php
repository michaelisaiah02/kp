@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid ms-3 mt-5">
        <div class="row">
            <div class="col">
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
            <div class="col-5 fs-6 px-5 d-flex align-items-center justify-content-center">
                <div
                    class="row justify-content-center text-secondary bg-light bg-opacity-10 border border-secondary border-3 rounded-3">
                    <button class="badge rounded-3 w-25 bg-danger-2 mt-0 ms-0 mb-3 fs-5 me-auto" disabled>Pilih</button>
                    <div class="row justify-content-center">
                        <form action="/admin/dashboard/pelurusan/{{ $valin->id_valins }}" method="post">
                            @csrf
                            @method('put')
                            <input type="text" hidden value="">
                            <div class="row mb-3 align-items-center justify-content-between" id="pelurusanIDValins">
                                <div class="col text-nowrap">
                                    <label class="col-form-label fs-3 ms-3 text-light fw-bold">Validasi Pada ID
                                        Valins</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control text-center p-0 fs-3 fw-bold bg-dark-1"
                                        value="{{ $valin->id_valins }}" disabled>
                                </div>
                            </div>
                            <div class="row-cols-3 d-flex justify-content-around mb-3" id="valinsButton">
                                <button class="btn btn-lg btn-success" type="button"
                                    onclick="updateInputValue('OK')">OK</button>
                                <button class="btn btn-lg btn-danger" type="button"
                                    onclick="updateInputValue('NOK')">NOK</button>
                                <input type="text" id="pelurusanInput" hidden name="ram3" value="">
                            </div>
                            <div class="row mb-3 align-items-center justify-content-between" id="pelurusanKeterangan">
                                <div class="col text-nowrap">
                                    <label class="col-form-label fs-3 ms-3 text-light fw-bold">Keterangan Valins</label>
                                </div>
                                <div class="col">
                                    <select class="form-select" aria-label="Default select" name="keterangan">
                                        <option value="-" selected>-</option>
                                        <option value="BT/NONE >=50% Jumlah Dropcore">BT/NONE >=50% Jumlah Dropcore</option>
                                        <option value="Foto Bukan dari Web Valins">Foto Bukan dari Web Valins</option>
                                        <option value="Foto ODP Luar/Dalam Tidak Ada">Foto ODP Luar/Dalam Tidak Ada</option>
                                        <option value="Foto Tidak Sesuai">Foto Tidak Sesuai</option>
                                        <option value="QR Code Asal">QR Code Asal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row-cols-3 justify-content-around mb-3" id="submitPelurusanButton">
                                <button class="btn btn-lg btn-warning" type="submit" name="selesai"
                                    value="1">Selesai</button>
                                <button class="btn btn-lg btn-info" type="submit" name="selesai"
                                    value="0">Lanjut</button>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <p>{{ session('success') }}</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function updateInputValue(value) {
            // Mengubah nilai input sesuai dengan tombol yang diklik
            document.getElementById('pelurusanInput').value = value;
        }
    </script>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container-fluid mx-6 mt-5">
        <h1 id="tentang" class="fs-l fw-bold text-light mt-5 mb-4 text-center fst-italic gap">
            Tentang Validasi Data Telkom
        </h1>
        <div class="row justify-content-center text-light lh-lg">
            <div class="col-6 bg-blur rounded-5">
                <ul class="nav nav-tabs fs-2 gap-3" id="tentang" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="aplikasi-tab" data-bs-toggle="tab"
                            data-bs-target="#aplikasi-tab-pane" type="button" role="tab"
                            aria-controls="aplikasi-tab-pane" aria-selected="true">Aplikasi</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tujuan-tab" data-bs-toggle="tab" data-bs-target="#tujuan-tab-pane"
                            type="button" role="tab" aria-controls="tujuan-tab-pane"
                            aria-selected="false">Tujuan</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="fitur-tab" data-bs-toggle="tab" data-bs-target="#fitur-tab-pane"
                            type="button" role="tab" aria-controls="fitur-tab-pane"
                            aria-selected="false">Fitur</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pengembang-tab" data-bs-toggle="tab"
                            data-bs-target="#pengembang-tab-pane" type="button" role="tab"
                            aria-controls="pengembang-tab-pane" aria-selected="false">Pengembang</button>
                    </li>
                </ul>
                <div class="tab-content fs-3" id="tentangContent">
                    <div class="tab-pane fade show active" id="aplikasi-tab-pane" role="tabpanel"
                        aria-labelledby="aplikasi-tab" tabindex="0">
                        Validasi Data Telkom adalah sebuah platform yang dirancang untuk membantu Telkom dalam melakukan
                        validasi
                        data pelanggan secara efisien dan akurat. Platform ini menggunakan teknologi canggih dan algoritma
                        cerdas
                        untuk memastikan bahwa data pelanggan yang dimasukkan ke dalam sistem Telkom adalah valid dan
                        terverifikasi.
                    </div>
                    <div class="tab-pane fade" id="tujuan-tab-pane" role="tabpanel" aria-labelledby="tujuan-tab"
                        tabindex="0">
                        Tujuan dari Validasi Data Telkom adalah untuk meningkatkan kualitas data pelanggan yang ada di dalam
                        sistem
                        Telkom. Dengan menggunakan platform ini, Telkom dapat memastikan bahwa data pelanggan yang dimiliki
                        adalah
                        akurat, lengkap, dan terverifikasi. Hal ini akan membantu Telkom dalam mengoptimalkan operasionalnya
                        dan
                        memberikan pelayanan yang lebih baik
                        kepada pelanggan.
                    </div>
                    <div class="tab-pane fade" id="fitur-tab-pane" role="tabpanel" aria-labelledby="fitur-tab"
                        tabindex="0">
                        <p class="mb-4">
                            Validasi Data Telkom dilengkapi dengan berbagai fitur yang dapat memudahkan proses validasi data
                            pelanggan. Beberapa fitur yang tersedia antara lain:
                        </p>
                        <div class="row">
                            <div class="col d-flex justify-content-evenly">
                                <button type="button" class="btn btn-danger" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom"
                                    data-bs-title="Fitur ini memungkinkan Telkom untuk memverifikasi identitas
                            pelanggan dengan
                            menggunakan data yang
                            valid dan terpercaya.">
                                    Verifikasi Identitas
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom"
                                    data-bs-title="Fitur ini memastikan bahwa alamat yang dimasukkan oleh pelanggan
                          adalah benar dan
                          valid.">
                                    Validasi Alamat
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom"
                                    data-bs-title="Fitur ini memungkinkan Telkom untuk memeriksa ketersediaan layanan
                        di suatu
                        daerah
                        berdasarkan data yang valid.">
                                    Pengecekan Ketersediaan Layanan
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pengembang-tab-pane" role="tabpanel" aria-labelledby="pengembang-tab"
                        tabindex="0">
                        Validasi Data Telkom dikembangkan oleh tim yang terdiri dari para ahli di bidang teknologi informasi
                        dan
                        data
                        management. Tim ini memiliki pengalaman yang luas dalam mengembangkan solusi teknologi untuk
                        industri
                        telekomunikasi.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

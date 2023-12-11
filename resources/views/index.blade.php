@extends('layouts.app')

@section('content')
    <div class="container-fluid mx-6 mt-5">
        <h1 class="fs-l fw-bold text-light mt-5 mb-4">
            Digital Connectivity
        </h1>
        <div class="row column-gap-3">
            <div class="col-6 text-light fs-6">
                Telkom memiliki berbagai solusi konektivitas digital, mulai dari fixed broadband, mobile broadband, hingga
                satellite broadband. Untuk fixed broadband, Telkom menawarkan layanan IndiHome yang telah menjangkau lebih
                dari 6,5 juta pelanggan. Untuk mobile broadband, Telkom menawarkan layanan Telkomsel yang telah menjangkau
                lebih dari 300 juta pelanggan. Sedangkan untuk satellite broadband, Telkom menawarkan layanan Telkomsat yang
                telah menjangkau hingga ke wilayah terpencil di Indonesia.
                Selain itu, Telkom juga berkolaborasi dengan berbagai pihak untuk mempercepat pembangunan infrastruktur
                konektivitas digital di Indonesia. Telkom telah bekerja sama dengan pemerintah, swasta, dan komunitas untuk
                membangun jaringan internet di wilayah terpencil dan tertinggal.
            </div>
            <div class="col-5">
                <img src="{{ url('/img/asset/telkom.jpg') }}" alt="Telkom" class="rounded-smooth w-100 h-68vh">
            </div>
        </div>
    </div>
@endsection

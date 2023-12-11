@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row mb-5">
            @if (count($valins) !== 0)
                <form action="{{ url('admin/dashboard/eviden/' . $witel) }}"
                    class="col-md-4 d-flex bg-light bg-opacity-10 p-2 rounded-3 border border-light" role="search">
                    <input class="form-control bg-secondary-2" name="cari" id="cari" type="search"
                        placeholder="Masukan ID Valins" aria-label="Search" value="{{ request('cari') }}">
                    <button class="ms-2 btn btn-danger-2 px-4" type="submit">Cari</button>
                </form>
            @endif
        </div>
        <div class="row bg-light bg-opacity-10 border border-light rounded-3 justify-content-center"
            style="overflow-y: auto; max-height: 688px;">
            @if (count($valins) === 0)
                <div class="row justify-content-center mb-3">
                    <h1 class="text-center fst-italic text-danger user-select-none pt-3 pb-1">Tidak ada data yang sesuai
                        untuk
                        ditampilkan</h1>
                @else
                    @foreach ($valins as $index => $valin)
                        @if ($index % 4 == 0)
                </div>
                <div class="row justify-content-center mb-3">
            @endif
            <a href="{{ url('/admin/dashboard/eviden/' . $valin->id_valins . '/edit') }}"
                class="col d-flex justify-content-center btn btn-secondary-2 mx-3 rounded-3 my-1 text-decoration-none">
                <div class="fs-4 text-light">
                    {{ $valin->id_valins }}
                </div>
            </a>
            @endforeach
        </div>
        @endif
    </div>
    </div>
@endsection

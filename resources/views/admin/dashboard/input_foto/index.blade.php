@php
    if (!function_exists('humanFileSize')) {
        function humanFileSize($size, $unit = '')
        {
            if ((!$unit && $size >= 1 << 30) || $unit == 'GB') {
                return number_format($size / (1 << 30), 2) . ' GB';
            }
            if ((!$unit && $size >= 1 << 20) || $unit == 'MB') {
                return number_format($size / (1 << 20), 2) . ' MB';
            }
            if ((!$unit && $size >= 1 << 10) || $unit == 'KB') {
                return number_format($size / (1 << 10), 2) . ' KB';
            }
            return number_format($size) . ' bytes';
        }
    }
@endphp
@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-between">
            <div class="col-md-2 align-self-end mb-0">
                <h4 class="m-0">{{ $title }}</h4>
            </div>
            <div class="col-md-2 d-flex justify-content-end">
                <button class="btn btn-dark-2 text-decoration-none rounded-2" data-bs-target="#createModal"
                    data-bs-toggle="modal" id="tambahButton">
                    <i class="bi bi-upload me-1"></i>
                    Unggah Dokumen
                </button>
                @include('admin/partials/create-modal')
            </div>
        </div>
        <hr class="border-light opacity-100 mb-4 mt-2">
        <div class="table-responsive rounded-4">
            <table class="table table-dark border border-1 border-secondary align-middle">
                </tr>
                <thead class="table-danger-2">
                    <tr>
                        <th scope="col">Nama File</th>
                        <th scope="col" class="text-end">Ukuran File</th>
                        <th scope="col" class="text-center">Dibuat</th>
                        <th scope="col" class="text-center">Terakhir Diubah</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($valins as $valin)
                        @for ($i = 1; $i <= 3; $i++)
                            @if ($valin['gambar' . $i])
                                <tr>
                                    <td scope="row" class="py-1">
                                        {{ pathinfo($valin['gambar' . $i])['basename'] }}
                                    </td>
                                    <td class="text-end user-select-none py-1">
                                        {{ humanFileSize(Storage::disk('public')->size($valin['gambar' . $i])) }}
                                    </td>
                                    <td class="text-center user-select-none py-1">
                                        {{ $valin->created_at->format('d/m/Y H:i') }}
                                    </td>
                                    <td class="text-center user-select-none py-1">
                                        {{ $valin->updated_at->format('d/m/Y H:i') }}
                                    </td>
                                    <td class="text-center py-1">
                                        @if (strtotime(now()) - strtotime($valin->created_at) < 86400)
                                            @if ($valin->gambar1 == null || $valin->gambar2 == null || $valin->gambar3 == null)
                                                <button class="bg-transparent border-0 tambahFotoButton"
                                                    data-bs-target="#createFotoModal{{ $valin->id_valins }}_{{ $i }}"
                                                    data-bs-toggle="modal" data-id="{{ $valin->id_valins }}"
                                                    data-modal-id="{{ $valin->id_valins . '_' . $i }}"><i
                                                        class="bi bi-camera-fill fs-5 text-warning"></i></button>
                                                @include('admin/partials/create-foto-modal', [
                                                    'modalId' => $valin->id_valins . '_' . $i,
                                                    'gambarKe' => $i,
                                                ])
                                            @endif
                                        @endif
                                        <button class="bg-transparent border-0 editButton"
                                            data-bs-target="#editModal{{ $valin->id_valins }}_{{ $i }}"
                                            data-bs-toggle="modal" data-id="{{ $valin->id_valins }}"
                                            data-modal-id="{{ $valin->id_valins . '_' . $i }}"
                                            data-gambar-ke="{{ $i }}"><i
                                                class="bi bi-eye-fill fs-5 text-primary"></i></button>
                                        @include('admin/partials/edit-modal', [
                                            'modalId' => $valin->id_valins . '_' . $i,
                                            'gambarKe' => $i,
                                        ])
                                        @if (strtotime(now()) - strtotime($valin->created_at) < 86400)
                                            <form action="input_foto/{{ $valin->id_valins }}" method="post"
                                                class="d-inline">
                                                @method('patch')
                                                @csrf
                                                <input type="hidden" name="gambarKe" value="{{ $i }}">
                                                <input type="hidden" name="metode" value="hapus">
                                                <button class="text-danger-3 badge bg-transparent border-0"
                                                    onclick="return confirm('Anda yakin akan menghapus?')"><i
                                                        class="bi bi-trash-fill fs-5"></i></button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endfor
                    @endforeach

                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        {{-- Tombol Previous --}}
                        @if ($valins->currentPage() > 1)
                            <li class="page-item">
                                <a class="page-link" href="{{ $valins->url(1) }}" aria-label="Previous">
                                    <i class="bi bi-chevron-double-left"></i>
                                </a>
                            </li>
                        @endif

                        {{-- Tombol-tombol pagination --}}
                        @for ($i = max(1, $valins->currentPage() - 3); $i <= min($valins->lastPage(), $valins->currentPage() + 3); $i++)
                            <li class="page-item {{ $i == $valins->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $valins->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        {{-- Tombol Next --}}
                        @if ($valins->currentPage() < $valins->lastPage())
                            <li class="page-item">
                                <a class="page-link" href="{{ $valins->url($valins->lastPage()) }}" aria-label="Next">
                                    <i class="bi bi-chevron-double-right"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p>{{ session('success') }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h5>Foto gagal diunggah/diubah &emsp;:</h5>
                    @foreach ($errors->all() as $index => $error)
                        {{ $index + 1 }}. {{ $error }} &emsp;
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>
@endsection

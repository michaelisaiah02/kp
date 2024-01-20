@csrf
<div class="modal fade" id="createFotoModal{{ $modalId }}" aria-hidden="true" aria-labelledby="createModal1"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form action="input_foto/{{ $valin->id_valins }}" method="post" enctype="multipart/form-data"
                id="uploadFotoForm">
                @csrf
                @method('patch')
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-danger-2" id="createModalLabel1">Tambah Foto ID Valins ->
                        {{ $valin->id_valins }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="create-foto-modal-{{ $modalId }}">
                    <input type="hidden" name="gambarKe" value="{{ $gambarKe }}">
                    <input type="hidden" name="metode" value="tambah">
                    <p class="text-primary-2">Tolong berikan bukti terkait dengan penyambungan jaringan (port) pada
                        kotak ODP. Pemberian bukti
                        disesuaikan dengan SOP yang diberikan. Mohon file diperiksa kembali sebelum upload dilakukan</p>
                    <input
                        class="form-control mb-3 @error('gambar') is-invalid @enderror @error('gambar.*') is-invalid @enderror"
                        type="file" id="tambahGambar{{ $modalId }}" name="gambar[]" accept="image/*"
                        capture="environment" multiple>
                    @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    @error('gambar.*')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div id="tambah-image-preview-{{ $modalId }}"
                        class="row align-items-center justify-content-center"></div>
                    <p class="text-primary-3 mt-3">Jika anda sebelumnya sudah memasukan pada kolom uploading, anda boleh
                        melanjutkan ke tahap berikutnya. Untuk perubahan file, anda bisa menekan kembali file pada kolom
                        upload</p>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button class="btn btn-primary-light" type="button" data-bs-dismiss="modal"
                        aria-label="Close">Batal</button>
                    <button class="btn btn-danger-2" type="submit">
                        <i class="bi bi-upload me-1"></i>
                        Unggah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<form method="post" enctype="multipart/form-data" id="uploadForm">
    @csrf
    <div class="modal fade" id="createModal" aria-hidden="true" aria-labelledby="createModal1" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-danger-2" id="createModalLabel1">Unggah Dokumen</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="input-foto-modal">
                    <p class="text-primary-2">Tolong berikan bukti terkait dengan penyambungan jaringan (port) pada
                        kotak ODP. Pemberian bukti
                        disesuaikan dengan SOP yang diberikan. Mohon file diperiksa kembali sebelum upload dilakukan</p>
                    <input
                        class="form-control mb-3 @error('gambar') is-invalid @enderror @error('gambar.*') is-invalid @enderror"
                        type="file" id="gambar" name="gambar[]" accept="image/*" capture="environment" multiple>
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
                    <div id="image-preview" class="row align-items-center justify-content-center"></div>
                    <p class="text-primary-3 mt-3">Jika anda sebelumnya sudah memasukan pada kolom uploading, anda boleh
                        melanjutkan ke tahap berikutnya. Untuk perubahan file, anda bisa menekan kembali file pada kolom
                        upload</p>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button class="btn btn-primary-light" type="button" data-bs-dismiss="modal"
                        aria-label="Close">Batal</button>
                    <button class="btn btn-primary" data-bs-target="#createModal2" data-bs-toggle="modal"
                        type="button">
                        <i class="bi bi-arrow-right-square me-1"></i>
                        Berikutnya
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="createModal2" aria-hidden="true" aria-labelledby="createModal2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createModalLabel2">Unggah Dokumen</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3" id="id_valins_tambah">
                        <input type="text" class="form-control @error('id_valins') is-invalid @enderror"
                            id="id_valins" name="id_valins" value="{{ Request::old('id_valins') }}" maxlength="8">
                        <label for="id_valins">Masukan ID Valins</label>
                        @error('id_valins')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select @error('id_witel') is-invalid @enderror" id="id_witel"
                            name="id_witel" aria-label="ID WITEL">
                            <option selected disabled>-</option>
                            @foreach ($witels as $witel)
                                <option value="{{ $witel->id }}"
                                    {{ old('id_witel') == $witel->id ? 'selected' : '' }}>
                                    {{ $witel->witel }}</option>
                            @endforeach
                        </select>
                        <label for="id_witel">Pilih WITEL</label>
                        @error('id_witel')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <select class="form-select @error('id_rekon') is-invalid @enderror" id="id_rekon"
                            name="id_rekon" aria-label="Rekon">
                            <option {{ old('id_rekon') ? '' : 'selected' }} disabled>-</option>
                            @foreach ($rekons as $rekon)
                                <option value="{{ $rekon->id }}"
                                    {{ old('id_rekon') == $rekon->id ? 'selected' : '' }}>{{ $rekon->bulan }}
                                </option>
                            @endforeach
                        </select>
                        <label for="id_rekon">Pilih Rekon</label>
                        @error('id_rekon')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button class="btn btn-primary-light" type="button" data-bs-dismiss="modal"
                        aria-label="Close">Batal</button>
                    <button class="btn btn-secondary ms-auto" data-bs-target="#createModal" data-bs-toggle="modal"
                        type="button">
                        <i class="bi bi-arrow-left-square me-1"></i>
                        Kembali</button>
                    <button class="btn btn-danger-2" type="submit">
                        <i class="bi bi-upload me-1"></i>
                        Unggah
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

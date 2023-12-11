<div class="modal fade" id="editModal{{ $modalId }}" aria-hidden="true" aria-labelledby="editModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="input_foto/{{ $valin->id_valins }}" method="post" enctype="multipart/form-data" id="editForm">
                @csrf
                @method('put')
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">
                        {{ strtotime(now()) - strtotime($valin->created_at) < 86400 ? 'Ubah Foto Ke-' . $gambarKe : 'Foto Ke-' . $gambarKe }}
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="input-foto-modal-edit-{{ $modalId }}">
                    <input type="hidden" name="gambarKe" value="{{ $gambarKe }}">
                    @if (strtotime(now()) - strtotime($valin->created_at) < 86400)
                        <div class="input-group mb-3 d-flex" id="foto_ubah">
                            <input
                                class="form-control mb-3 @error('gambar_edit_{{ $modalId }}') is-invalid @enderror"
                                type="file" id="gambar_edit_{{ $modalId }}" name="gambar{{ $gambarKe }}"
                                accept="image/*" capture="environment"
                                {{ strtotime(now()) - strtotime($valin->created_at) < 86400 ? '' : 'disabled' }}>
                            @error('gambar_edit_{{ $modalId }}')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    @endif
                    <div id="image-preview-edit-{{ $modalId }}"
                        class="row align-items-center justify-content-center mb-3">
                    </div>
                    <div class="input-group mb-3" id="id_valins_ubah">
                        <span class="input-group-text user-select-none w-25"
                            for="id_valins_edit_{{ $modalId }}">ID Valins</span>
                        <input type="text" class="form-control" aria-label="id_valins_edit"
                            aria-describedby="id_valins_edit" id="id_valins_edit_{{ $modalId }}" name="id_valins"
                            disabled>
                        <span class="input-group-text" id="id_valins_edit_{{ $modalId }}">
                            <i class="bi bi-lock"></i>
                        </span>
                    </div>
                    @if (strtotime(now()) - strtotime($valin->created_at) < 86400)
                        <div class="form-floating mb-3">
                            <select
                                class="form-select @error('id_witel_edit_{{ $modalId }}') is-invalid @enderror"
                                id="id_witel_edit_{{ $modalId }}" name="id_witel" aria-label="ID WITEL"
                                {{ strtotime(now()) - strtotime($valin->created_at) < 86400 ? '' : 'disabled' }}>
                                <option disabled>-</option>
                                @foreach ($witels as $witel)
                                    <option value="{{ $witel->id }}"
                                        {{ old('id_witel_edit', $witel->id) == $witel->id ? 'selected' : '' }}>
                                        {{ $witel->witel }}</option>
                                @endforeach
                            </select>
                            <label class="ms-3" for="id_witel_edit">Pilih WITEL</label>
                            @error('id_witel_edit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <select
                                class="form-select @error('id_rekon_edit_{{ $modalId }}') is-invalid @enderror"
                                id="id_rekon_edit_{{ $modalId }}" name="id_rekon" aria-label="ID_Rekon_edit"
                                {{ strtotime(now()) - strtotime($valin->created_at) < 86400 ? '' : 'disabled' }}>
                                <option disabled>-</option>
                                @foreach ($rekons as $rekon)
                                    <option value="{{ $rekon->id }}"
                                        {{ old('id_rekon_edit') == $rekon->id ? 'selected' : '' }}>
                                        {{ $rekon->bulan }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="id_rekon_edit_{{ $modalId }}">Pilih Rekon</label>
                            @error('id_rekon_edit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    @else
                        <div class="input-group mb-3">
                            <span class="input-group-text user-select-none w-25"
                                for="id_witel_edit_{{ $modalId }}">WITEL</span>
                            <input class="form-control" id="id_witel_edit_{{ $modalId }}" name="id_witel"
                                value="" aria-label="ID WITEL" disabled>
                            <span class="input-group-text">
                                <i class="bi bi-lock"></i>
                            </span>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text user-select-none w-25"
                                for="id_rekon_edit_{{ $modalId }}">Rekon</span>
                            <input class="form-control" id="id_rekon_edit_{{ $modalId }}" name="id_rekon"
                                aria-label="ID_Rekon_edit" disabled>
                            <span class="input-group-text">
                                <i class="bi bi-lock"></i>
                            </span>
                        </div>
                    @endif
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    @if (strtotime(now()) - strtotime($valin->created_at) < 86400)
                        <button class="btn btn-primary-light" type="button" data-bs-dismiss="modal"
                            aria-label="Close">Batal</button>
                        <button class="btn btn-danger-2" data-bs-target="#editModal" data-bs-toggle="modal"
                            type="submit">
                            <i class='bi bi-arrow-repeat me-1'></i>
                            Ubah
                        </button>
                    @else
                        <button class="btn btn-primary-light" type="button" data-bs-dismiss="modal"
                            aria-label="Close">Tutup</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

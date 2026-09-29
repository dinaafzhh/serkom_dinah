@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    <div class="mb-4">
        <h4 class="fw-bold mb-1">Tambah Galeri</h4>
        <p class="text-muted mb-0">
            Tambahkan foto ke galeri sekolah
        </p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <form action="{{ route('admin.galeri.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                {{-- JUDUL --}}
                <div class="mb-3">
                    <label for="judul" class="form-label fw-semibold">
                        Judul Galeri
                    </label>

                    <input type="text"
                           name="judul"
                           id="judul"
                           class="form-control"
                           value="{{ old('judul') }}"
                           maxlength="100"
                           placeholder="Masukkan judul galeri"
                           required>

                    @error('judul')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                {{-- KETERANGAN --}}
                <div class="mb-3">
                    <label for="keterangan" class="form-label fw-semibold">
                        Keterangan
                    </label>

                    <textarea name="keterangan"
                              id="keterangan"
                              rows="4"
                              class="form-control"
                              placeholder="Masukkan keterangan foto">{{ old('keterangan') }}</textarea>

                    @error('keterangan')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                {{-- KATEGORI --}}
                <div class="mb-3">
                    <label for="kategori" class="form-label fw-semibold">
                        Kategori
                    </label>

                    <select name="kategori"
                            id="kategori"
                            class="form-select"
                            required>

                        <option value="">
                            -- Pilih Kategori --
                        </option>

                        <option value="Kegiatan Sekolah"
                            {{ old('kategori') == 'Kegiatan Sekolah' ? 'selected' : '' }}>
                            Kegiatan Sekolah
                        </option>

                        <option value="Prestasi"
                            {{ old('kategori') == 'Prestasi' ? 'selected' : '' }}>
                            Prestasi
                        </option>

                        <option value="Fasilitas"
                            {{ old('kategori') == 'Fasilitas' ? 'selected' : '' }}>
                            Fasilitas
                        </option>

                        <option value="Lainnya"
                            {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>
                            Lainnya
                        </option>

                    </select>

                    @error('kategori')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                {{-- FOTO --}}
                <div class="mb-3">
                    <label for="file" class="form-label fw-semibold">
                        Foto
                    </label>

                    <input type="file"
                           name="file"
                           id="file"
                           class="form-control"
                           accept=".jpg,.jpeg,.png,.webp"
                           required>

                    <small class="text-muted">
                        Format JPG, JPEG, PNG, WEBP. Maksimal 5 MB.
                    </small>

                    @error('file')
                        <small class="text-danger d-block">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                {{-- TANGGAL --}}
                <div class="mb-4">
                    <label for="tanggal" class="form-label fw-semibold">
                        Tanggal
                    </label>

                    <input type="date"
                           name="tanggal"
                           id="tanggal"
                           class="form-control"
                           value="{{ old('tanggal') }}"
                           required>

                    @error('tanggal')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                {{-- TOMBOL --}}
                <div class="d-flex gap-2">

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>
                        Simpan
                    </button>

                    <a href="{{ route('admin.galeri.galeri') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection


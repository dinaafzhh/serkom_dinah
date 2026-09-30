@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    <div class="mb-4">
        <h4 class="fw-bold mb-1">Edit Galeri</h4>
        <p class="text-muted mb-0">Ubah data galeri sekolah</p>
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

            <form action="{{ route('admin.galeri.update', $galeri->id_galeri) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Judul Galeri
                    </label>

                    <input type="text"
                           name="judul"
                           class="form-control"
                           value="{{ old('judul', $galeri->judul) }}"
                           maxlength="50"
                           required>

                    @error('judul')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Keterangan
                    </label>

                    <textarea name="keterangan"
                              rows="5"
                              class="form-control"
                              required>{{ old('keterangan', $galeri->keterangan) }}</textarea>

                    @error('keterangan')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Kategori
                    </label>

                    <select name="kategori"
                            class="form-select"
                            required>

                        <option value="">-- Pilih Kategori --</option>

                        <option value="Kegiatan Sekolah"
                            {{ old('kategori', $galeri->kategori) == 'Kegiatan Sekolah' ? 'selected' : '' }}>
                            Kegiatan Sekolah
                        </option>

                        <option value="Prestasi"
                            {{ old('kategori', $galeri->kategori) == 'Prestasi' ? 'selected' : '' }}>
                            Prestasi
                        </option>

                        <option value="Fasilitas"
                            {{ old('kategori', $galeri->kategori) == 'Fasilitas' ? 'selected' : '' }}>
                            Fasilitas
                        </option>

                        <option value="Lainnya"
                            {{ old('kategori', $galeri->kategori) == 'Lainnya' ? 'selected' : '' }}>
                            Lainnya
                        </option>

                    </select>

                    @error('kategori')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        File Saat Ini
                    </label>

                    @if ($galeri->file)

                        @php
                            $extension = strtolower(
                                pathinfo($galeri->file, PATHINFO_EXTENSION)
                            );
                        @endphp

                        @if (in_array($extension, ['jpg', 'jpeg', 'png', 'webp']))

                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $galeri->file) }}"
                                     width="250"
                                     height="160"
                                     style="object-fit: cover;"
                                     class="img-thumbnail">
                            </div>

                        @elseif (in_array($extension, ['mp4', 'mov', 'avi', 'webm']))

                            <div class="mb-2">

                                <video width="300"
                                       height="180"
                                       controls
                                       style="object-fit: cover;"
                                       class="rounded border">

                                    <source src="{{ asset('storage/' . $galeri->file) }}"
                                            type="video/{{ $extension }}">

                                    Browser kamu tidak mendukung video.

                                </video>

                            </div>

                        @else

                            <div class="alert alert-secondary">
                                File:
                                <strong>
                                    {{ basename($galeri->file) }}
                                </strong>
                            </div>

                        @endif

                    @else

                        <p class="text-muted">
                            Belum ada file.
                        </p>

                    @endif

                </div>

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Ganti File
                    </label>

                    <input type="file"
                           name="file"
                           class="form-control"
                           accept="image/jpeg,image/png,image/webp,video/mp4,video/webm,video/quicktime">

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti file.
                    </small>

                    @error('file')
                        <small class="text-danger d-block">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Tanggal
                    </label>

                    <input type="date"
                           name="tanggal"
                           class="form-control"
                           value="{{ old('tanggal', \Carbon\Carbon::parse($galeri->tanggal)->format('Y-m-d')) }}"
                           required>

                    @error('tanggal')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>
                
                <div class="d-flex gap-2">

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="bi bi-save me-1"></i>
                        Simpan Perubahan

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


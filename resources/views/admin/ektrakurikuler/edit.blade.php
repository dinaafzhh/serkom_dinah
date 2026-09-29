@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="mb-4">
        <h4 class="fw-bold mb-1">
            Edit Ekstrakurikuler
        </h4>

        <p class="text-muted mb-0">
            Perbarui informasi kegiatan ekstrakurikuler
        </p>
    </div>


    {{-- ERROR --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Data belum berhasil disimpan.</strong>

            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- CARD --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <h5 class="mb-0 fw-semibold">
                Form Edit Ekstrakurikuler
            </h5>

        </div>


        <div class="card-body p-4">

            <form
                action="{{ route('admin.ektrakurikuler.update', ['id' => $ekstrakurikuler->id_ekskul]) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                @method('PUT')


                {{-- NAMA EKSKUL --}}
                <div class="mb-3">

                    <label for="nama_ekskul"
                           class="form-label fw-semibold">

                        Nama Ekstrakurikuler

                    </label>

                    <input
                        type="text"
                        id="nama_ekskul"
                        name="nama_ekskul"
                        class="form-control @error('nama_ekskul') is-invalid @enderror"
                        value="{{ old('nama_ekskul', $ekstrakurikuler->nama_ekskul) }}"
                        maxlength="40"
                        required
                    >

                    @error('nama_ekskul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- PEMBINA --}}
                <div class="mb-3">

                    <label for="pembina"
                           class="form-label fw-semibold">

                        Nama Pembina

                    </label>

                    <input
                        type="text"
                        id="pembina"
                        name="pembina"
                        class="form-control @error('pembina') is-invalid @enderror"
                        value="{{ old('pembina', $ekstrakurikuler->pembina) }}"
                        maxlength="40"
                        required
                    >

                    @error('pembina')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- JADWAL --}}
                <div class="mb-3">

                    <label for="jadwal_latihan"
                           class="form-label fw-semibold">

                        Jadwal Latihan

                    </label>

                    <input
                        type="text"
                        id="jadwal_latihan"
                        name="jadwal_latihan"
                        class="form-control @error('jadwal_latihan') is-invalid @enderror"
                        value="{{ old('jadwal_latihan', $ekstrakurikuler->jadwal_latihan) }}"
                        maxlength="40"
                        required
                    >

                    @error('jadwal_latihan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- DESKRIPSI --}}
                <div class="mb-3">

                    <label for="deskripsi"
                           class="form-label fw-semibold">

                        Deskripsi

                    </label>

                    <textarea
                        id="deskripsi"
                        name="deskripsi"
                        rows="6"
                        class="form-control @error('deskripsi') is-invalid @enderror"
                        required
                    >{{ old('deskripsi', $ekstrakurikuler->deskripsi) }}</textarea>

                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- GAMBAR SAAT INI --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Gambar Saat Ini
                    </label>

                    @if($ekstrakurikuler->gambar)

                        <div class="mb-2">

                            <img
                                src="{{ asset('storage/' . $ekstrakurikuler->gambar) }}"
                                alt="Gambar Ekstrakurikuler"
                                width="180"
                                height="120"
                                class="rounded border"
                                style="object-fit: cover;"
                            >

                        </div>

                    @else

                        <p class="text-muted">
                            Belum ada gambar.
                        </p>

                    @endif

                </div>


                {{-- GANTI GAMBAR --}}
                <div class="mb-4">

                    <label for="gambar"
                           class="form-label fw-semibold">

                        Ganti Gambar

                    </label>

                    <input
                        type="file"
                        id="gambar"
                        name="gambar"
                        class="form-control @error('gambar') is-invalid @enderror"
                        accept="image/jpeg,image/png,image/webp"
                    >

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti gambar.
                        Format JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                    </small>

                    @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- BUTTON --}}
                <div class="d-flex gap-2">

                    <a
                        href="{{ route('admin.ektrakurikuler.ektrakurikuler') }}"
                        class="btn btn-secondary"
                    >

                        <i class="bi bi-arrow-left me-1"></i>

                        Kembali

                    </a>


                    <button
                        type="submit"
                        class="btn btn-primary"
                    >

                        <i class="bi bi-save me-1"></i>

                        Simpan Perubahan

                    </button>

                </div>


            </form>

        </div>

    </div>

</div>

@endsection

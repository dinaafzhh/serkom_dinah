@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4 py-4">

    <div class="mb-4">
        <h1 class="h3 mb-1 text-dark fw-bold">Edit Data Guru</h1>

        <p class="text-muted mb-0">
            Perbarui informasi data guru.
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

            <form
                action="{{ route('admin.guru.update', $guru->id_guru) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')


                <div class="mb-3">

                    <label
                        for="nama_guru"
                        class="form-label fw-semibold"
                    >
                        Nama Guru
                    </label>

                    <input
                        type="text"
                        name="nama_guru"
                        id="nama_guru"
                        class="form-control @error('nama_guru') is-invalid @enderror"
                        value="{{ old('nama_guru', $guru->nama_guru) }}"
                        placeholder="Masukkan nama guru"
                        maxlength="40"
                        required
                    >

                    @error('nama_guru')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="mb-3">

                    <label
                        for="nip"
                        class="form-label fw-semibold"
                    >
                        NIP
                    </label>

                    <input
                        type="text"
                        name="nip"
                        id="nip"
                        class="form-control @error('nip') is-invalid @enderror"
                        value="{{ old('nip', $guru->nip) }}"
                        placeholder="Masukkan NIP"
                        maxlength="50"
                        required
                    >

                    @error('nip')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <small class="text-muted">
                        NIP boleh berupa huruf, angka, atau gabungan.
                    </small>

                </div>

                <div class="mb-3">

                    <label
                        for="mapel"
                        class="form-label fw-semibold"
                    >
                        Mata Pelajaran
                    </label>

                    <input
                        type="text"
                        name="mapel"
                        id="mapel"
                        class="form-control @error('mapel') is-invalid @enderror"
                        value="{{ old('mapel', $guru->mapel) }}"
                        placeholder="Masukkan mata pelajaran"
                        maxlength="40"
                        required
                    >

                    @error('mapel')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Foto Saat Ini
                    </label>

                    <div>

                        @if($guru->foto)

                            <img
                                src="{{ asset('storage/' . $guru->foto) }}"
                                alt="{{ $guru->nama_guru }}"
                                width="120"
                                height="120"
                                style="
                                    object-fit: cover;
                                    border-radius: 8px;
                                "
                            >

                        @else

                            <div class="text-muted">
                                Belum ada foto
                            </div>

                        @endif

                    </div>

                </div>

                <div class="mb-4">

                    <label
                        for="foto"
                        class="form-label fw-semibold"
                    >
                        Ganti Foto
                    </label>

                    <input
                        type="file"
                        name="foto"
                        id="foto"
                        class="form-control @error('foto') is-invalid @enderror"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti foto.
                        Maksimal 5 MB.
                    </small>

                    @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="d-flex gap-2">

                    <a
                        href="{{ route('admin.guru.guru') }}"
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

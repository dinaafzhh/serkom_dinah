@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4 py-4">

    <div class="mb-4">
        <h1 class="h3 mb-1 text-dark fw-bold">
            Edit Data Siswa
        </h1>

        <p class="text-muted mb-0">
            Perbarui informasi data siswa.
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
                action="{{ route('admin.siswa.update', $siswa->id_siswa) }}"
                method="POST"
            >

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label
                        for="nisn"
                        class="form-label fw-semibold"
                    >
                        NISN
                    </label>

                    <input
                        type="text"
                        name="nisn"
                        id="nisn"
                        class="form-control @error('nisn') is-invalid @enderror"
                        value="{{ old('nisn', $siswa->nisn) }}"
                        placeholder="Masukkan NISN"
                        maxlength="10"
                        required
                    >

                    @error('nisn')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>

                <div class="mb-3">

                    <label
                        for="nama_siswa"
                        class="form-label fw-semibold"
                    >
                        Nama Siswa
                    </label>

                    <input
                        type="text"
                        name="nama_siswa"
                        id="nama_siswa"
                        class="form-control @error('nama_siswa') is-invalid @enderror"
                        value="{{ old('nama_siswa', $siswa->nama_siswa) }}"
                        placeholder="Masukkan nama siswa"
                        maxlength="40"
                        required
                    >

                    @error('nama_siswa')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- JENIS KELAMIN --}}
                <div class="mb-3">

                    <label
                        for="jenis_kelamin"
                        class="form-label fw-semibold"
                    >
                        Jenis Kelamin
                    </label>

                    <select
                        name="jenis_kelamin"
                        id="jenis_kelamin"
                        class="form-select @error('jenis_kelamin') is-invalid @enderror"
                        required
                    >

                        <option value="">
                            -- Pilih Jenis Kelamin --
                        </option>

                        <option
                            value="Laki-Laki"
                            {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}
                        >
                            Laki-Laki
                        </option>

                        <option
                            value="Perempuan"
                            {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}
                        >
                            Perempuan
                        </option>

                    </select>

                    @error('jenis_kelamin')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- TAHUN MASUK --}}
                <div class="mb-4">

                    <label
                        for="tahun_masuk"
                        class="form-label fw-semibold"
                    >
                        Tahun Masuk
                    </label>

                    <input
                        type="number"
                        name="tahun_masuk"
                        id="tahun_masuk"
                        class="form-control @error('tahun_masuk') is-invalid @enderror"
                        value="{{ old('tahun_masuk', $siswa->tahun_masuk) }}"
                        min="1900"
                        max="2100"
                        placeholder="Contoh: 2024"
                        required
                    >

                    @error('tahun_masuk')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- BUTTON --}}
                <div class="d-flex gap-2">

                    <a
                        href="{{ route('admin.siswa.siswa') }}"
                        class="btn btn-secondary"
                    >
                        <i class="fas fa-arrow-left me-1"></i>
                        Kembali
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i class="fas fa-save me-1"></i>
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection

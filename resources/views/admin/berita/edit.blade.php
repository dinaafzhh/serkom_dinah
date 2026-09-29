@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="mb-4">
        <h4 class="fw-bold mb-1">
            Edit Berita
        </h4>

        <p class="text-muted mb-0">
            Perbarui informasi berita sekolah
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


    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form
                action="{{ route('admin.berita.update', ['id' => $berita->id_berita]) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')


                {{-- JUDUL --}}
                <div class="mb-3">

                    <label
                        for="judul"
                        class="form-label fw-semibold"
                    >
                        Judul Berita
                    </label>

                    <input
                        type="text"
                        id="judul"
                        name="judul"
                        class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul', $berita->judul) }}"
                        maxlength="50"
                        required
                    >

                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- ISI BERITA --}}
                <div class="mb-3">

                    <label
                        for="isi"
                        class="form-label fw-semibold"
                    >
                        Isi Berita
                    </label>

                    <textarea
                        id="isi"
                        name="isi"
                        rows="8"
                        class="form-control @error('isi') is-invalid @enderror"
                        required
                    >{{ old('isi', $berita->isi) }}</textarea>

                    @error('isi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- TANGGAL --}}
                <div class="mb-3">

                    <label
                        for="tanggal"
                        class="form-label fw-semibold"
                    >
                        Tanggal
                    </label>

                    <input
                        type="date"
                        id="tanggal"
                        name="tanggal"
                        class="form-control @error('tanggal') is-invalid @enderror"
                        value="{{ old('tanggal', \Carbon\Carbon::parse($berita->tanggal)->format('Y-m-d')) }}"
                        required
                    >

                    @error('tanggal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- GAMBAR --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Gambar Saat Ini
                    </label>

                    @if($berita->gambar)

                        <div class="mb-3">

                            <img
                                src="{{ asset('storage/' . $berita->gambar) }}"
                                alt="Gambar Berita"
                                width="150"
                                height="100"
                                class="rounded border"
                                style="object-fit: cover;"
                            >

                        </div>

                    @else

                        <p class="text-muted">
                            Belum ada gambar.
                        </p>

                    @endif


                    <label
                        for="gambar"
                        class="form-label fw-semibold"
                    >
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
                        Maksimal 2 MB.
                    </small>

                    @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- STATUS --}}
                <div class="mb-3">

                    <label
                        for="status"
                        class="form-label fw-semibold"
                    >
                        Status
                    </label>

                    <select
                        id="status"
                        name="status"
                        class="form-select @error('status') is-invalid @enderror"
                        required
                    >

                        <option
                            value="Publish"
                            {{ old('status', $berita->status) == 'Publish' ? 'selected' : '' }}
                        >
                            Publish
                        </option>

                        <option
                            value="Draft"
                            {{ old('status', $berita->status) == 'Draft' ? 'selected' : '' }}
                        >
                            Draft
                        </option>

                    </select>

                    @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- PENULIS --}}
                <div class="mb-4">

                    <label
                        for="id_user"
                        class="form-label fw-semibold"
                    >
                        Penulis
                    </label>

                    <select
                        id="id_user"
                        name="id_user"
                        class="form-select @error('id_user') is-invalid @enderror"
                        required
                    >

                        @foreach($users as $user)

                            <option
                                value="{{ $user->id_user }}"
                                {{ old('id_user', $berita->id_user) == $user->id_user ? 'selected' : '' }}
                            >
                                {{ $user->username }}
                            </option>

                        @endforeach

                    </select>

                    @error('id_user')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- BUTTON --}}
                <div class="d-flex gap-2">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i class="bi bi-save me-1"></i>
                        Simpan Perubahan
                    </button>


                    <a
                        href="{{ route('admin.berita.berita') }}"
                        class="btn btn-secondary"
                    >
                        <i class="bi bi-arrow-left me-1"></i>
                        Kembali
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection

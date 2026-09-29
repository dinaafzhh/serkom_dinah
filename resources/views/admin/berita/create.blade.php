@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    <div class="mb-4">
        <h4 class="fw-bold mb-1">Tambah Berita</h4>
        <p class="text-muted mb-0">Tambahkan berita baru sekolah</p>
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

            <form action="{{ route('admin.berita.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  id="formBerita">

                @csrf

                {{-- JUDUL BERITA --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Judul Berita
                    </label>

                    <input type="text"
                           name="judul"
                           class="form-control"
                           value="{{ old('judul') }}"
                           maxlength="50"
                           required>

                    @error('judul')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- ISI BERITA --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Isi Berita
                    </label>

                    <textarea name="isi"
                              rows="6"
                              class="form-control"
                              required>{{ old('isi') }}</textarea>

                    @error('isi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- TANGGAL --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Tanggal
                    </label>

                    <input type="date"
                           name="tanggal"
                           class="form-control"
                           value="{{ old('tanggal') }}"
                           required>

                    @error('tanggal')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- GAMBAR --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Gambar Berita
                    </label>

                    <input type="file"
                           name="gambar"
                           class="form-control"
                           accept="image/*">

                    <small class="text-muted">
                        Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    </small>

                    @error('gambar')
                        <small class="text-danger d-block">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                {{-- STATUS --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Status
                    </label>

                    <select name="status"
                            class="form-select"
                            required>

                        <option value="">-- Pilih Status --</option>

                        <option value="Publish"
                            {{ old('status') == 'Publish' ? 'selected' : '' }}>
                            Publish
                        </option>

                        <option value="Draft"
                            {{ old('status') == 'Draft' ? 'selected' : '' }}>
                            Draft
                        </option>

                    </select>

                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- PENULIS --}}
                <div class="mb-4">
                    <label for="penulis" class="form-label fw-semibold">
                        Penulis
                    </label>

                    <input type="text"
                           id="penulis"
                           class="form-control"
                           list="daftarPenulis"
                           placeholder="Ketik username penulis..."
                           autocomplete="off"
                           value="{{ old('penulis') }}">

                    <datalist id="daftarPenulis">

                        @foreach($users as $user)
                            <option value="{{ $user->username }}">
                        @endforeach

                    </datalist>

                    {{-- ID USER YANG AKAN DIKIRIM KE DATABASE --}}
                    <input type="hidden"
                           name="id_user"
                           id="id_user"
                           value="{{ old('id_user') }}">

                    <small id="statusPenulis" class="text-muted">
                        Ketik lalu pilih username penulis.
                    </small>

                    @error('id_user')
                        <small class="text-danger d-block">
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

                    <a href="{{ route('admin.berita.berita') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>

                </div>

            </form>

        </div>
    </div>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const penulis = document.getElementById('penulis');
    const idUser = document.getElementById('id_user');
    const statusPenulis = document.getElementById('statusPenulis');
    const formBerita = document.getElementById('formBerita');

    const users = @json(
        $users->map(function ($user) {
            return [
                'id' => $user->id_user,
                'username' => $user->username
            ];
        })->values()
    );

    penulis.addEventListener('input', function () {

        const username = this.value.trim();

        const user = users.find(function (item) {
            return item.username === username;
        });

        if (user) {

            idUser.value = user.id;

            statusPenulis.textContent =
                'Penulis dipilih: ' + user.username;

            statusPenulis.className = 'text-success';

        } else {

            idUser.value = '';

            statusPenulis.textContent =
                'Pilih username yang tersedia dari daftar.';

            statusPenulis.className = 'text-danger';

        }

    });


    formBerita.addEventListener('submit', function (event) {

        if (idUser.value === '') {

            event.preventDefault();

            alert('Silakan pilih Penulis terlebih dahulu.');

            penulis.focus();

        }

    });

});

</script>

@endsection


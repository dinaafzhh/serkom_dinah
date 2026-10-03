@extends('layouts.admin')

@section('content')

<style>

    .profil-form-page {
        background: #f5f6f8;
        min-height: 100vh;
        padding: 30px 20px 60px;
    }

    .profil-form-container {
        max-width: 1000px;
        margin: auto;
    }

    .form-header {
        background: linear-gradient(135deg, #374151, #6b7280);
        border-radius: 12px;
        padding: 30px 35px;
        color: white;
        margin-bottom: 25px;
    }

    .form-header h1 {
        margin: 0 0 8px;
        font-size: 28px;
    }

    .form-header p {
        margin: 0;
        color: #e5e7eb;
        font-size: 14px;
    }

    .form-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 35px;
    }

    .form-section {
        margin-bottom: 30px;
        padding-bottom: 25px;
        border-bottom: 1px solid #e5e7eb;
    }

    .form-section:last-child {
        border-bottom: none;
        margin-bottom: 0;
    }

    .form-section h2 {
        color: #374151;
        font-size: 20px;
        margin: 0 0 20px;
        border-left: 5px solid #6b7280;
        padding-left: 12px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    .form-group label {
        display: block;
        color: #374151;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        padding: 11px 13px;
        font-size: 14px;
        color: #374151;
        background: #fff;
        outline: none;
        transition: .2s;
        font-family: inherit;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #6b7280;
        box-shadow: 0 0 0 3px rgba(107, 114, 128, .12);
    }

    .form-group textarea {
        min-height: 150px;
        resize: vertical;
        line-height: 1.7;
    }

    .form-help {
        display: block;
        color: #9ca3af;
        font-size: 12px;
        margin-top: 6px;
    }

    .error-message {
        color: #dc2626;
        font-size: 12px;
        margin-top: 5px;
    }

    .current-photo {
        margin-bottom: 20px;
    }

    .current-photo-title {
        color: #374151;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .current-photo img {
        width: 270px;
        height: 335px;
        object-fit: cover;
        border-radius: 10px;
        border: 1px solid #d1d5db;
        display: block;
    }

    .no-photo {
        width: 270px;
        height: 335px;
        border-radius: 10px;
        border: 1px dashed #d1d5db;
        background: #f9fafb;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        gap: 8px;
        color: #9ca3af;
        font-size: 13px;
    }

    .no-photo i {
        font-size: 45px;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 25px;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 11px 18px;
        border-radius: 8px;
        border: none;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: .2s;
    }

    .btn-back {
        background: #f3f4f6;
        color: #374151;
    }

    .btn-back:hover {
        background: #e5e7eb;
        color: #111827;
    }

    .btn-save {
        background: #374151;
        color: white;
    }

    .btn-save:hover {
        background: #1f2937;
        color: white;
        transform: translateY(-1px);
    }

    @media (max-width: 768px) {

        .profil-form-page {
            padding: 15px 10px 40px;
        }

        .form-card {
            padding: 25px 20px;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }

        .form-header {
            padding: 25px;
        }

        .form-header h1 {
            font-size: 24px;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn {
            width: 100%;
        }

        .current-photo img,
        .no-photo {
            width: 220px;
            height: 280px;
        }

    }

</style>

<div class="profil-form-page">

    <div class="profil-form-container">

        <div class="form-header">

            <h1>
                Edit Profil Sekolah
            </h1>

            <p>
                Perbarui informasi profil dan sambutan Kepala Sekolah SMK YPC Tasikmalaya.
            </p>

        </div>

        <div class="form-card">

            <form
                action="{{ route('admin.profil.update', $profil->id_profil) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                @method('PUT')

                <div class="form-section">

                    <h2>
                        Informasi Sekolah
                    </h2>

                    <div class="form-grid">

                        <div class="form-group">

                            <label for="nama_sekolah">
                                Nama Sekolah
                            </label>

                            <input
                                type="text"
                                id="nama_sekolah"
                                name="nama_sekolah"
                                value="{{ old('nama_sekolah', $profil->nama_sekolah) }}"
                                placeholder="Masukkan nama sekolah"
                                required
                            >

                            @error('nama_sekolah')

                                <div class="error-message">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                        <div class="form-group">

                            <label for="kepala_sekolah">
                                Kepala Sekolah
                            </label>

                            <input
                                type="text"
                                id="kepala_sekolah"
                                name="kepala_sekolah"
                                value="{{ old('kepala_sekolah', 'Drs. Ujang Sanusi, M.M') }}"
                                placeholder="Masukkan nama kepala sekolah"
                            >

                            @error('kepala_sekolah')

                                <div class="error-message">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                </div>

                <div class="form-section">

                    <h2>
                        Sambutan Kepala Sekolah
                    </h2>

                    <div class="form-group">

                        <label for="deskripsi">
                            Isi Sambutan
                        </label>

                        <textarea
                            id="deskripsi"
                            name="deskripsi"
                            placeholder="Masukkan sambutan Kepala Sekolah"
                        >{{ old('deskripsi', $profil->deskripsi ?: 'Puji syukur ke hadirat Tuhan YME atas segala rahmat dan karunia-Nya. Selamat datang di website resmi sekolah kami. Website ini kami hadirkan sebagai sarana informasi dan komunikasi antara sekolah dengan orang tua, peserta didik, serta masyarakat luas.

Melalui media ini, kami berharap seluruh informasi mengenai kegiatan, prestasi, serta program pendidikan dapat tersampaikan secara transparan, cepat, dan akurat.') }}</textarea>

                        <span class="form-help">
                            Isi sambutan yang akan ditampilkan pada bagian Sambutan Kepala Sekolah.
                        </span>

                        @error('deskripsi')

                            <div class="error-message">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                </div>

                <div class="form-section">

                    <h2>
                        Visi & Misi
                    </h2>

                    <div class="form-group">

                        <label for="visi_misi">
                            Visi & Misi
                        </label>

                        <textarea
                            id="visi_misi"
                            name="visi_misi"
                            placeholder="Masukkan visi dan misi sekolah"
                        >{{ old('visi_misi', $profil->visi_misi) }}</textarea>

                        <span class="form-help">
                            Masukkan visi dan misi SMK YPC Tasikmalaya.
                        </span>

                        @error('visi_misi')

                            <div class="error-message">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                </div>

                <div class="form-section">

                    <h2>
                        Foto Kepala Sekolah
                    </h2>

                    <div class="form-group">

                        <div class="current-photo">

                            <div class="current-photo-title">
                                Foto Saat Ini
                            </div>

                            @if($profil->foto)

                                <img
                                    src="{{ asset('storage/' . $profil->foto) }}"
                                    alt="Foto Kepala Sekolah"
                                >

                            @else

                                <div class="no-photo">

                                    <i class="fa-solid fa-user-tie"></i>

                                    <span>
                                        Belum ada foto
                                    </span>

                                </div>

                            @endif

                        </div>

                        <label for="foto">
                            Ganti Foto Kepala Sekolah
                        </label>

                        <input
                            type="file"
                            id="foto"
                            name="foto"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                        <span class="form-help">
                            Kosongkan jika tidak ingin mengganti foto.
                        </span>

                        <span class="form-help">
                            Format JPG, JPEG, PNG, atau WEBP. Maksimal 5MB.
                        </span>

                        @error('foto')

                            <div class="error-message">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                </div>

                <div class="form-actions">

                    <a
                        href="{{ route('admin.profil.profil') }}"
                        class="btn btn-back"
                    >
                        <i class="fa-solid fa-arrow-left"></i>
                        Kembali
                    </a>

                    <button
                        type="submit"
                        class="btn btn-save"
                    >
                        <i class="fa-solid fa-floppy-disk"></i>
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection

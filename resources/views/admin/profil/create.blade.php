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
        min-height: 130px;
        resize: vertical;
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
    }

    .btn-save {
        background: #374151;
        color: white;
    }

    .btn-save:hover {
        background: #1f2937;
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
    }
</style>

<div class="profil-form-page">

    <div class="profil-form-container">

        <div class="form-header">
            <h1>Tambah Profil Sekolah</h1>
            <p>Tambahkan informasi utama dan identitas SMK YPC Tasikmalaya.</p>
        </div>

        <div class="form-card">

            <form action="{{ route('admin.profil.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="form-section">

                    <h2>Informasi Sekolah</h2>

                    <div class="form-grid">

                        <div class="form-group">
                            <label for="nama_sekolah">Nama Sekolah</label>

                            <input
                                type="text"
                                id="nama_sekolah"
                                name="nama_sekolah"
                                value="{{ old('nama_sekolah') }}"
                                placeholder="Masukkan nama sekolah"
                                required
                            >

                            @error('nama_sekolah')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kepala_sekolah">Kepala Sekolah</label>

                            <input
                                type="text"
                                id="kepala_sekolah"
                                name="kepala_sekolah"
                                value="{{ old('kepala_sekolah') }}"
                                placeholder="Masukkan nama kepala sekolah"
                            >

                            @error('kepala_sekolah')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="npsn">NPSN</label>

                            <input
                                type="text"
                                id="npsn"
                                name="npsn"
                                value="{{ old('npsn') }}"
                                placeholder="Masukkan NPSN"
                            >

                            @error('npsn')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tahun_berdiri">Tahun Berdiri</label>

                            <input
                                type="number"
                                id="tahun_berdiri"
                                name="tahun_berdiri"
                                value="{{ old('tahun_berdiri') }}"
                                placeholder="Contoh: 1995"
                            >

                            @error('tahun_berdiri')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kontak">Kontak</label>

                            <input
                                type="text"
                                id="kontak"
                                name="kontak"
                                value="{{ old('kontak') }}"
                                placeholder="Nomor telepon atau kontak sekolah"
                            >

                            @error('kontak')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>

                            <input
                                type="text"
                                id="alamat"
                                name="alamat"
                                value="{{ old('alamat') }}"
                                placeholder="Alamat sekolah"
                            >

                            @error('alamat')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                </div>

                <div class="form-section">

                    <h2>Visi & Deskripsi</h2>

                    <div class="form-grid">

                        <div class="form-group full">
                            <label for="visi_misi">Visi & Misi</label>

                            <textarea
                                id="visi_misi"
                                name="visi_misi"
                                placeholder="Masukkan visi dan misi sekolah"
                            >{{ old('visi_misi') }}</textarea>

                            @error('visi_misi')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group full">
                            <label for="deskripsi">Deskripsi Sekolah</label>

                            <textarea
                                id="deskripsi"
                                name="deskripsi"
                                placeholder="Masukkan deskripsi sekolah"
                            >{{ old('deskripsi') }}</textarea>

                            @error('deskripsi')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                </div>

                <div class="form-section">

                    <h2>Foto & Logo</h2>

                    <div class="form-grid">

                        <div class="form-group">
                            <label for="foto">Foto Sekolah</label>

                            <input
                                type="file"
                                id="foto"
                                name="foto"
                                accept="image/*"
                            >

                            <span class="form-help">
                                Format JPG, JPEG, PNG, atau WEBP.
                            </span>

                            @error('foto')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="logo">Logo Sekolah</label>

                            <input
                                type="file"
                                id="logo"
                                name="logo"
                                accept="image/*"
                            >

                            <span class="form-help">
                                Format JPG, JPEG, PNG, atau WEBP.
                            </span>

                            @error('logo')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                </div>

                <div class="form-actions">

                    <a
                        href="{{ route('admin.profil.profil') }}"
                        class="btn btn-back"
                    >
                        <i class="bi bi-arrow-left"></i>
                        Kembali
                    </a>

                    <button
                        type="submit"
                        class="btn btn-save"
                    >
                        <i class="bi bi-save"></i>
                        Simpan Profil
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection

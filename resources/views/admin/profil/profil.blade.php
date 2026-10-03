@extends('layouts.admin')

@section('content')

<style>
    .profil-page {
        background: #f5f6f8;
        min-height: 100vh;
        padding: 30px 20px 60px;
    }

    .profil-container {
        max-width: 1150px;
        margin: auto;
    }

    .profil-hero {
        background: linear-gradient(135deg, #374151, #e5e7eb);
        border-left: 6px solid #6b7280;
        border-radius: 12px;
        padding: 45px;
        margin-bottom: 25px;
        color: white;
    }

    .hero-content {
        display: flex;
        align-items: center;
        gap: 45px;
    }

    .hero-text {
        flex: 1;
    }

    .hero-label {
        color: #f3f4f6;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 12px;
    }

    .hero-text h1 {
        color: white;
        font-size: 36px;
        font-weight: 700;
        line-height: 1.25;
        margin-bottom: 15px;
    }

    .hero-text p {
        color: #f3f4f6;
        font-size: 15px;
        line-height: 1.8;
        margin: 0 0 20px;
    }

    .hero-buttons {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .btn-profil {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 18px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-edit {
        background: white;
        color: #374151;
    }

    .btn-edit:hover {
        background: #f3f4f6;
        color: #111827;
        transform: translateY(-2px);
    }

    .btn-delete {
        background: #6b7280;
        color: white;
    }

    .btn-delete:hover {
        background: #4b5563;
        color: white;
        transform: translateY(-2px);
    }

    .btn-tambah {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 20px;
        background: #374151;
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
    }

    .btn-tambah:hover {
        background: #111827;
        color: white;
    }

    .hero-image {
        width: 47%;
        height: 300px;
        flex-shrink: 0;
        border-radius: 10px;
        overflow: hidden;
        background: #e5e7eb;
        border: 4px solid rgba(255,255,255,0.3);
    }

    .hero-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .profil-content {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 50px;
    }

    .profil-section {
        padding-bottom: 40px;
        margin-bottom: 40px;
        border-bottom: 1px solid #e5e7eb;
    }

    .profil-section:last-child {
        padding-bottom: 0;
        margin-bottom: 0;
        border-bottom: none;
    }

    .profil-section h2 {
        color: #374151;
        font-size: 23px;
        font-weight: 700;
        margin-bottom: 18px;
        border-left: 5px solid #6b7280;
        padding-left: 12px;
    }

    .profil-section p {
        color: #596273;
        font-size: 15px;
        line-height: 2;
        margin-bottom: 16px;
    }

    .visi-text {
        background: #f3f4f6;
        border-left: 4px solid #6b7280;
        border-radius: 5px;
        padding: 22px 25px;
        color: #4b5563;
        font-size: 16px;
        line-height: 1.9;
        font-style: italic;
    }

    .identitas-wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 25px;
        margin-bottom: 0;
    }

    .identitas-card {
        background: #f8f9fc;
        border-top: 4px solid #6b7280;
        border-radius: 10px;
        padding: 25px;
    }

    .identitas-card h3 {
        color: #374151;
        font-size: 19px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .identitas-item {
        padding: 10px 0;
        border-bottom: 1px solid #e5e7eb;
        color: #596273;
    }

    .identitas-item:last-child {
        border-bottom: none;
    }

    .identitas-item strong {
        display: block;
        color: #374151;
        margin-bottom: 3px;
    }

    .contact-wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 50px;
    }

    .contact-title {
        color: #374151;
        font-size: 15px;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .contact-text {
        color: #6b7280;
        font-size: 14px;
        line-height: 1.9;
    }

    .alert-success {
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        color: #166534;
        border-radius: 8px;
        padding: 13px 16px;
        margin-bottom: 20px;
    }

    .empty-profil {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 70px 30px;
        text-align: center;
    }

    .empty-profil i {
        font-size: 50px;
        color: #9ca3af;
        margin-bottom: 15px;
    }

    .empty-profil h3 {
        color: #374151;
        margin-bottom: 8px;
    }

    .empty-profil p {
        color: #6b7280;
        margin-bottom: 20px;
    }

    .profil-footer {
        text-align: center;
        margin-top: 25px;
        color: #9ca3af;
        font-size: 13px;
    }

    @media (max-width: 768px) {
        .profil-page {
            padding: 15px 10px 40px;
        }

        .profil-hero {
            padding: 25px;
        }

        .hero-content {
            flex-direction: column;
            gap: 25px;
        }

        .hero-text {
            width: 100%;
            text-align: center;
        }

        .hero-text h1 {
            font-size: 28px;
        }

        .hero-buttons {
            justify-content: center;
        }

        .hero-image {
            width: 100%;
            height: 240px;
        }

        .profil-content {
            padding: 30px 25px;
        }

        .contact-wrapper,
        .identitas-wrapper {
            grid-template-columns: 1fr;
            gap: 25px;
        }

        .profil-section h2 {
            font-size: 21px;
        }
    }
</style>

<div class="profil-page">

    <div class="profil-container">

        @if(session('success'))
            <div class="alert-success">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('success') }}
            </div>
        @endif

        @if($profil)

            <div class="profil-hero">

                <div class="hero-content">

                    <div class="hero-text">

                        <div class="hero-label">
                            Profil Sekolah
                        </div>

                        <h1>
                            {{ $profil->nama_sekolah }}
                        </h1>

                        <p>
                            {{ $profil->deskripsi ?: 'Informasi profil SMK YPC Tasikmalaya.' }}
                        </p>

                        <div class="hero-buttons">

                            <a href="{{ route('admin.profil.edit', $profil->id_profil) }}"
                               class="btn-profil btn-edit">
                                <i class="bi bi-pencil-square"></i>
                                Edit Profil
                            </a>

                            <form action="{{ route('admin.profil.destroy', $profil->id_profil) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus profil sekolah?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn-profil btn-delete">
                                    <i class="bi bi-trash"></i>
                                    Hapus
                                </button>
                            </form>

                        </div>

                    </div>

                    <div class="hero-image">

                        @if($profil->foto)
                            <img src="{{ asset('storage/' . $profil->foto) }}"
                                 alt="Foto {{ $profil->nama_sekolah }}">
                        @else
                            <img src="{{ asset('assets/images/smk.jpg') }}"
                                 alt="Foto SMK YPC Tasikmalaya">
                        @endif

                    </div>

                </div>

            </div>

            <div class="profil-content">

                <div class="profil-section">

                    <h2>
                        Tentang {{ $profil->nama_sekolah }}
                    </h2>

                    <p>
                        {{ $profil->deskripsi ?: 'Belum ada deskripsi sekolah.' }}
                    </p>

                </div>

                <div class="profil-section">

                    <h2>
                        Identitas Sekolah
                    </h2>

                    <div class="identitas-wrapper">

                        <div class="identitas-card">

                            <h3>
                                <i class="bi bi-building me-2"></i>
                                Informasi Sekolah
                            </h3>

                            <div class="identitas-item">
                                <strong>Nama Sekolah</strong>
                                {{ $profil->nama_sekolah }}
                            </div>

                            <div class="identitas-item">
                                <strong>Kepala Sekolah</strong>
                                {{ $profil->kepala_sekolah ?: '-' }}
                            </div>

                            <div class="identitas-item">
                                <strong>NPSN</strong>
                                {{ $profil->npsn ?: '-' }}
                            </div>

                            <div class="identitas-item">
                                <strong>Tahun Berdiri</strong>
                                {{ $profil->tahun_berdiri ?: '-' }}
                            </div>

                        </div>

                        <div class="identitas-card">

                            <h3>
                                <i class="bi bi-geo-alt me-2"></i>
                                Lokasi Sekolah
                            </h3>

                            <div class="identitas-item">
                                <strong>Alamat</strong>
                                {{ $profil->alamat ?: '-' }}
                            </div>

                            <div class="identitas-item">
                                <strong>Kontak</strong>
                                {{ $profil->kontak ?: '-' }}
                            </div>

                        </div>

                    </div>

                </div>

                <div class="profil-section">

                    <h2>
                        Visi & Misi
                    </h2>

                    <div class="visi-text">
                        {!! nl2br(e($profil->visi_misi ?: 'Belum ada visi dan misi.')) !!}
                    </div>

                </div>

                <div class="profil-section">

                    <h2>
                        Alamat & Kontak
                    </h2>

                    <div class="contact-wrapper">

                        <div>
                            <div class="contact-title">
                                Alamat Sekolah
                            </div>

                            <div class="contact-text">
                                {!! nl2br(e($profil->alamat ?: '-')) !!}
                            </div>
                        </div>

                        <div>
                            <div class="contact-title">
                                Informasi Sekolah
                            </div>

                            <div class="contact-text">
                                Nama : {{ $profil->nama_sekolah }}<br>
                                Kepala Sekolah : {{ $profil->kepala_sekolah ?: '-' }}<br>
                                Kontak : {{ $profil->kontak ?: '-' }}
                            </div>
                        </div>

                    </div>

                </div>

                <div class="profil-footer">
                    © 2026 {{ $profil->nama_sekolah }}
                </div>

            </div>

    @else

    <div class="empty-profil">

        <i class="bi bi-building"></i>

        <h3>
            Profil Sekolah Belum Ada
        </h3>

        <p>
            Data profil sekolah belum tersedia.
        </p>

    </div>

@endif

    </div>

</div>

@endsection

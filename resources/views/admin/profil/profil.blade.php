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
        background: linear-gradient(135deg, #374151, #6b7280);
        border-left: 6px solid #9ca3af;
        border-radius: 12px;
        padding: 40px;
        margin-bottom: 25px;
        color: white;
    }

    .hero-content {
        display: flex;
        align-items: center;
        gap: 40px;
    }

    .hero-text {
        flex: 1;
    }

    .hero-label {
        color: #e5e7eb;
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
        line-height: 1.3;
        margin: 0 0 15px;
    }

    .hero-text p {
        color: #f3f4f6;
        font-size: 15px;
        line-height: 1.8;
        margin: 0 0 22px;
    }

    .hero-buttons {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .btn-profil {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 10px 18px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: .2s;
    }

    .btn-edit {
        background: white;
        color: #374151;
    }

    .btn-edit:hover {
        background: #f3f4f6;
        color: #111827;
    }

    .btn-delete {
        background: #6b7280;
        color: white;
    }

    .btn-delete:hover {
        background: #4b5563;
    }

    .hero-image {
        width: 300px;
        height: 300px;
        flex-shrink: 0;
        overflow: hidden;
        border-radius: 12px;
        background: #e5e7eb;
        border: 4px solid rgba(255,255,255,.25);
    }

    .hero-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .empty-photo {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: #e5e7eb;
        color: #6b7280;
        text-align: center;
        padding: 20px;
        box-sizing: border-box;
    }

    .empty-photo i {
        font-size: 60px;
        margin-bottom: 12px;
    }

    .empty-photo span {
        font-size: 13px;
    }

    .profil-content {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 40px;
    }

    .profil-section {
        padding-bottom: 30px;
        margin-bottom: 30px;
        border-bottom: 1px solid #e5e7eb;
    }

    .profil-section:last-child {
        padding-bottom: 0;
        margin-bottom: 0;
        border-bottom: none;
    }

    .profil-section h2 {
        color: #374151;
        font-size: 22px;
        font-weight: 700;
        margin: 0 0 18px;
        padding-left: 12px;
        border-left: 5px solid #6b7280;
    }

    .profil-section p {
        color: #596273;
        font-size: 15px;
        line-height: 1.9;
        margin: 0;
    }

    .kepala-sekolah-card {
        display: flex;
        align-items: center;
        gap: 20px;
        background: #f8f9fa;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 20px;
    }

    .kepala-icon {
        width: 60px;
        height: 60px;
        flex-shrink: 0;
        border-radius: 50%;
        background: #e5e7eb;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #4b5563;
        font-size: 25px;
    }

    .kepala-info strong {
        display: block;
        color: #374151;
        font-size: 17px;
        margin-bottom: 5px;
    }

    .kepala-info span {
        color: #6b7280;
        font-size: 14px;
    }

    .visi-misi-card {
        background: #f8f9fa;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 25px;
    }

    .visi-misi-title {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #374151;
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .visi-misi-title i {
        color: #6b7280;
    }

    .visi-misi-text {
        color: #596273;
        font-size: 14px;
        line-height: 1.9;
        white-space: pre-line;
    }

    .alert-success {
        display: flex;
        align-items: center;
        gap: 8px;
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        color: #166534;
        border-radius: 8px;
        padding: 13px 16px;
        margin-bottom: 20px;
        font-size: 14px;
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
        margin: 0 0 8px;
    }

    .empty-profil p {
        color: #6b7280;
        margin: 0 0 20px;
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
            height: 260px;
        }

        .profil-content {
            padding: 25px 20px;
        }

        .kepala-sekolah-card {
            align-items: flex-start;
        }

        .form-actions {
            flex-direction: column;
        }

    }

</style>

<div class="profil-page">

    <div class="profil-container">

        @if(session('success'))

            <div class="alert-success">

                <i class="fa-solid fa-circle-check"></i>

                <span>
                    {{ session('success') }}
                </span>

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
                            {{ $profil->deskripsi }}
                        </p>

                        <div class="hero-buttons">

                            <a
                                href="{{ route('admin.profil.edit', $profil->id_profil) }}"
                                class="btn-profil btn-edit"
                            >

                                <i class="fa-solid fa-pen-to-square"></i>

                                Edit Profil

                            </a>

                            <form
                                action="{{ route('admin.profil.destroy', $profil->id_profil) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus profil sekolah?')"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn-profil btn-delete"
                                >

                                    <i class="fa-solid fa-trash"></i>

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </div>

                    <div class="hero-image">

                        @if($profil->foto)

                            <img
                                src="{{ asset('storage/' . $profil->foto) }}"
                                alt="Foto Kepala Sekolah"
                            >

                        @else

                            <div class="empty-photo">

                                <i class="fa-solid fa-user-tie"></i>

                                <span>
                                    Foto Kepala Sekolah belum tersedia
                                </span>

                            </div>

                        @endif

                    </div>

                </div>

            </div>

            <div class="profil-content">

                <div class="profil-section">

                    <h2>
                        Tentang Sekolah
                    </h2>

                    <p>
                        {{ $profil->deskripsi }}
                    </p>

                </div>

                <div class="profil-section">

                    <h2>
                        Kepala Sekolah
                    </h2>

                    <div class="kepala-sekolah-card">

                        <div class="kepala-icon">

                            <i class="fa-solid fa-user-tie"></i>

                        </div>

                        <div class="kepala-info">

                            <strong>
                                {{ $profil->kepala_sekolah }}
                            </strong>

                            <span>
                                Kepala Sekolah {{ $profil->nama_sekolah }}
                            </span>

                        </div>

                    </div>

                </div>

                <div class="profil-section">

                    <h2>
                        Visi & Misi
                    </h2>

                    <div class="visi-misi-card">

                        <div class="visi-misi-title">

                            <i class="fa-solid fa-bullseye"></i>

                            <span>
                                Visi & Misi Sekolah
                            </span>

                        </div>

                        <div class="visi-misi-text">

                            {{ $profil->visi_misi }}

                        </div>

                    </div>

                </div>

                <div class="profil-footer">

                    © {{ date('Y') }}

                    {{ $profil->nama_sekolah }}

                </div>

            </div>

        @else

            <div class="empty-profil">

                <i class="fa-solid fa-school"></i>

                <h3>
                    Profil Sekolah Belum Ada
                </h3>

                <p>
                    Data profil sekolah belum tersedia.
                </p>

                <a
                    href="{{ route('admin.profil.create') }}"
                    class="btn-profil btn-edit"
                >

                    <i class="fa-solid fa-plus"></i>

                    Tambah Profil

                </a>

            </div>

        @endif

    </div>

</div>

@endsection

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

    .btn-kelola-user {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 18px;
        background: #ffffff;
        color: #374151;
        text-decoration: none;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-kelola-user:hover {
        background: #f3f4f6;
        color: #111827;
        transform: translateY(-2px);
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

    .misi-list {
        padding-left: 22px;
        margin: 0;
    }

    .misi-list li {
        color: #596273;
        font-size: 15px;
        line-height: 2;
        padding-left: 8px;
        margin-bottom: 5px;
    }

    .identitas-wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 25px;
        margin-bottom: 40px;
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

        .hero-image {
            width: 100%;
            height: 240px;
        }

        .profil-content {
            padding: 30px 25px;
        }

        .contact-wrapper {
            grid-template-columns: 1fr;
            gap: 25px;
        }

        .identitas-wrapper {
            grid-template-columns: 1fr;
        }

        .profil-section h2 {
            font-size: 21px;
        }
    }
</style>

<div class="profil-page">

    <div class="profil-container">

        <div class="profil-hero">

            <div class="hero-content">

                <div class="hero-text">

                    <div class="hero-label">
                        Profil Sekolah
                    </div>

                    <h1>
                        SMK YPC TASIKMALAYA
                    </h1>

                    <p>
                        Sekolah Menengah Kejuruan yang berkomitmen
                        mencetak generasi yang berkompeten, berkarakter,
                        kreatif, dan siap menghadapi dunia kerja.
                    </p>

                    <a href="/user" class="btn-kelola-user">
                        <i class="bi bi-person-gear"></i>
                        Kelola User
                    </a>

                </div>

                <div class="hero-image">

                    <img
                        src="{{ asset('assets/images/smk.jpg') }}"
                        alt="Foto SMK YPC Tasikmalaya"
                    >

                </div>

            </div>

        </div>

        <div class="profil-content">

            <div class="profil-section">

                <h2>
                    Tentang SMK YPC Tasikmalaya
                </h2>

                <p>
                    <strong>SMK YPC Tasikmalaya</strong> merupakan
                    sekolah menengah kejuruan yang berkomitmen dalam
                    memberikan pendidikan dan keterampilan kepada
                    peserta didik.
                </p>

                <p>
                    Pendidikan di SMK YPC Tasikmalaya tidak hanya
                    berfokus pada pengetahuan akademik, tetapi juga
                    mengembangkan keterampilan, kedisiplinan,
                    tanggung jawab, kreativitas, dan karakter siswa.
                </p>

                <p>
                    Dengan pembelajaran yang sesuai dengan perkembangan
                    teknologi dan kebutuhan dunia kerja, siswa
                    diharapkan mampu mengembangkan potensi diri serta
                    memiliki bekal untuk melanjutkan pendidikan maupun
                    memasuki dunia kerja.
                </p>

            </div>


            <div class="profil-section">

                <h2>
                    Sejarah Sekolah
                </h2>

                <p>
                    SMK YPC Tasikmalaya hadir sebagai salah satu
                    lembaga pendidikan kejuruan yang memberikan
                    kesempatan kepada generasi muda untuk memperoleh
                    pendidikan dan keterampilan sesuai dengan bidang
                    keahlian yang dipelajari.
                </p>

                <p>
                    Dalam perkembangannya, SMK YPC Tasikmalaya terus
                    berupaya meningkatkan kualitas pendidikan,
                    fasilitas pembelajaran, serta kompetensi tenaga
                    pendidik untuk mendukung kebutuhan peserta didik.
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
                            SMK YPC Tasikmalaya
                        </div>

                        <div class="identitas-item">
                            <strong>Jenjang Pendidikan</strong>
                            Sekolah Menengah Kejuruan
                        </div>

                        <div class="identitas-item">
                            <strong>Status</strong>
                            Sekolah Menengah Kejuruan
                        </div>

                    </div>

                    <div class="identitas-card">

                        <h3>
                            <i class="bi bi-geo-alt me-2"></i>
                            Lokasi Sekolah
                        </h3>

                        <div class="identitas-item">
                            <strong>Kabupaten/Kota</strong>
                            Tasikmalaya
                        </div>

                        <div class="identitas-item">
                            <strong>Provinsi</strong>
                            Jawa Barat
                        </div>

                        <div class="identitas-item">
                            <strong>Negara</strong>
                            Indonesia
                        </div>

                    </div>

                </div>

            </div>


            <div class="profil-section">

                <h2>
                    Visi
                </h2>

                <div class="visi-text">

                    Mewujudkan pendidikan kejuruan yang mampu
                    menghasilkan lulusan berkompeten, berkarakter,
                    mandiri, kreatif, dan siap menghadapi perkembangan
                    teknologi serta dunia kerja.

                </div>

            </div>


            <div class="profil-section">

                <h2>
                    Misi
                </h2>

                <ol class="misi-list">

                    <li>
                        Meningkatkan kualitas pembelajaran dan
                        keterampilan siswa.
                    </li>

                    <li>
                        Membentuk siswa yang disiplin,
                        bertanggung jawab, dan berkarakter.
                    </li>

                    <li>
                        Mengembangkan kemampuan siswa sesuai dengan
                        bidang keahlian dan kebutuhan dunia kerja.
                    </li>

                    <li>
                        Mendorong siswa agar kreatif, inovatif,
                        dan mandiri.
                    </li>

                    <li>
                        Meningkatkan kualitas sarana dan prasarana
                        pendidikan.
                    </li>

                    <li>
                        Menciptakan lingkungan sekolah yang aman,
                        nyaman, dan kondusif untuk belajar.
                    </li>

                </ol>

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

                            SMK YPC Tasikmalaya<br>
                            Tasikmalaya<br>
                            Jawa Barat<br>
                            Indonesia

                        </div>

                    </div>

                    <div>

                        <div class="contact-title">
                            Informasi Sekolah
                        </div>

                        <div class="contact-text">

                            Nama : SMK YPC Tasikmalaya<br>
                            Jenjang : SMK<br>
                            Lokasi : Tasikmalaya, Jawa Barat

                        </div>

                    </div>

                </div>

            </div>


            <div class="profil-footer">

                © 2026 SMK YPC Tasikmalaya

            </div>

        </div>

    </div>

</div>

@endsection

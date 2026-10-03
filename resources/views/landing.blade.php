<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        {{ $profil->nama_sekolah ?? 'SMK YPC Tasikmalaya' }}
    </title>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    >

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, sans-serif;
            background: #ffffff;
            color: #222;
        }

        .top-header {
            background: linear-gradient(135deg, #ffffff, #e5e7eb);
            padding: 20px 60px;
            border-bottom: 1px solid #d1d5db;
        }

        .header-inner {
            max-width: 1200px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
        }

        .brand h1 {
            font-size: 24px;
            color: #374151;
        }

        .brand p {
            margin-top: 4px;
            font-size: 13px;
            color: #6b7280;
        }

        .contact-area {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .contact {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .contact i {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, #374151, #9ca3af);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .contact small {
            display: block;
            color: #6b7280;
            font-size: 11px;
            margin-bottom: 3px;
        }

        .contact strong {
            font-size: 13px;
            color: #374151;
        }

        .navbar {
            background: linear-gradient(90deg, #1f2937, #6b7280, #d1d5db);
        }

        .nav-inner {
            max-width: 1200px;
            margin: auto;
            min-height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 35px;
            overflow-x: auto;
            padding: 0 15px;
        }

        .nav-inner a {
            color: white;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            padding: 17px 0;
            white-space: nowrap;
            transition: .3s;
        }

        .nav-inner a:hover {
            color: #e5e7eb;
        }

        .slider {
            position: relative;
            width: 100%;
            height: 600px;
            overflow: hidden;
            touch-action: pan-y;
        }

        .slides {
            display: flex;
            height: 100%;
            transition: transform .5s ease;
        }

        .slide {
            min-width: 100%;
            height: 100%;
            position: relative;
            background-size: cover;
            background-position: center;
        }

        .slide::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(
                90deg,
                rgba(17, 24, 39, .75),
                rgba(55, 65, 81, .35),
                rgba(255, 255, 255, .05)
            );
        }

        .slide-1 {
            background-image: url('{{ asset('assets/images/lingkungan.webp') }}');
        }

        .slide-2 {
            background-image: url('{{ asset('assets/images/smk.jpg') }}');
        }

        .slide-3 {
            background-image: url('{{ asset('assets/images/smkypc.jpeg') }}');
        }

        .hero-content {
            position: absolute;
            z-index: 5;
            top: 50%;
            left: 8%;
            transform: translateY(-50%);
            color: white;
            max-width: 650px;
        }

        .hero-content span {
            display: inline-block;
            background: linear-gradient(135deg, #374151, #9ca3af);
            padding: 8px 15px;
            border-radius: 4px;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .hero-content h2 {
            font-size: 52px;
            line-height: 1.1;
            margin-bottom: 20px;
            text-shadow: 0 2px 8px rgba(0, 0, 0, .35);
        }

        .hero-content p {
            font-size: 17px;
            line-height: 1.7;
            max-width: 570px;
            color: #f3f4f6;
        }

        .hero-button {
            display: inline-block;
            margin-top: 25px;
            padding: 13px 22px;
            background: linear-gradient(135deg, #ffffff, #d1d5db);
            color: #374151;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: .3s;
        }

        .hero-button:hover {
            background: white;
            transform: translateY(-2px);
        }

        .arrow {
            position: absolute;
            z-index: 10;
            top: 50%;
            transform: translateY(-50%);
            width: 45px;
            height: 45px;
            border: none;
            border-radius: 50%;
            background: rgba(255, 255, 255, .85);
            color: #374151;
            cursor: pointer;
            font-size: 18px;
            transition: .3s;
        }

        .arrow:hover {
            background: white;
        }

        .prev {
            left: 25px;
        }

        .next {
            right: 25px;
        }

        .dots {
            position: absolute;
            z-index: 10;
            bottom: 25px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 8px;
        }

        .dot {
            width: 10px;
            height: 10px;
            border: none;
            border-radius: 50%;
            background: rgba(255, 255, 255, .6);
            cursor: pointer;
        }

        .dot.active {
            background: white;
            transform: scale(1.2);
        }

        .section {
            max-width: 1200px;
            margin: 70px auto;
            padding: 0 25px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 35px;
        }

        .section-title h2 {
            color: #374151;
            font-size: 30px;
            margin-bottom: 10px;
        }

        .section-title p {
            color: #6b7280;
        }

        .sambutan-section {
            max-width: 1200px;
            margin: 70px auto;
            padding: 0 25px;
        }

        .sambutan-container {
            max-width: 1140px;
            margin: auto;
            display: flex;
            align-items: flex-start;
            gap: 35px;
            padding: 0;
        }

        .sambutan-photo {
            width: 270px;
            min-width: 270px;
        }

        .sambutan-photo img {
            width: 100%;
            height: 335px;
            object-fit: cover;
            display: block;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
        }

        .sambutan-photo-empty {
            width: 100%;
            height: 335px;
            border-radius: 10px;
            background: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9ca3af;
            font-size: 70px;
        }

        .sambutan-content {
            flex: 1;
            padding-top: 4px;
        }

        .sambutan-label {
            color: #6b7280;
            font-size: 14px;
            letter-spacing: 1.5px;
            margin-bottom: 7px;
            font-weight: bold;
        }

        .sambutan-content h2 {
            margin: 0;
            color: #374151;
            font-size: 32px;
            font-weight: 700;
        }

        .sambutan-line {
            width: 295px;
            height: 4px;
            margin: 12px 0 20px;
            background: linear-gradient(
                to right,
                #374151,
                #d1d5db
            );
        }

        .sambutan-content p {
            margin: 0 0 12px;
            color: #4b5563;
            font-size: 16px;
            line-height: 1.7;
        }

        .sambutan-identitas {
            border-top: 1px solid #eeeeee;
            margin-top: 28px;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .sambutan-identitas strong {
            font-size: 21px;
            color: #374151;
        }

        .sambutan-identitas span {
            font-size: 15px;
            color: #6b7280;
        }

        .visi-misi {
            margin-top: 25px;
            padding: 28px;
            background: #f8f9fa;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
        }

        .visi-title {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 18px;
        }

        .visi-title i {
            font-size: 21px;
            color: #6b7280;
        }

        .visi-title h3 {
            margin: 0;
            color: #374151;
            font-size: 22px;
        }

        .visi-content {
            color: #4b5563;
            line-height: 1.8;
            font-size: 15px;
        }

        .visi-content p {
            margin-bottom: 12px;
        }

        #guru {
            max-width: none;
            background: #f9fafb;
            padding: 70px 25px;
        }

        #guru .section-title,
        #guru .guru-grid,
        #guru .empty-guru {
            max-width: 1150px;
            margin-left: auto;
            margin-right: auto;
        }

        .guru-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .guru-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0, 0, 0, .06);
            transition: .3s;
        }

        .guru-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, .10);
        }

        .guru-foto {
            width: 100%;
            height: 250px;
            background: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .guru-foto img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .guru-foto i {
            font-size: 70px;
            color: #9ca3af;
        }

        .guru-info {
            padding: 20px;
        }

        .guru-info h3 {
            color: #374151;
            font-size: 18px;
            margin-bottom: 7px;
        }

        .guru-info p {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .guru-info span {
            color: #9ca3af;
            font-size: 13px;
        }

        .empty-guru {
            text-align: center;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 40px;
            color: #6b7280;
        }

        .empty-guru i {
            display: block;
            font-size: 40px;
            margin-bottom: 12px;
        }

        .news-card {
            max-width: 900px;
            margin: auto;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0, 0, 0, .07);
        }

        .news-image {
            width: 100%;
            height: 320px;
            object-fit: cover;
            display: block;
        }

        .news-content {
            padding: 30px;
        }

        .news-date {
            display: inline-block;
            color: #6b7280;
            font-size: 13px;
            margin-bottom: 10px;
        }

        .news-content h3 {
            color: #374151;
            font-size: 25px;
            margin-bottom: 12px;
        }

        .news-content p {
            color: #4b5563;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .news-button {
            display: inline-block;
            padding: 11px 20px;
            background: #374151;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: bold;
            transition: .3s;
        }

        .news-button:hover {
            background: #1f2937;
        }

        .empty-news {
            text-align: center;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 35px;
            color: #6b7280;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 30px;
        }

        .gallery-card {
            position: relative;
            height: 230px;
            border-radius: 12px;
            overflow: hidden;
            background: #e5e7eb;
            border: 1px solid #e5e7eb;
        }

        .gallery-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform .4s ease;
        }

        .gallery-card:hover img {
            transform: scale(1.05);
        }

        .gallery-overlay {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            padding: 20px;
            color: white;
            background: linear-gradient(
                transparent,
                rgba(0, 0, 0, .75)
            );
        }

        .gallery-overlay h3 {
            margin: 20px 0 5px;
            font-size: 17px;
        }

        .gallery-overlay span {
            font-size: 13px;
            opacity: .9;
        }

        .empty-gallery {
            text-align: center;
            padding: 50px 20px;
            background: #f5f6f8;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            color: #6b7280;
        }

        .empty-gallery i {
            display: block;
            font-size: 40px;
            margin-bottom: 15px;
        }

        .empty-gallery p {
            margin: 0;
        }

        .footer {
            background: linear-gradient(135deg, #1f2937, #374151);
            color: white;
            margin-top: 80px;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, .15);
            text-align: center;
            padding: 20px;
            color: #d1d5db;
            font-size: 13px;
        }

        @media (max-width: 1000px) {

            .guru-grid {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        @media (max-width: 900px) {

            .top-header {
                padding: 18px 20px;
            }

            .header-inner {
                flex-direction: column;
            }

            .contact-area {
                flex-wrap: wrap;
                justify-content: center;
            }

            .nav-inner {
                justify-content: flex-start;
            }

            .slider {
                height: 500px;
            }

            .hero-content {
                left: 7%;
                right: 7%;
            }

            .hero-content h2 {
                font-size: 38px;
            }

            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        @media (max-width: 800px) {

            .sambutan-container {
                flex-direction: column;
            }

            .sambutan-photo {
                width: 100%;
                max-width: 300px;
                min-width: auto;
                margin: auto;
            }

            .sambutan-photo img,
            .sambutan-photo-empty {
                height: 360px;
            }

        }

        @media (max-width: 600px) {

            .brand h1 {
                font-size: 19px;
            }

            .contact-area {
                flex-direction: column;
            }

            .slider {
                height: 480px;
            }

            .hero-content h2 {
                font-size: 32px;
            }

            .hero-content p {
                font-size: 14px;
            }

            .arrow {
                width: 38px;
                height: 38px;
            }

            .guru-grid {
                grid-template-columns: 1fr;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
            }

            .gallery-card {
                height: 230px;
            }

            .sambutan-section {
                padding: 0 20px;
            }

            .sambutan-content h2 {
                font-size: 27px;
            }

            .sambutan-label {
                font-size: 12px;
                letter-spacing: 1.2px;
            }

            .sambutan-line {
                width: 220px;
            }

        }

    </style>

</head>

<body>

<header class="top-header">

    <div class="header-inner">

        <div class="brand">

            <h1>
                {{ $profil->nama_sekolah ?? 'SMK YPC Tasikmalaya' }}
            </h1>

            <p>
                Sekolah Menengah Kejuruan
            </p>

        </div>

        <div class="contact-area">

            <div class="contact">

                <i class="fa-solid fa-phone"></i>

                <div>

                    <small>
                        Telepon
                    </small>

                    <strong>
                        {{ $profil->kontak ?? '0265-546717' }}
                    </strong>

                </div>

            </div>

            <div class="contact">

                <i class="fa-solid fa-envelope"></i>

                <div>

                    <small>
                        Email
                    </small>

                    <strong>
                        info@smk-ypc.sch.id
                    </strong>

                </div>

            </div>

        </div>

    </div>

</header>

<nav class="navbar">

    <div class="nav-inner">

        <a href="{{ url('/') }}">
            <i class="fa-solid fa-house"></i>
            Beranda
        </a>

        <a href="{{ url('/profil-sekolah') }}">
            <i class="fa-solid fa-school"></i>
            Profil Sekolah
        </a>

        <a href="{{ url('/guru') }}">
            <i class="fa-solid fa-chalkboard-user"></i>
            Guru
        </a>

        <a href="{{ url('/ektrakurikuler') }}">
            <i class="fa-solid fa-trophy"></i>
            Ekstrakurikuler
        </a>

        <a href="{{ url('/berita') }}">
            <i class="fa-solid fa-newspaper"></i>
            Berita
        </a>

        <a href="{{ url('/galeri') }}">
            <i class="fa-solid fa-images"></i>
            Galeri
        </a>

    </div>

</nav>

<section class="slider" id="beranda">

    <div class="slides" id="slides">

        <div class="slide slide-1">

            <div class="hero-content">

                <span>
                    {{ $profil->nama_sekolah ?? 'SMK YPC TASIKMALAYA' }}
                </span>

                <h2>
                    Membangun Generasi Unggul
                </h2>

                <p>
                    Mewujudkan peserta didik yang kompeten,
                    kreatif, berkarakter, dan siap menghadapi
                    dunia kerja serta perkembangan teknologi.
                </p>

                <a
                    href="{{ url('/profil-sekolah') }}"
                    class="hero-button"
                >
                    Profil Sekolah
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

            </div>

        </div>

        <div class="slide slide-2">

            <div class="hero-content">

                <span>
                    PENDIDIKAN BERKUALITAS
                </span>

                <h2>
                    Belajar dan Berkarya
                </h2>

                <p>
                    Mengembangkan keterampilan dan potensi
                    siswa melalui pembelajaran yang aktif
                    dan inovatif.
                </p>

                <a
                    href="{{ url('/guru') }}"
                    class="hero-button"
                >
                    Lihat Guru
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

            </div>

        </div>

        <div class="slide slide-3">

            <div class="hero-content">

                <span>
                    {{ $profil->nama_sekolah ?? 'SMK YPC TASIKMALAYA' }}
                </span>

                <h2>
                    Siap Menghadapi Masa Depan
                </h2>

                <p>
                    Mempersiapkan generasi muda dengan
                    keterampilan yang sesuai dengan kebutuhan
                    dunia kerja dan industri.
                </p>

                <a
                    href="{{ url('/berita') }}"
                    class="hero-button"
                >
                    Lihat Berita
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

            </div>

        </div>

    </div>

    <button
        class="arrow prev"
        onclick="prevSlide()"
    >
        <i class="fa-solid fa-chevron-left"></i>
    </button>

    <button
        class="arrow next"
        onclick="nextSlide()"
    >
        <i class="fa-solid fa-chevron-right"></i>
    </button>

    <div class="dots">

        <button
            class="dot active"
            onclick="goToSlide(0)"
        ></button>

        <button
            class="dot"
            onclick="goToSlide(1)"
        ></button>

        <button
            class="dot"
            onclick="goToSlide(2)"
        ></button>

    </div>

</section>

<section class="sambutan-section" id="profil">

    @if ($profil)

        <div class="sambutan-container">

            <div class="sambutan-photo">

                @if ($profil->foto)

                    <img
                        src="{{ asset('storage/' . $profil->foto) }}"
                        alt="Foto Kepala Sekolah"
                    >

                @else

                    <div class="sambutan-photo-empty">

                        <i class="fa-solid fa-user-tie"></i>

                    </div>

                @endif

            </div>

            <div class="sambutan-content">

                <div class="sambutan-label">
                    SAMBUTAN KEPALA SEKOLAH
                </div>

                <h2>
                    {{ $profil->kepala_sekolah ?? 'Kepala Sekolah' }}
                </h2>

                <div class="sambutan-line"></div>

                @if ($profil->deskripsi)

                    <p>
                        {{ $profil->deskripsi }}
                    </p>

                @endif

                <p>
                    Puji syukur ke hadirat Tuhan YME atas segala rahmat dan karunia-Nya.
                    Selamat datang di website resmi sekolah kami. Website ini kami hadirkan
                    sebagai sarana informasi dan komunikasi antara sekolah dengan orang tua,
                    peserta didik, serta masyarakat luas.
                </p>

                <p>
                    Melalui media ini, kami berharap seluruh informasi mengenai kegiatan,
                    prestasi, serta program pendidikan dapat tersampaikan secara transparan,
                    cepat, dan akurat.
                </p>

                <div class="sambutan-identitas">

                    <strong>
                        {{ $profil->kepala_sekolah ?? 'Drs. Ujang Sanusi, M.M' }}
                    </strong>

                    <span>
                        Kepala Sekolah
                    </span>

                </div>

            </div>

        </div>

    @else

        <div class="empty-news">

            <i class="fa-solid fa-school"></i>

            <p>
                Data profil sekolah belum tersedia.
            </p>

        </div>

    @endif

</section>

<section class="section" id="visi-misi">

    <div class="section-title">

        <h2>
            Visi & Misi
        </h2>

        <p>
            Arah dan tujuan pendidikan
            {{ $profil->nama_sekolah ?? 'SMK YPC Tasikmalaya' }}
        </p>

    </div>

    @if ($profil && $profil->visi_misi)

        <div class="visi-misi">

            <div class="visi-title">

                <i class="fa-solid fa-bullseye"></i>

                <h3>
                    Visi & Misi
                </h3>

            </div>

            <div class="visi-content">

                {!! nl2br(e($profil->visi_misi)) !!}

            </div>

        </div>

    @else

        <div class="empty-news">

            <i class="fa-solid fa-bullseye"></i>

            <p>
                Visi dan misi sekolah belum tersedia.
            </p>

        </div>

    @endif

</section>

<section id="guru">

    <div class="section-title">

        <h2>
            Guru & Staf
        </h2>

        <p>
            Tenaga pendidik
            {{ $profil->nama_sekolah ?? 'SMK YPC Tasikmalaya' }}
        </p>

    </div>

    @if ($guru->count() > 0)

        <div class="guru-grid">

            @foreach ($guru as $item)

                <div class="guru-card">

                    <div class="guru-foto">

                        @if ($item->foto)

                            <img
                                src="{{ asset('storage/' . $item->foto) }}"
                                alt="{{ $item->nama_guru }}"
                            >

                        @else

                            <i class="fa-solid fa-user"></i>

                        @endif

                    </div>

                    <div class="guru-info">

                        <h3>
                            {{ $item->nama_guru }}
                        </h3>

                        <p>
                            {{ $item->mapel ?: 'Guru' }}
                        </p>

                        <span>
                            NIP: {{ $item->nip ?: '-' }}
                        </span>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="empty-guru">

            <i class="fa-solid fa-user-group"></i>

            <p>
                Belum ada data guru.
            </p>

        </div>

    @endif

</section>

<section class="section" id="berita">

    <div class="section-title">

        <h2>
            Berita Terbaru
        </h2>

        <p>
            Informasi dan berita terbaru
            {{ $profil->nama_sekolah ?? 'SMK YPC Tasikmalaya' }}
        </p>

    </div>

    @if ($berita)

        <div class="news-card">

            @if ($berita->gambar)

                <img
                    src="{{ asset('storage/' . $berita->gambar) }}"
                    alt="{{ $berita->judul }}"
                    class="news-image"
                >

            @endif

            <div class="news-content">

                <span class="news-date">

                    <i class="fa-regular fa-calendar"></i>

                    {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}

                </span>

                <h3>
                    {{ $berita->judul }}
                </h3>

                <p>
                    {{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 200) }}
                </p>

                <a
                    href="{{ route('berita.detail', $berita->id_berita) }}"
                    class="news-button"
                >
                    Selengkapnya
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

            </div>

        </div>

    @else

        <div class="empty-news">

            <i class="fa-regular fa-newspaper"></i>

            <p>
                Belum ada berita yang dipublikasi.
            </p>

        </div>

    @endif

</section>

<section class="section" id="galeri">

    <div class="section-title">

        <h2>
            Galeri
        </h2>

        <p>
            Dokumentasi kegiatan
            {{ $profil->nama_sekolah ?? 'SMK YPC Tasikmalaya' }}
        </p>

    </div>

    @if ($galeri->count() > 0)

        <div class="gallery-grid">

            @foreach ($galeri as $item)

                <div class="gallery-card">

                    <img
                        src="{{ asset('storage/' . $item->file) }}"
                        alt="{{ $item->judul }}"
                    >

                    <div class="gallery-overlay">

                        <h3>
                            {{ $item->judul }}
                        </h3>

                        @if ($item->kategori)

                            <span>
                                {{ $item->kategori }}
                            </span>

                        @endif

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="empty-gallery">

            <i class="fa-regular fa-images"></i>

            <p>
                Belum ada foto galeri.
            </p>

        </div>

    @endif

</section>

<footer class="footer">

    <div class="footer-bottom">

        © {{ date('Y') }}

        {{ $profil->nama_sekolah ?? 'SMK YPC Tasikmalaya' }}

    </div>

</footer>

<script>

    let currentSlide = 0;

    const slides = document.getElementById('slides');

    const dots = document.querySelectorAll('.dot');

    const totalSlides = 3;

    function showSlide(index) {

        if (index >= totalSlides) {

            currentSlide = 0;

        } else if (index < 0) {

            currentSlide = totalSlides - 1;

        } else {

            currentSlide = index;

        }

        slides.style.transform =
            `translateX(-${currentSlide * 100}%)`;

        dots.forEach((dot, i) => {

            dot.classList.toggle(
                'active',
                i === currentSlide
            );

        });

    }

    function nextSlide() {

        showSlide(currentSlide + 1);

    }

    function prevSlide() {

        showSlide(currentSlide - 1);

    }

    function goToSlide(index) {

        showSlide(index);

    }

    setInterval(function() {

        nextSlide();

    }, 5000);

    let startX = 0;

    const slider = document.querySelector('.slider');

    slider.addEventListener(
        'touchstart',
        function(e) {

            startX = e.touches[0].clientX;

        }
    );

    slider.addEventListener(
        'touchend',
        function(e) {

            const endX = e.changedTouches[0].clientX;

            if (startX - endX > 50) {

                nextSlide();

            }

            if (endX - startX > 50) {

                prevSlide();

            }

        }
    );

</script>

</body>

</html>

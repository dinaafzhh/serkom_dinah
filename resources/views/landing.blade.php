<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SMK YPC Tasikmalaya</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

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
            color: #333;
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

        .brand {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .brand img {
            width: 58px;
            height: 58px;
            object-fit: contain;
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

        .login-btn {
            text-decoration: none;
            background: linear-gradient(135deg, #374151, #6b7280);
            color: white;
            padding: 12px 20px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: bold;
            transition: .3s;
        }

        .login-btn:hover {
            background: linear-gradient(135deg, #1f2937, #4b5563);
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
            gap: 30px;
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

        .profile-box {
            background: linear-gradient(135deg, #ffffff, #f3f4f6);
            border-radius: 12px;
            padding: 35px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, .07);
            border: 1px solid #e5e7eb;
        }

        .profile-box h3 {
            color: #374151;
            margin-bottom: 15px;
        }

        .profile-box p {
            line-height: 1.8;
            color: #4b5563;
        }

        .sambutan-box {
            max-width: 1260px;
            margin: 70px auto;
            padding: 0 20px;
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .sambutan-foto {
            width: 270px;
            min-width: 270px;
        }

        .sambutan-foto img {
            width: 100%;
            height: 335px;
            object-fit: cover;
            border-radius: 12px;
            display: block;
        }

        .sambutan-text {
            flex: 1;
            padding: 5px 0;
        }

        .sambutan-label {
            color: #6b7280;
            font-size: 15px;
            letter-spacing: 1.5px;
            margin-bottom: 5px;
        }

        .sambutan-text h2 {
            color: #374151;
            font-size: 32px;
            margin: 0 0 20px;
        }

        .sambutan-text p {
            color: #1f2937;
            font-size: 15px;
            line-height: 1.7;
            margin-bottom: 13px;
        }

        .kepala-nama {
            margin-top: 20px;
            padding: 0;
            border: none;
            border-top: none;
            box-shadow: none;
        }

        .kepala-nama strong {
            display: block;
            color: #374151;
            font-size: 20px;
            margin-bottom: 4px;
        }

        .kepala-nama span {
            display: block;
            color: #6b7280;
            font-size: 15px;
        }

        .footer {
            background: linear-gradient(135deg, #1f2937, #374151);
            color: white;
            margin-top: 80px;
        }

        .footer-container {
            max-width: 1200px;
            margin: auto;
            padding: 55px 25px 40px;
            display: grid;
            grid-template-columns: 1.2fr 1fr 1.3fr;
            gap: 50px;
        }

        .footer-logo {
            width: 190px;
            max-height: 85px;
            object-fit: contain;
            object-position: left center;
            margin-bottom: 20px;
        }

        .footer-description {
            color: #d1d5db;
            font-size: 14px;
            line-height: 1.7;
        }

        .footer h3 {
            color: white;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .footer-contact {
            list-style: none;
        }

        .footer-contact li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 15px;
            color: #d1d5db;
            font-size: 14px;
            line-height: 1.6;
        }

        .footer-contact i {
            width: 18px;
            margin-top: 4px;
            color: #e5e7eb;
            flex-shrink: 0;
        }

        .footer-contact a {
            color: #d1d5db;
            text-decoration: none;
            transition: .3s;
        }

        .footer-contact a:hover {
            color: white;
        }

        .footer-news {
            list-style: none;
        }

        .footer-news li {
            margin-bottom: 14px;
        }

        .footer-news a {
            color: #d1d5db;
            text-decoration: none;
            font-size: 14px;
            line-height: 1.6;
            transition: .3s;
        }

        .footer-news a:hover {
            color: white;
        }

        .footer-comment {
            margin-top: 30px;
        }

        .footer-comment p {
            color: #9ca3af;
            font-size: 14px;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, .15);
            text-align: center;
            padding: 20px;
            color: #d1d5db;
            font-size: 13px;
        }

        .footer-bottom strong {
            color: white;
        }

        .footer-credit {
            margin-top: 7px;
            color: #9ca3af;
            font-size: 12px;
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
                overflow-x: auto;
                justify-content: flex-start;
                padding: 0 20px;
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

            .footer-container {
                grid-template-columns: 1fr;
                gap: 35px;
            }
        }

        @media (max-width: 700px) {

            .sambutan-box {
                flex-direction: column;
                align-items: stretch;
                margin: 40px auto;
            }

            .sambutan-foto {
                width: 230px;
                min-width: 230px;
                margin: auto;
            }

            .sambutan-foto img {
                height: 290px;
            }

            .sambutan-text h2 {
                font-size: 27px;
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

            .footer-container {
                padding: 40px 20px 30px;
            }
        }
    </style>
</head>

<body>

<header class="top-header">

    <div class="header-inner">

        <div class="brand">

            <img src="{{ asset('assets/images/logo.webp') }}"
                 alt="Logo SMK YPC">

            <div>
                <h1>SMK YPC Tasikmalaya</h1>
                <p>Sekolah Menengah Kejuruan</p>
            </div>

        </div>

        <div class="contact-area">

            <div class="contact">

                <i class="fa-solid fa-phone"></i>

                <div>
                    <small>Telepon</small>
                    <strong>0265-546717</strong>
                </div>

            </div>

            <div class="contact">

                <i class="fa-solid fa-envelope"></i>

                <div>
                    <small>Email</small>
                    <strong>info@smk-ypc.sch.id</strong>
                </div>

            </div>

            <a href="{{ url('/login') }}" class="login-btn">

                <i class="fa-solid fa-right-to-bracket"></i>

                Login

            </a>

        </div>

    </div>

</header>

<nav class="navbar">

    <div class="nav-inner">

        <a href="/">
            <i class="fa-solid fa-house"></i>
            Beranda
        </a>

        <a href="#profil">
            Profil Sekolah
        </a>

        <a href="#program">
            Program Keahlian
        </a>

        <a href="#guru">
            Guru & Staf
        </a>

        <a href="#ekskul">
            Ekstrakurikuler
        </a>

        <a href="#berita">
            Berita
        </a>

        <a href="#galeri">
            Galeri
        </a>

    </div>

</nav>

<section class="slider" id="slider">

    <div class="slides" id="slides">

        <div class="slide slide-1">

            <div class="hero-content">

                <span>SMK YPC TASIKMALAYA</span>

                <h2>Membangun Generasi Unggul</h2>

                <p>
                    Mewujudkan peserta didik yang kompeten,
                    kreatif, berkarakter, dan siap menghadapi
                    dunia kerja serta perkembangan teknologi.
                </p>

                <a href="#profil" class="hero-button">

                    Selengkapnya

                    <i class="fa-solid fa-arrow-right"></i>

                </a>

            </div>

        </div>

        <div class="slide slide-2">

            <div class="hero-content">

                <span>PENDIDIKAN BERKUALITAS</span>

                <h2>Belajar dan Berkarya</h2>

                <p>
                    Mengembangkan keterampilan dan potensi
                    siswa melalui pembelajaran yang aktif
                    dan inovatif.
                </p>

                <a href="#profil" class="hero-button">

                    Lihat Profil

                    <i class="fa-solid fa-arrow-right"></i>

                </a>

            </div>

        </div>

        <div class="slide slide-3">

            <div class="hero-content">

                <span>SMK YPC TASIKMALAYA</span>

                <h2>Siap Menghadapi Masa Depan</h2>

                <p>
                    Mempersiapkan generasi muda dengan
                    keterampilan yang sesuai dengan kebutuhan
                    dunia kerja dan industri.
                </p>

                <a href="#sambutan" class="hero-button">

                    Selengkapnya

                    <i class="fa-solid fa-arrow-right"></i>

                </a>

            </div>

        </div>

    </div>

    <button class="arrow prev" onclick="prevSlide()">

        <i class="fa-solid fa-chevron-left"></i>

    </button>

    <button class="arrow next" onclick="nextSlide()">

        <i class="fa-solid fa-chevron-right"></i>

    </button>

    <div class="dots">

        <button class="dot active"
                onclick="goToSlide(0)">
        </button>

        <button class="dot"
                onclick="goToSlide(1)">
        </button>

        <button class="dot"
                onclick="goToSlide(2)">
        </button>

    </div>

</section>

<section class="section" id="profil">

    <div class="section-title">

        <h2>Profil Sekolah</h2>

        <p>
            Mengenal Lebih Dekat Tentang SMK YPC Tasikmalaya
        </p>

    </div>

    <div class="profile-box">

        <h3>SMK YPC Tasikmalaya</h3>

        <p>
            SMK YPC Tasikmalaya merupakan sekolah kejuruan
            yang berkomitmen memberikan pendidikan dan
            keterampilan kepada peserta didik agar mampu
            berkembang dan menghadapi dunia kerja.
        </p>

    </div>

</section>

<section class="section" id="sambutan">

    <div class="sambutan-box">

        <div class="sambutan-foto">

            <img src="{{ asset('assets/images/Kplsekolah.jpg') }}"
                 alt="Kepala Sekolah">

        </div>

        <div class="sambutan-text">

            <div class="sambutan-label">
                KOMITMEN KAMI UNTUK PENDIDIKAN
            </div>

            <h2>
                Sambutan Kepala Sekolah
            </h2>

            <p>
                Puji syukur ke hadirat Tuhan YME atas segala rahmat
                dan karunia-Nya. Selamat datang di website resmi
                sekolah kami. Website ini kami hadirkan sebagai
                sarana informasi dan komunikasi antara sekolah
                dengan orang tua, peserta didik, serta masyarakat luas.
            </p>

            <p>
                Melalui media ini, kami berharap seluruh informasi
                mengenai kegiatan, prestasi, serta program pendidikan
                dapat tersampaikan secara transparan, cepat, dan akurat.
            </p>

            <div class="kepala-nama">

                <strong>
                    Drs. Ujang Sanusi, M.M
                </strong>

                <span>
                    Kepala Sekolah
                </span>

            </div>

        </div>

    </div>

</section>

<footer class="footer">

    <div class="footer-container">

        <div class="footer-column">



        </div>

    <div


    <div class="footer-bottom">


                © 2026 SMK YPC Tasikmalaya
            </strong>

        </div>

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

    document.getElementById('slider')
        .addEventListener('touchstart', function(e) {

            startX = e.touches[0].clientX;

        });

    document.getElementById('slider')
        .addEventListener('touchend', function(e) {

            const endX = e.changedTouches[0].clientX;

            if (startX - endX > 50) {

                nextSlide();

            }

            if (endX - startX > 50) {

                prevSlide();

            }

        });

</script>

</body>
</html

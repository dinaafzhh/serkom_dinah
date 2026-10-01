<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SMK YPC Tasikmalaya</title>

    <link rel="icon"
          type="image/png"
          href="{{ asset('assets/images/favicon.ico') }}">

    <link rel="stylesheet"
          href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet"
          href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">

</head>

<body>

<nav class="navbar navbar-expand-lg shadow-sm"
     style="background: linear-gradient(90deg, #6c757d, #ffffff);">

    <div class="container">

        <a class="navbar-brand fw-bold text-dark"
           href="/">
            SMK YPC Tasikmalaya
        </a>

        <div class="ms-auto">

            <a href="/login"
               class="btn btn-dark">
                Login
            </a>

        </div>

    </div>

</nav>

<section>

    <div id="heroSlider"
         class="carousel slide"
         data-bs-ride="carousel">

        <div class="carousel-indicators">

            <button type="button"
                    data-bs-target="#heroSlider"
                    data-bs-slide-to="0"
                    class="active">
            </button>

            <button type="button"
                    data-bs-target="#heroSlider"
                    data-bs-slide-to="1">
            </button>

            <button type="button"
                    data-bs-target="#heroSlider"
                    data-bs-slide-to="2">
            </button>

        </div>

        <div class="carousel-inner">

            <div class="carousel-item active">

                <div style="min-height: 600px; background: linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.55)), url('{{ asset('assets/images/smkypc.jpeg') }}') center/cover;">

                    <div class="container">

                        <div class="row align-items-center"
                             style="min-height: 600px;">

                            <div class="col-md-7 text-white">

                                <p class="fw-bold text-uppercase mb-2">
                                    Sekolah Unggulan
                                </p>

                                <h1 class="fw-bold display-4">
                                    Membangun Generasi
                                    <br>
                                    Unggul
                                </h1>

                                <p class="fs-5 mt-3">
                                    Lingkungan belajar modern dengan tenaga
                                    pendidik profesional dan program terarah
                                    untuk membentuk karakter, kompetensi,
                                    dan kesiapan karier siswa.
                                </p>

                                <a href="#profil"
                                   class="btn btn-light mt-3 px-4 py-2">
                                    Lihat Profil
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="carousel-item">

                <div style="min-height: 600px; background: linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.55)), url('{{ asset('assets/images/smk.jpg') }}') center/cover;">

                    <div class="container">

                        <div class="row align-items-center"
                             style="min-height: 600px;">

                            <div class="col-md-7 text-white">

                                <p class="fw-bold text-uppercase mb-2">
                                    SMK YPC Tasikmalaya
                                </p>

                                <h1 class="fw-bold display-4">
                                    Belajar dan
                                    <br>
                                    Berkarya
                                </h1>

                                <p class="fs-5 mt-3">
                                    Menciptakan lingkungan pendidikan yang
                                    nyaman untuk mengembangkan potensi siswa.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="carousel-item">

                <div style="min-height: 600px; background: linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.55)), url('{{ asset('assets/images/lingkungan.webp') }}') center/cover;">

                    <div class="container">

                        <div class="row align-items-center"
                             style="min-height: 600px;">

                            <div class="col-md-7 text-white">

                                <p class="fw-bold text-uppercase mb-2">
                                    Pendidikan Berkualitas
                                </p>

                                <h1 class="fw-bold display-4">
                                    Siap Menghadapi
                                    <br>
                                    Masa Depan
                                </h1>

                                <p class="fs-5 mt-3">
                                    Membekali siswa dengan pengetahuan,
                                    keterampilan, dan pengalaman untuk masa depan.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <button class="carousel-control-prev"
                type="button"
                data-bs-target="#heroSlider"
                data-bs-slide="prev">

            <span class="carousel-control-prev-icon"></span>

        </button>

        <button class="carousel-control-next"
                type="button"
                data-bs-target="#heroSlider"
                data-bs-slide="next">

            <span class="carousel-control-next-icon"></span>

        </button>

    </div>

</section>

<section class="py-5 bg-white"
         id="profil">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-md-5 text-center mb-4 mb-md-0">

                <img src="{{ asset('assets/images/Kplsekolah.jpg') }}"
                     class="img-fluid rounded-4 shadow-sm"
                     style="width: 280px; height: 330px; object-fit: cover;">

                <h4 class="fw-bold text-secondary mt-3 mb-1">
                    Drs. Ujang Sanusi, M.M
                </h4>

                <p class="text-secondary">
                    Kepala Sekolah
                </p>

            </div>

            <div class="col-md-7">

                <h2 class="fw-bold text-secondary mb-2">
                    Komitmen Kami untuk Pendidikan
                </h2>

                <h3 class="fw-bold text-secondary mb-4">
                    Sambutan Kepala Sekolah
                </h3>

                <p class="text-secondary">
                    Puji syukur ke hadirat Tuhan YME atas segala rahmat dan
                    karunia-Nya. Selamat datang di website resmi sekolah kami.
                    Website ini kami hadirkan sebagai sarana informasi dan
                    komunikasi antara sekolah dengan orang tua, peserta didik,
                    serta masyarakat luas.
                </p>

                <p class="text-secondary">
                    Melalui media ini, kami berharap seluruh informasi mengenai
                    kegiatan, prestasi, serta program pendidikan dapat
                    tersampaikan secara transparan, cepat, dan akurat.
                </p>

            </div>

        </div>

    </div>

</section>

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold text-secondary">
                Berita Terbaru
            </h2>

            <p class="text-secondary">
                Informasi dan kegiatan terbaru SMK YPC Tasikmalaya
            </p>

        </div>

        @if ($berita)

            <div class="row justify-content-center">

                <div class="col-md-6">

                    <div class="card h-100 border-0 shadow-sm">

                        @if ($berita->gambar)

                            <img src="{{ asset('storage/' . $berita->gambar) }}"
                                 class="card-img-top"
                                 style="height: 280px; object-fit: cover;">

                        @else

                            <div class="bg-secondary d-flex align-items-center justify-content-center"
                                 style="height: 280px;">

                                <span class="text-white">
                                    Tidak ada gambar
                                </span>

                            </div>

                        @endif

                        <div class="card-body">

                            <p class="text-secondary small mb-2">
                                {{ $berita->tanggal }}
                            </p>

                            <h5 class="fw-bold text-dark">
                                {{ $berita->judul }}
                            </h5>

                            <p class="text-secondary">
                                {{ Str::limit($berita->isi, 150) }}
                            </p>

                            <a href="{{ route('berita.detail', $berita->id_berita) }}"
                               class="btn btn-outline-secondary mt-2">
                                Selengkapnya
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        @else

            <div class="text-center">

                <p class="text-secondary">
                    Belum ada berita terbaru.
                </p>

            </div>

        @endif

    </div>

</section>

<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>

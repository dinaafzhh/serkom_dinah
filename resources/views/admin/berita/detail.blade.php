<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $berita->judul }} - SMK YPC Tasikmalaya</title>

    <link
        rel="stylesheet"
        href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}"
    >

</head>

<body>

<nav
    class="navbar navbar-expand-lg shadow-sm"
    style="background: linear-gradient(90deg, #6c757d, #ffffff);"
>

    <div class="container">

        <a
            class="navbar-brand fw-bold text-dark"
            href="/"
        >
            SMK YPC Tasikmalaya
        </a>

        <div class="ms-auto">

            <a
                href="/"
                class="btn btn-dark"
            >
                Beranda
            </a>

        </div>

    </div>

</nav>


<section class="py-5 bg-light">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-9">

                <div class="card border-0 shadow-sm">

                    @if ($berita->gambar)

                        <img
                            src="{{ asset('storage/' . $berita->gambar) }}"
                            class="card-img-top"
                            style="max-height: 450px; object-fit: cover;"
                            alt="{{ $berita->judul }}"
                        >

                    @endif


                    <div class="card-body p-4 p-md-5">

                        <p class="text-secondary mb-1">
                            {{ \Carbon\Carbon::parse($berita->tanggal)->format('d-m-Y') }}
                        </p>

                        <p class="text-secondary mb-3">
                            Penulis:
                            {{ $berita->user->username ?? '-' }}
                        </p>

                        <h1 class="fw-bold text-dark mb-4">
                            {{ $berita->judul }}
                        </h1>

                        <div
                            class="text-secondary"
                            style="line-height: 1.8;"
                        >
                            {!! nl2br(e($berita->isi)) !!}
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<section class="py-5 bg-white">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold text-secondary">
                Berita Lainnya
            </h2>

            <p class="text-secondary">
                Berita dan informasi lainnya dari SMK YPC Tasikmalaya
            </p>

        </div>


        <div class="row g-4">

            @forelse ($beritaLain as $item)

                <div class="col-md-4">

                    <div class="card h-100 border-0 shadow-sm">

                        @if ($item->gambar)

                            <img
                                src="{{ asset('storage/' . $item->gambar) }}"
                                class="card-img-top"
                                style="height: 200px; object-fit: cover;"
                                alt="{{ $item->judul }}"
                            >

                        @endif


                        <div class="card-body">

                            <p class="text-secondary small mb-1">
                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}
                            </p>

                            <p class="text-secondary small mb-2">
                                Penulis:
                                {{ $item->user->username ?? '-' }}
                            </p>

                            <h5 class="fw-bold text-dark">
                                {{ $item->judul }}
                            </h5>

                            <p class="text-secondary">
                                {{ Str::limit($item->isi, 100) }}
                            </p>

                            <a
                                href="{{ route('berita.detail', $item->id_berita) }}"
                                class="btn btn-outline-secondary"
                            >
                                Selengkapnya
                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12 text-center">

                    <p class="text-secondary">
                        Belum ada berita lainnya.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</section>


<script
    src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"
></script>

</body>

</html>

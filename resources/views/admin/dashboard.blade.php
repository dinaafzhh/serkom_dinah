@extends('layouts.admin')

@section('content')

<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<style>
    .dashboard-page {
        padding: 10px;
    }

    /* HEADER */
    .dashboard-header {
        background: linear-gradient(135deg, #374151, #e5e7eb);
        color: white;
        padding: 28px;
        border-radius: 15px;
        margin-bottom: 25px;
        position: relative;
        overflow: hidden;
    }

    .dashboard-header::after {
        content: "";
        position: absolute;
        width: 180px;
        height: 180px;
        background: rgba(255, 255, 255, 0.25);
        border-radius: 50%;
        right: -50px;
        top: -70px;
    }

    .dashboard-header h2 {
        font-weight: 700;
        margin-bottom: 8px;
        position: relative;
        z-index: 2;
    }

    .dashboard-header p {
        margin: 0;
        opacity: 0.9;
        position: relative;
        z-index: 2;
    }

    .dashboard-header .school-icon {
        position: absolute;
        right: 35px;
        bottom: 20px;
        font-size: 75px;
        opacity: 0.15;
    }

    /* CARD TOTAL */
    .dashboard-card {
        border: none !important;
        border-radius: 14px;
        background: white;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        transition: 0.3s;
        overflow: hidden;
        height: 100%;
    }

    .dashboard-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 22px rgba(0, 0, 0, 0.12);
    }

    .dashboard-card .card-body {
        padding: 22px;
    }

    .dashboard-icon {
        width: 52px;
        height: 52px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 23px;
        color: white;
        margin-bottom: 15px;
    }

    .icon-gray {
        background: #6b7280;
    }

    .icon-gray-light {
        background: #9ca3af;
    }

    .icon-gray-dark {
        background: #374151;
    }

    .icon-gray-darker {
        background: #4b5563;
    }

    .stat-icon {
        font-size: 38px;
        color: #374151 !important;
        transition: 0.3s;
    }

    .dashboard-card:hover .stat-icon {
        color: #6b7280 !important;
        transform: scale(1.1);
    }

    .dashboard-card h3 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 3px;
        color: #374151;
    }

    .dashboard-card p {
        margin: 0;
        color: #777;
    }

    /* INFORMASI SEKOLAH */
    .dashboard-section {
        margin-top: 25px;
    }

    .section-card {
        background: #ffffff;
        border-radius: 14px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.07);
        border: none;
        overflow: hidden;
    }

    .section-card-header {
        padding: 20px 22px 0;
    }

    .section-card-header h5 {
        margin: 0;
        font-weight: 700;
        color: #374151;
    }

    .section-card-header i {
        color: #6b7280;
    }

    .section-card-body {
        padding: 22px;
    }

    .school-info {
        display: flex;
        align-items: center;
        gap: 18px;
        padding: 18px;
        background: #f3f4f6;
        border-radius: 12px;
        margin-bottom: 15px;
    }

    .school-info:last-child {
        margin-bottom: 0;
    }

    .school-info-icon {
        min-width: 45px;
        width: 45px;
        height: 45px;
        border-radius: 10px;
        background: #6b7280;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
    }

    .school-info:nth-child(even) .school-info-icon {
        background: #374151;
    }

    .school-info h6 {
        margin: 0 0 3px;
        font-weight: 700;
        color: #333;
    }

    .school-info p {
        margin: 0;
        color: #777;
        font-size: 14px;
    }

    @media (max-width: 768px) {

        .dashboard-header {
            padding: 22px;
        }

        .dashboard-header h2 {
            font-size: 22px;
        }

        .dashboard-header .school-icon {
            display: none;
        }
    }
</style>

<div class="dashboard-page">

    <div class="dashboard-header">

        <i class="fa-solid fa-school school-icon"></i>

        <h2>
            Selamat Datang di Dashboard
        </h2>

        <p>
            Sistem Informasi Sekolah SMK YPC Tasikmalaya
        </p>

    </div>

    <div class="row g-4">

        <div class="col-xl-3 col-md-6">

            <div class="dashboard-card">

                <div class="card-body">

                    <div class="dashboard-icon icon-gray">
                        <i class="fa-solid fa-users"></i>
                    </div>

                    <div class="d-flex align-items-center justify-content-between">

                        <div>
                            <h3>{{ $totalSiswa }}</h3>
                            <p>Total Siswa</p>
                        </div>

                        <i class="fa-solid fa-user-graduate stat-icon"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-xl-3 col-md-6">

            <div class="dashboard-card">

                <div class="card-body">

                    <div class="dashboard-icon icon-gray-light">
                        <i class="fa-solid fa-chalkboard-user"></i>
                    </div>

                    <div class="d-flex align-items-center justify-content-between">

                        <div>
                            <h3>{{ $totalGuru }}</h3>
                            <p>Total Guru</p>
                        </div>

                        <i class="fa-solid fa-person-chalkboard stat-icon"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-xl-3 col-md-6">

            <div class="dashboard-card">

                <div class="card-body">

                    <div class="dashboard-icon icon-gray-dark">
                        <i class="fa-solid fa-newspaper"></i>
                    </div>

                    <div class="d-flex align-items-center justify-content-between">

                        <div>
                            <h3>{{ $totalBerita }}</h3>
                            <p>Total Berita</p>
                        </div>

                        <i class="fa-solid fa-file-lines stat-icon"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-xl-3 col-md-6">

            <div class="dashboard-card">

                <div class="card-body">

                    <div class="dashboard-icon icon-gray-darker">
                        <i class="fa-solid fa-puzzle-piece"></i>
                    </div>

                    <div class="d-flex align-items-center justify-content-between">

                        <div>
                            <h3>{{ $totalEkstrakurikuler }}</h3>
                            <p>Total Ekstrakurikuler</p>
                        </div>

                        <i class="fa-solid fa-trophy stat-icon"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="dashboard-section">

        <div class="section-card">

            <div class="section-card-header">

                <h5>
                    <i class="fa-solid fa-school me-2"></i>
                    Informasi Sekolah
                </h5>

            </div>


            <div class="section-card-body">

                <div class="school-info">

                    <div class="school-info-icon">
                        <i class="fa-solid fa-building"></i>
                    </div>

                    <div>

                        <h6>
                            Nama Sekolah
                        </h6>

                        <p>
                            SMK YPC Tasikmalaya
                        </p>

                    </div>

                </div>

                <div class="school-info">

                    <div class="school-info-icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>

                    <div>

                        <h6>
                            Lokasi
                        </h6>

                        <p>
                            Tasikmalaya, Jawa Barat
                        </p>

                    </div>

                </div>

                <div class="school-info">

                    <div class="school-info-icon">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>

                    <div>

                        <h6>
                           Jenjang pendidikan
                        </h6>

                        <p>
                            Sekolah Menengah Kejuruan
                        </p>

                    </div>

                </div>

                <div class="school-info">

                    <div class="school-info-icon">
                        <i class="fa-solid fa-laptop-code"></i>
                    </div>

                    <div>

                        <h6>
                            Sistem Informasi
                        </h6>

                        <p>
                            Pengelolaan data dan informasi sekolah
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

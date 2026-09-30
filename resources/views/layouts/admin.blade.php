<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin - SMK YPC Tasikmalaya</title>

    <meta name="description" content="Admin Dashboard SMK YPC Tasikmalaya">
    <meta name="author" content="SMK YPC Tasikmalaya">

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/apexcharts/apexcharts.css') }}">
    <link rel="stylesheet"---  href="{{ asset('assets/css/main.css') }}">

    <style>
        .sidebar-brand img {
            width: 50px;
            height: 50px;
            object-fit: contain;
            margin-right: 8px;
        }
    </style>
</head>

<body>

    <div class="sidebar-wrapper bg-dark" id="sidebar">

        <a href="{{ route('admin.dashboard') }}"
           class="sidebar-brand text-decoration-none text-white">

            <img src="{{ asset('assets/images/logo.webp') }}"
                 alt="Logo SMK YPC">

            <span>SMK YPC Tasikmalaya</span>

        </a>

        <div class="flex-grow-1 overflow-y-auto">

            <div class="sidebar-menu-section">

                <div class="sidebar-menu-title">
                    MENU
                </div>

                <ul class="sidebar-menu-list">

                    <li class="sidebar-menu-item">

                        <a href="{{ route('admin.dashboard') }}"
                           class="sidebar-menu-link
                           {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                            <i class="bi bi-speedometer2"></i>

                            <span>
                                Dashboard
                            </span>

                        </a>

                    </li>

                </ul>

            </div>

            <div class="sidebar-menu-section">

                <div class="sidebar-menu-title">
                    PENGATURAN
                </div>

                <ul class="sidebar-menu-list">

                    <li class="sidebar-menu-item">

                        <a href="{{ route('admin.profil.profil') }}"
                           class="sidebar-menu-link
                           {{ request()->routeIs('admin.profil.*') ? 'active' : '' }}">

                            <i class="bi bi-building-fill"></i>

                            <span>
                                Profil Sekolah
                            </span>

                        </a>

                    </li>

                </ul>

            </div>

            <div class="sidebar-menu-section">

                <div class="sidebar-menu-title">
                    MASTER DATA
                </div>

                <ul class="sidebar-menu-list">

                    <li class="sidebar-menu-item">

                        <a href="{{ route('admin.guru.guru') }}"
                           class="sidebar-menu-link
                           {{ request()->routeIs('admin.guru.*') ? 'active' : '' }}">

                            <i class="bi bi-person-workspace"></i>

                            <span>
                                Guru
                            </span>

                        </a>

                    </li>

                    <li class="sidebar-menu-item">

                        <a href="{{ route('admin.siswa.siswa') }}"
                           class="sidebar-menu-link
                           {{ request()->routeIs('admin.siswa.*') ? 'active' : '' }}">

                            <i class="bi bi-people-fill"></i>

                            <span>
                                Siswa
                            </span>

                        </a>

                    </li>

                </ul>

            </div>

            <div class="sidebar-menu-section">

                <div class="sidebar-menu-title">
                    KESISWAAN
                </div>

                <ul class="sidebar-menu-list">

                    <li class="sidebar-menu-item">

                        <a href="{{ route('admin.ektrakurikuler.ektrakurikuler') }}"
                           class="sidebar-menu-link
                           {{ request()->routeIs('admin.ektrakurikuler.*') ? 'active' : '' }}">

                            <i class="bi bi-trophy-fill"></i>

                            <span>
                                Ekstrakurikuler
                            </span>

                        </a>

                    </li>

                </ul>

            </div>

            <div class="sidebar-menu-section">

                <div class="sidebar-menu-title">
                    PUBLIKASI
                </div>

                <ul class="sidebar-menu-list">

                    <li class="sidebar-menu-item">

                        <a href="{{ route('admin.berita.berita') }}"
                           class="sidebar-menu-link
                           {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">

                            <i class="bi bi-newspaper"></i>

                            <span>
                                Berita
                            </span>

                        </a>

                    </li>

                    <li class="sidebar-menu-item">

                        <a href="{{ route('admin.galeri.galeri') }}"
                           class="sidebar-menu-link
                           {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">

                            <i class="bi bi-images"></i>

                            <span>
                                Galeri
                            </span>

                        </a>

                    </li>

                    <li class="sidebar-menu-item">

                        <a href="{{ route('admin.user.user') }}"
                           class="sidebar-menu-link
                           {{ request()->routeIs('admin.user.*') ? 'active' : '' }}">

                            <i class="bi bi-people"></i>

                            <span>
                                Kelola User
                            </span>

                        </a>

                    </li>

                </ul>

            </div>

        </div>

    </div>

    <div class="main-wrapper">


        <header class="navbar-custom bg-white">

            <!-- NAVBAR LEFT -->
            <div class="navbar-left">

                <!-- Mobile Sidebar -->
                <button
                    class="sidebar-toggle-btn me-3"
                    id="sidebar-toggle"
                    type="button"
                >

                    <i class="bi bi-list"></i>

                </button>

                <button
                    class="btn-desktop-toggle d-none d-xl-flex"
                    id="desktop-sidebar-toggle"
                    type="button"
                >

                    <i class="bi bi-chevron-bar-left"></i>

                </button>

            </div>

            <div class="navbar-search-wrapper">

                <input
                    type="text"
                    class="navbar-search-input"
                    placeholder="Search..."
                    id="main-search"
                >

                <button
                    class="navbar-search-btn"
                    type="button"
                >

                    <i class="bi bi-search"></i>

                </button>

            </div>

            <div class="navbar-actions">

                <div class="dropdown">

                    <button
                        class="navbar-profile-btn dropdown-toggle"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        id="profile-dropdown"
                    >

                        <span class="navbar-profile-icon">

                            <i class="bi bi-person-fill"></i>

                        </span>

                        <span class="navbar-profile-name d-none d-md-inline">
                            Administrator
                        </span>

                    </button>

                    <ul
                        class="dropdown-menu dropdown-menu-end"
                        aria-labelledby="profile-dropdown"
                    >

                        <li class="dropdown-header">

                            <strong>
                                Administrator
                            </strong>

                            <br>

                            <small>
                                Admin Sekolah
                            </small>

                        </li>


                        <li>

                            <a
                                class="dropdown-item"
                                href="{{ route('admin.profil.profil') }}"
                            >

                                <i class="bi bi-building me-2"></i>

                                Profil Sekolah

                            </a>

                        </li>

                        <li>

                            <a
                                class="dropdown-item"
                                href="{{ route('admin.user.user') }}"
                            >

                                <i class="bi bi-people me-2"></i>

                                Manajemen Pengguna

                            </a>

                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>


                        <li>

                            <form
                                action="{{ route('logout') }}"
                                method="POST"
                            >

                                @csrf

                                <button
                                    type="submit"
                                    class="dropdown-item text-danger"
                                >

                                    <i class="bi bi-box-arrow-right me-2"></i>

                                    Logout

                                </button>

                            </form>

                        </li>

                    </ul>

                </div>

            </div>

        </header>


        <main>

            @yield('content')

        </main>

        <footer class="footer-custom bg-white">

            <div class="footer-left">

                <span class="footer-copy">

                    Copyright &copy; 2026

                    <strong>
                        SMK YPC
                    </strong>.

                    All rights reserved.

                </span>

            </div>

        </footer>

    </div>

    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const searchInput =
                document.getElementById('main-search');


            if (searchInput) {

                searchInput.addEventListener('keyup', function () {

                    const keyword =
                        this.value.toLowerCase().trim();


                    const tableRows =
                        document.querySelectorAll('table tbody tr');


                    tableRows.forEach(function (row) {

                        const rowText =
                            row.textContent.toLowerCase();


                        if (rowText.includes(keyword)) {

                            row.style.display = '';

                        } else {

                            row.style.display = 'none';

                        }

                    });

                });

            }

        });

    </script>

</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital PECS</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/Logo BG White.png') }}">
    <link rel="stylesheet" href="{{ asset('css/landing-style.css') }}">
</head>
<body>

   {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">

            <a class="navbar-brand fw-bold text-blue" href="#">
                Digital PECS
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item me-lg-3">
                        <a class="nav-link" href="#home">
                            Home
                        </a>
                    </li>

                    <li class="nav-item me-lg-3">
                        <a class="nav-link" href="#download">
                            Download Aplikasi
                        </a>
                    </li>

                    <li class="nav-item">

                        @if (Route::has('login'))

                            @auth

                                <a href="{{ url('/home') }}"
                                class="btn btn-primary">
                                    Dashboard
                                </a>

                            @else

                                <a href="{{ route('login') }}"
                                class="btn btn-outline-primary">
                                    Login
                                </a>

                            @endauth

                        @endif

                    </li>

                </ul>

            </div>

        </div>
    </nav>

    {{-- Hero Section --}}
    <section id="home" class="hero-section">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-6">

                    <h1 class="display-4 fw-bold mb-4">
                        Membantu Anak Autism Berkomunikasi Lebih Mudah
                    </h1>

                    <p class="text-secondary fs-5 mb-4">
                        Digital PECS adalah aplikasi pembelajaran komunikasi berbasis gambar dan suara
                        untuk membantu anak-anak autism mengenali serta menyampaikan kebutuhan mereka sehari-hari.
                    </p>

                    <a href="#download" class="btn btn-primary btn-lg">
                        Download Aplikasi
                    </a>

                </div>

                <div class="col-lg-6 text-center mt-5 mt-lg-0">

                    <img
                        src="{{ asset('images/Logo BG Transparent.png') }}"
                        alt="Digital PECS"
                        class="img-fluid"
                        style="max-width: 600px;"
                    >

                </div>

            </div>

        </div>

    </section>

    {{-- Section 2 --}}
    <section class="py-5">

        <div class="container">

            <div class="text-center mb-5">

                <h2 class="section-title">
                    Tentang Digital PECS
                </h2>

                <p class="text-secondary">
                    Aplikasi interaktif berbasis gambar dan suara untuk mendukung komunikasi anak-anak autism.
                </p>

            </div>

            <div class="row g-4">

                <div class="col-md-4">

                    <div class="card shadow-sm feature-card p-4">

                        <div class="icon-box">
                            🖼️
                        </div>

                        <h5 class="fw-bold">
                            Modul Bergambar
                        </h5>

                        <p class="text-secondary mb-0">
                            Anak dapat memilih gambar sesuai kebutuhan seperti makanan,
                            minuman, aktivitas, dan lainnya.
                        </p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card shadow-sm feature-card p-4">

                        <div class="icon-box">
                            🔊
                        </div>

                        <h5 class="fw-bold">
                            Suara Interaktif
                        </h5>

                        <p class="text-secondary mb-0">
                            Setiap gambar dapat mengeluarkan suara untuk membantu anak memahami
                            dan menyampaikan keinginannya.
                        </p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card shadow-sm feature-card p-4">

                        <div class="icon-box">
                            📚
                        </div>

                        <h5 class="fw-bold">
                            Banyak Modul
                        </h5>

                        <p class="text-secondary mb-0">
                            Tersedia berbagai kategori pembelajaran yang mudah dipahami dan digunakan
                            oleh anak-anak autism.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

    {{-- Section 3 --}}
    <section id="download" class="py-5 bg-light">

        <div class="container">

            <div class="row justify-content-center text-center">

                <div class="col-lg-8">

                    <h2 class="section-title">
                        Download Aplikasi Digital PECS
                    </h2>

                    <p class="text-secondary mb-4">
                        Gunakan aplikasi Digital PECS untuk membantu proses komunikasi dan pembelajaran
                        anak-anak autism secara lebih interaktif dan menyenangkan.
                    </p>

                    <a href="#" class="btn btn-primary btn-lg">
                        Download Sekarang
                    </a>

                </div>

            </div>

        </div>

    </section>

    {{-- Footer --}}
    <footer class="text-white py-4">

        <div class="container text-center">

            

            <small>
                <b>Digital PECS</b> © 2026. All rights reserved.
            </small>

        </div>

    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
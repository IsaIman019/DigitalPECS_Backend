<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital PECS | Login</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/landing-style.css') }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('images/Logo BG White.png') }}">

    <link rel="stylesheet" href="{{ asset('css/login-style.css') }}">
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">

            <a class="navbar-brand fw-bold text-blue" href="/">
                Digital PECS
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item me-lg-3">
                        <a class="nav-link" href="/">
                            Home
                        </a>
                    </li>

                    <li class="nav-item me-lg-3">
                        <a class="nav-link" href="/#download">
                            Download Aplikasi
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('login') }}"
                           class="btn btn-outline-primary">
                            Login
                        </a>
                    </li>

                </ul>

            </div>

        </div>
    </nav>

    {{-- Login Section --}}
    <section class="login-section mb-3">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-5">

                    <div class="card shadow login-card">

                        <div class="card-body p-5">

                            <div class="text-center mb-4">

                                <img
                                    src="{{ asset('images/Logo BG Transparent.png') }}"
                                    alt="Digital PECS"
                                    class="login-logo"
                                >

                                <h3 class="login-title">
                                    Login
                                </h3>

                                <p class="text-secondary">
                                    Masuk ke dashboard Digital PECS
                                </p>

                            </div>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                {{-- Email --}}
                                <div class="mb-3">

                                    <label class="form-label">
                                        Email
                                    </label>

                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}"
                                        required
                                        autofocus
                                    >

                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                {{-- Password --}}
                                <div class="mb-4">

                                    <label class="form-label">
                                        Password
                                    </label>

                                    <input
                                        type="password"
                                        name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        required
                                    >

                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                {{-- Button --}}
                                <div class="d-grid">

                                    <button type="submit" class="btn btn-primary btn-lg">
                                        Login
                                    </button>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
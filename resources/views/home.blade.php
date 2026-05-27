@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    {{-- Heading --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <div>
            <h1 class="h3 mb-0 text-gray-800 font-weight-bold">
                Dashboard
            </h1>

            <small class="text-muted">
                Selamat datang kembali, <b>{{ Auth::user()->username }}</b>
            </small>
        </div>

    </div>

    {{-- Statistic Cards --}}
    <div class="row">

        {{-- Total User --}}
        <div class="col-xl-4 col-md-6 mb-4">

            <div class="card border-left-primary shadow h-100 py-2">

                <div class="card-body">

                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Users
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $totalUsers }}
                            </div>

                        </div>

                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- Total Guru --}}
        <div class="col-xl-4 col-md-6 mb-4">

            <div class="card border-left-success shadow h-100 py-2">

                <div class="card-body">

                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Guru
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $totalGuru }}
                            </div>

                        </div>

                        <div class="col-auto">
                            <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- Total Anak --}}
        <div class="col-xl-4 col-md-6 mb-4">

            <div class="card border-left-info shadow h-100 py-2">

                <div class="card-body">

                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Anak
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $totalAnak }}
                            </div>

                        </div>

                        <div class="col-auto">
                            <i class="fas fa-child fa-2x text-gray-300"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- Welcome Card --}}
    <div class="row">

        <div class="col-lg-12">

            <div class="card shadow mb-4 border-left-primary">

                <div class="card-body p-4">

                    <h4 class="font-weight-bold text-primary mb-3">
                        Selamat Datang di Digital PECS Dashboard👋
                    </h4>

                    <p class="mb-2 text-gray-700">
                        Sistem ini digunakan untuk membantu pengelolaan data pengguna,
                        guru, orang tua, dan anak pada aplikasi Digital PECS.
                    </p>

                    <p class="mb-0 text-muted">
                        Silakan gunakan menu sidebar untuk mengelola data dan memonitor aktivitas sistem.
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
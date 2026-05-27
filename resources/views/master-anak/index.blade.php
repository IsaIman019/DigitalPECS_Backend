@extends('layouts.app')
@section('title', 'Master Anak / Siswa')
@section('content')
<div class="container-fluid">
                    <h1 class="h3 mb-3 text-gray-800 font-weight-bold"><b>Master Anak / Siswa</b></h1>  
                    @if (session('success'))

                        <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert">

                            {{ session('success') }}

                        

                        </div>

                    @endif

                    @if (session('error'))

                        <div id="errorAlert" class="alert alert-danger alert-dismissible fade show" role="alert">

                            {{ session('error') }}

                            

                        </div>

                    @endif                  
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 text-primary">List Data Anak / Siswa</h6>
                            

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="usersTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Anak</th>
                                            <th>Nama Orang Tua</th>
                                            <th>Alamat</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($anak as $anak)

                                            <tr>
                                                <td>{{ $anak->username }}</td>
                                                <td>{{ $anak->ortu->username ?? '-'}}
                                                <td>{{ $anak->alamat }}</td>
                                                <td>{{ $anak->tgl_lahir }}</td>
                                                <td>
                                                    @if ($anak->status == 'ACTIVE')

                                                        <span class="badge bg-success">
                                                            ACTIVE
                                                        </span>

                                                    @else
                                                        <span class="badge bg-danger">
                                                            NONACTIVE
                                                        </span>
                                                    @endif
                                                </td>
                                                
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    Data Anak / Siswa kosong
                                                </td>
                                            </tr>
                                            
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
@push('scripts')
<script>
    $(document).ready(function () {
        $('#usersTable').DataTable();
    });

    setTimeout(function () {

        $('#successAlert').fadeOut('slow');
        $('#errorAlert').fadeOut('slow');

    }, 5000);
</script>
@endpush
@endsection
@extends('layouts.app')
@section('title', 'Master Guru')
@section('content')
<div class="container-fluid">
                    <h1 class="h3 mb-3 text-gray-800 font-weight-bold"><b>Master Guru</b></h1>  
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
                            <h6 class="m-0 text-primary">List Data Guru</h6>
                            

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="usersTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Guru</th>
                                            <th>Alamat</th>
                                            <th>No. HP</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($guru as $guru)

                                            <tr>
                                                <td>{{ $guru->username }}</td>
                                                <td>{{ $guru->alamat }}</td>
                                                <td>{{ $guru->nohp }}</td>
                                                <td>
                                                    @if ($guru->status == 'ACTIVE')

                                                        <span class="badge bg-success">
                                                            ACTIVE
                                                        </span>

                                                    @else
                                                        <span class="badge bg-danger">
                                                            NONACTIVE
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>                                 

                                                        <button type="button"
                                                                class="btn btn-danger btn-sm"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#deleteModal{{ $guru->id }}">

                                                            <i class="fas fa-trash"></i>

                                                        </button>

                                                    
                                                </td>
                                                
                                            </tr>
                                            <div class="modal fade"
                                                id="deleteModal{{ $guru->id }}"
                                                tabindex="-1"
                                                aria-hidden="true">

                                                <div class="modal-dialog">

                                                    <div class="modal-content">

                                                        <div class="modal-header">

                                                            <h5 class="modal-title">
                                                                Hapus Guru
                                                            </h5>

                                                            <button type="button"
                                                                    class="btn-close"
                                                                    data-bs-dismiss="modal">
                                                            </button>

                                                        </div>

                                                        <div class="modal-body">

                                                            Yakin ingin menghapus guru 
                                                            <b>{{ $guru->username }}</b> ?

                                                        </div>

                                                        <div class="modal-footer">

                                                            <button type="button"
                                                                    class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">

                                                                Batal

                                                            </button>

                                                            <form action="{{ url('/master-users/'.$guru->id.'/delete') }}"
                                                                method="POST">

                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit"
                                                                        class="btn btn-danger">

                                                                    Hapus

                                                                </button>

                                                            </form>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    Data Guru kosong
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
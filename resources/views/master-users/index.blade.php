@extends('layouts.app')
@section('title', 'Master Users')
@section('content')
<div class="container-fluid">
                    <h1 class="h3 mb-3 text-gray-800 font-weight-bold"><b>Master Users</b></h1>  
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
                            <h6 class="m-0 text-primary">List Data Users</h6>
                            <a href="{{ url('/master-users/create') }}"
                            class="btn btn-primary btn-sm">

                                <i class="fas fa-plus"></i>
                                Tambah User

                            </a>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="usersTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)

                                            <tr>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td>
                                                    @if ($user->status == 'ACTIVE')

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
                                                    @if ($user->role != 'SuperAdmin')

                                                        <a href="{{ url('/master-users/'.$user->id.'/edit') }}"
                                                        class="btn btn-warning btn-sm">

                                                            <i class="fas fa-info-circle"></i>

                                                        </a>

                                                    @else

                                                        <button class="btn btn-secondary btn-sm" disabled
                                                                title="SuperAdmin tidak bisa diedit">

                                                            <i class="fas fa-info-circle"></i>

                                                        </button>

                                                    @endif
                                                    @if ($user->role != 'SuperAdmin')

                                                        <button type="button"
                                                                class="btn btn-danger btn-sm"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#deleteModal{{ $user->id }}">

                                                            <i class="fas fa-trash"></i>

                                                        </button>

                                                    @else

                                                        <button class="btn btn-secondary btn-sm" disabled>

                                                            <i class="fas fa-trash"></i>

                                                        </button>

                                                    @endif
                                                </td>
                                            </tr>
                                            <div class="modal fade"
                                                id="deleteModal{{ $user->id }}"
                                                tabindex="-1"
                                                aria-hidden="true">

                                                <div class="modal-dialog">

                                                    <div class="modal-content">

                                                        <div class="modal-header">

                                                            <h5 class="modal-title">
                                                                Hapus User
                                                            </h5>

                                                            <button type="button"
                                                                    class="btn-close"
                                                                    data-bs-dismiss="modal">
                                                            </button>

                                                        </div>

                                                        <div class="modal-body">

                                                            Yakin ingin menghapus user
                                                            <b>{{ $user->username }}</b> ?

                                                        </div>

                                                        <div class="modal-footer">

                                                            <button type="button"
                                                                    class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">

                                                                Batal

                                                            </button>

                                                            <form action="{{ url('/master-users/'.$user->id.'/delete') }}"
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
                                                    Data Users kosong
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
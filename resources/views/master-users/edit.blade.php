@extends('layouts.app')

@section('title', 'Edit User')

@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-3 text-gray-800 font-weight-bold">
        <b>Edit User</b>
    </h1>

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 text-primary">
                Form Edit User
            </h6>
        </div>

        <div class="card-body">

            <form action="{{ url('/master-users/'.$user->id.'/update') }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    {{-- Username --}}
                    <div class="col-md-6 mb-3">
                        <label>Username <span class="text-danger">*</span></label>

                        <input type="text"
                               name="username"
                               class="form-control"
                               value="{{ $user->username }}"
                               required>
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6 mb-3">
                        <label>Email <span class="text-danger">*</span></label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               value="{{ $user->email }}"
                               required>
                    </div>

                    {{-- Password --}}
                    <div class="col-md-6 mb-3">
                        <label>Password Baru</label>

                        <input type="password"
                               name="password"
                               class="form-control">
                        <small class="text-danger">
                            Kosongkan jika tidak ingin mengganti password.
                        </small>
                    </div>

                    {{-- Konfirmasi Password --}}
                    <div class="col-md-6 mb-3">
                        <label>Konfirmasi Password Baru</label>

                        <input type="password"
                               name="password_confirmation"
                               class="form-control">
                        <small class="text-danger">
                            Kosongkan jika tidak ingin mengganti password.
                        </small>
                    </div>

                    {{-- Role --}}
                    <div class="col-md-6 mb-3">
                        <label>Role <span class="text-danger">*</span></label>

                        <select name="role"
                                class="form-control"
                                id="roleSelect"
                                required>

                            <option value="">
                                -- Pilih Role --
                            </option>

                            <option value="Guru"
                                {{ $user->role == 'Guru' ? 'selected' : '' }}>
                                Guru
                            </option>

                            <option value="Orang Tua"
                                {{ $user->role == 'Orang Tua' ? 'selected' : '' }}>
                                Orang Tua
                            </option>

                            <option value="Anak"
                                {{ $user->role == 'Anak' ? 'selected' : '' }}>
                                Anak
                            </option>

                        </select>
                    </div>

                    {{-- No HP --}}
                    <div class="col-md-6 mb-3">
                        <label>No HP</label>

                        <input type="text"
                               name="nohp"
                               class="form-control"
                               value="{{ $user->nohp }}">
                    </div>

                    {{-- Tanggal Lahir --}}
                    <div class="col-md-6 mb-3">
                        <label>Tanggal Lahir</label>

                        <input type="date"
                               name="tgl_lahir"
                               class="form-control"
                               value="{{ $user->tgl_lahir }}">
                    </div>

                    {{-- Orang Tua --}}
                    <div class="col-md-6 mb-3"
                         id="orangTuaField"
                         style="{{ $user->role == 'Anak' ? '' : 'display: none;' }}">

                        <label>Orang Tua <span class="text-danger">*</span></label>

                        <select name="orangtua_id"
                                class="form-control">

                            <option value="">
                                -- Pilih Orang Tua --
                            </option>

                            @foreach ($orangTua as $ortu)

                                <option value="{{ $ortu->id }}"
                                        data-alamat="{{ $ortu->alamat }}"
                                        {{ $user->orangtua_id == $ortu->id ? 'selected' : '' }}>

                                    {{ $ortu->username }}

                                </option>

                            @endforeach

                        </select>
                    </div>

                    {{-- Alamat --}}
                    <div class="col-md-12 mb-3">
                        <label>Alamat <span class="text-danger">*</span></label>

                        <textarea name="alamat"
                                  id="alamatField"
                                  class="form-control"
                                  rows="3">{{ $user->alamat }}</textarea>
                    </div>

                    {{-- Status --}}
                    <div class="col-md-12 mb-3">
                        <label>Status <span class="text-danger">*</span></label>

                        <select name="status"
                                class="form-control">

                            <option value="">
                                -- Pilih Status --
                            </option>

                            <option value="ACTIVE"
                                {{ $user->status == 'ACTIVE' ? 'selected' : '' }}>
                                ACTIVE
                            </option>

                            <option value="NONACTIVE"
                                {{ $user->status == 'NONACTIVE' ? 'selected' : '' }}>
                                NONACTIVE
                            </option>

                        </select>
                    </div>

                </div>

                <div class="mt-3">

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fas fa-save"></i>
                        Update

                    </button>

                    <a href="{{ url('/master-users') }}"
                       class="btn btn-secondary">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection

@push('scripts')
<script>

    $(document).ready(function () {

        $('#roleSelect').change(function () {

            let role = $(this).val();

            if (role === 'Anak') {

                $('#orangTuaField').slideDown();

            } else {

                $('#orangTuaField').slideUp();

                $('#orangTuaField select').val('');

                $('#alamatField').prop('readonly', false);

            }

        });

        $('select[name="orangtua_id"]').change(function () {

            let alamat = $(this).find(':selected').data('alamat');

            if (alamat) {

                $('#alamatField').val(alamat);

                $('#alamatField').prop('readonly', true);

            } else {

                $('#alamatField').prop('readonly', false);

            }

        });

        // Trigger saat halaman load
        $('select[name="orangtua_id"]').trigger('change');

    });

</script>
@endpush
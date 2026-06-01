@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-3 text-gray-800 font-weight-bold">
        <b>Tambah User</b>
    </h1>

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 text-primary">
                Form Tambah User
            </h6>
        </div>

        <div class="card-body">

            <form action="{{ url('/master-users/store') }}" method="POST">

                @csrf

                <div class="row">

                    {{-- Username --}}
                    <div class="col-md-6 mb-3">
                        <label>Username <span class="text-danger">*</span></label>

                        <input type="text"
                               name="username"
                               class="form-control"
                               required>
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6 mb-3">
                        <label>Email <span class="text-danger">*</span></label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               required>
                    </div>

                    {{-- Password --}}
                    <div class="col-md-6 mb-3">
                        <label>Password <span class="text-danger">*</span></label>

                        <input type="password"
                               name="password"
                               class="form-control"
                               required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Konfirmasi Password <span class="text-danger">*</span></label>

                        <input type="password"
                               name="password_confirmation"
                               class="form-control"
                               required>
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

                            {{-- <option value="SuperAdmin">
                                Super Admin
                            </option> --}}

                            <option value="Guru">
                                Guru
                            </option>

                            <option value="Orang Tua" >
                                Orang Tua
                            </option>

                            <option value="Anak">
                                Anak
                            </option>

                        </select>
                    </div>

                    {{-- No HP --}}
                    <div class="col-md-6 mb-3">
                        <label>No HP</label>

                        <input type="text"
                               name="nohp"
                               class="form-control">
                    </div>

                    {{-- Tanggal Lahir --}}
                    <div class="col-md-6 mb-3">
                        <label>Tanggal Lahir</label>

                        <input type="date"
                               name="tgl_lahir"
                               class="form-control">
                    </div>
                    {{-- Orang Tua --}}
                    <div class="col-md-6 mb-3" id="orangTuaField" style="display: none;">
                        <label>Orang Tua <span class="text-danger">*</span></label>

                        <select name="orangtua_id"
                                class="form-control">

                            <option value="">
                                -- Pilih Orang Tua --
                            </option>

                            @foreach ($orangTua as $ortu)

                                <option value="{{ $ortu->id }}" data-alamat="{{ $ortu->alamat }}">
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
                                  rows="3"></textarea>
                    </div>

                    

                    {{-- Status --}}
                    <div class="col-md-12 mb-3">
                        <label>Status <span class="text-danger">*</span></label>

                        <select name="status"
                                class="form-control">
                            <option value="">
                                -- Pilih Status --
                            </option>

                            <option value="ACTIVE">
                                ACTIVE
                            </option>

                            <option value="NONACTIVE">
                                NONACTIVE
                            </option>

                        </select>
                    </div>

                </div>

                <div class="mt-3">
                    
                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fas fa-save"></i>
                        Simpan

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

            }

        });
        $('select[name="orangtua_id"]').change(function () {

            let alamat = $(this).find(':selected').data('alamat');

            if (alamat) {

                $('#alamatField').val(alamat);

                $('#alamatField').prop('readonly', true);

            } else {

                $('#alamatField').val('');

                $('#alamatField').prop('readonly', false);

            }

        });

    });

</script>
@endpush
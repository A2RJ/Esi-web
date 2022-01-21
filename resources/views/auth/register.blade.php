@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8 text-center">
            <h3>Register</h3>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- {{ $errors }} -->
                        <div class="row mb-3">
                            <label for="nama" class="col-md-4 float-left col-form-label text-md-left">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>

                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 float-left col-form-label text-md-left">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- select role -->
                        <div class="row mb-3">
                            <label for="user_role" class="col-md-4 float-left col-form-label text-md-left">Role</label>
                            <div class="col-md-6">
                                <!-- select bootstrap -->
                                <select class="form-control" id="user_role" name="user_role">
                                    <option value="player">Player</option>
                                    <option value="management">Management</option>
                                </select>
                                @error('user_role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kontak" class="col-md-4 float-left col-form-label text-md-left">{{ __('kontak') }}</label>

                            <div class="col-md-6">
                                <input id="kontak" type="number" class="form-control @error('kontak') is-invalid @enderror" name="kontak" value="{{ old('kontak') }}" required autocomplete="kontak">

                                @error('kontak')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 float-left col-form-label text-md-left">Gender</label>
                            <div class="col-md-6">
                                <!-- select bootstrap -->
                                <select class="form-control" id="gender" name="gender">
                                    <option value="l">Laki-Laki</option>
                                    <option value="p">Perempuan</option>
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="alamat" class="col-md-4 float-left col-form-label text-md-left">{{ __('alamat') }}</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat">

                                @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- province -->
                        <div class="row mb-3">
                            <label for="province" class="col-md-4 float-left col-form-label text-md-left">Provinsi</label>
                            <div class="col-md-6">
                                <!-- select bootstrap -->
                                <select onchange="getRegency()" class="form-control" id="province" name="province">
                                </select>
                                @error('province')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- regency -->
                        <div class="row mb-3">
                            <label for="regency" class="col-md-4 float-left col-form-label text-md-left">Kabupaten</label>
                            <div class="col-md-6">
                                <!-- select bootstrap -->
                                <select onchange="getDistrict()" class="form-control" id="regency" name="regency">
                                </select>
                                @error('regency')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- district -->
                        <div class="row mb-3">
                            <label for="district" class="col-md-4 float-left col-form-label text-md-left">Kecamatan</label>
                            <div class="col-md-6">
                                <!-- select bootstrap -->
                                <select onchange="getVillage()" class="form-control" id="district" name="district">
                                </select>
                                @error('district')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- village -->
                        <div class="row mb-3">
                            <label for="village" class="col-md-4 float-left col-form-label text-md-left">Kelurahan</label>
                            <div class="col-md-6">
                                <!-- select bootstrap -->
                                <select class="form-control" id="village" name="village">
                                </select>
                                @error('village')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 float-left col-form-label text-md-left">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 float-left col-form-label text-md-left">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", async function() {
        getProvince = async function() {
            const response = await fetch('/api/province');
            const data = await response.json();
            const select = document.getElementById('province');
            data.forEach(element => {
                const option = document.createElement('option');
                option.value = element.id;
                option.innerHTML = element.name;
                select.appendChild(option);
            });
        }
        getRegency = async () => {
            const province = document.getElementById('province').value;
            const response = await fetch(`/api/regency/${province}`);
            const data = await response.json();
            const select = document.getElementById('regency');
            while (select.firstChild) {
                select.removeChild(select.firstChild);
            }
            data.forEach(element => {
                const option = document.createElement('option');
                option.value = element.id;
                option.innerHTML = element.name;
                select.appendChild(option);
            });
        }

        getDistrict = async () => {
            const regency = document.getElementById('regency').value;
            const response = await fetch(`/api/district/${regency}`);
            const data = await response.json();
            const select = document.getElementById('district');
            while (select.firstChild) {
                select.removeChild(select.firstChild);
            }
            data.forEach(element => {
                const option = document.createElement('option');
                option.value = element.id;
                option.innerHTML = element.name;
                select.appendChild(option);
            });
        }

        getVillage = async () => {
            const district = document.getElementById('district').value;
            const response = await fetch(`/api/village/${district}`);
            const data = await response.json();
            const select = document.getElementById('village');
            while (select.firstChild) {
                select.removeChild(select.firstChild);
            }
            data.forEach(element => {
                const option = document.createElement('option');
                option.value = element.id;
                option.innerHTML = element.name;
                select.appendChild(option);
            });
        }

        (async () => {
            getProvince();
        })();
    });
</script>
@endsection
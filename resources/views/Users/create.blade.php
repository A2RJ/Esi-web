@extends('layouts.dashboard')
@section('title', 'users')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New users</h4>
                <!-- <p class="card-description">
                    <a class="btn btn-primary" href="/anggota/users" title="Go back"> Batal </a>
                </p> -->

                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="/anggota/users/store" method="POST" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="user_role">User Role</label>
                            <select name="user_role" id="user_role" class="form-control">
                                <option value="player">Player</option>
                                <option value="management">Management</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="nama">Fullname</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="nama">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="email">
                        </div>

                        <!-- fb -->
                        <div class="form-group col-sm-6">
                            <label for="fb">Facebook</label>
                            <input type="text" class="form-control" name="fb" id="fb" placeholder="facebook">
                        </div>

                        <!-- ig -->
                        <div class="form-group col-sm-6">
                            <label for="ig">Instagram</label>
                            <input type="text" class="form-control" name="ig" id="ig" placeholder="instagram">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="password">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="kontak">Kontak</label>
                            <input type="text" class="form-control" name="kontak" id="kontak" placeholder="kontak">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="alamat">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="province">Provinsi</label>
                            <select onchange="getRegency()" class="form-control" id="province" name="province">
                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="regency">Kabupaten</label>
                            <select onchange="getDistrict()" class="form-control" id="regency" name="regency">
                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="district">Kecamatan</label>
                            <select onchange="getVillage()" class="form-control" id="district" name="district">
                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="village">Kelurahan</label>
                            <select class="form-control" id="village" name="village">
                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="gender">Gender</label>
                            <!-- select gender -->
                            <select class="form-control" id="gender" name="gender">
                                <option value="l">Laki-Laki</option>
                                <option value="p">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="user_image">User Image</label>
                            <input class="form-control" name="user_image" id="user_image" type="file">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="kartu_identitas">Kartu Identitas</label>
                            <input class="form-control" name="kartu_identitas" id="kartu_identitas" type="file">
                            <!-- text help -->
                            <br>
                            <p id="fileHelp" class="form-text text-danger">
                                <i>*Kartu identitas seperti KTP atau KK harus berformat .jpg, .jpeg, .png, .pdf</i>
                            </p>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
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
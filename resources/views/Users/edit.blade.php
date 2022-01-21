@extends('layouts.dashboard')
@section('title', 'users')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit profile</h4>
                <p class="card-description my-4">
                    <!-- if auth()->user()->id_user == $user->id_user -->
                    <?php if (auth()->user()->id_user == $user->id_user) { ?>
                        <a class="btn-sm btn-outline-success" target="_blank" href="/anggota/users/idcard" title="Download id card" > Download Id Card </a>
                    <?php } ?>
                </p>

                <!-- Check error froms session redirect -->
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

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

                <form action="/anggota/users/update/{{$user->id_user}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- @method('PUT') -->
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="user_role">Type Akun</label>
                            @if(auth()->user()->user_role == 'player' || auth()->user()->user_role == 'management')
                            <input class="form-control" name="user_role" id="user_role" type="text" placeholder="{{ $user->user_role }}" value="{{ $user->user_role }}" readonly>
                            @else
                            <select name="user_role" id="user_role" class="form-control">
                                <option value="player" {{$user->user_role == 'player' ? 'selected' : ''}}>Player</option>
                                <option value="management" {{$user->user_role == 'management' ? 'selected' : ''}}>Management</option>
                                <option value="admin" {{$user->user_role == 'admin' ? 'selected' : ''}}>Admin</option>
                            </select>
                            @endif
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="nama">Nama</label>
                            <input class="form-control" name="nama" id="nama" type="text" placeholder="{{ $user->nama }}" value="{{ $user->nama }}">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="email">Email</label>
                            <input class="form-control" name="email" id="email" type="text" placeholder="{{ $user->email }}" value="{{ $user->email }}">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="fb">Facebook</label>
                            <input class="form-control" name="fb" id="fb" type="text" placeholder="{{ $user->fb }}" value="{{ $user->fb }}">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="ig">Instagram</label>
                            <input class="form-control" name="ig" id="ig" type="text" placeholder="{{ $user->ig }}" value="{{ $user->ig }}">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="password">Password</label>
                            <input class="form-control" name="password2" id="password2" type="text" placeholder="Optional">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="kontak">Kontak</label>
                            <input class="form-control" name="kontak" id="kontak" type="text" placeholder="{{ $user->kontak }}" value="{{ $user->kontak }}">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="alamat">Alamat</label>
                            <input class="form-control" name="alamat" id="alamat" type="text" placeholder="{{ $user->alamat }}" value="{{ $user->alamat }}">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="province">Provinsi</label>
                            <select onclick="getRegency()" class="form-control" id="province" name="province">
                                <?php if ($province != null) : ?>
                                    <option value="<?= $province->id ?>"><?= $province->name ?></option>
                                <?php endif ?>
                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="regency">Kabupaten</label>
                            <select onclick="getDistrict()" class="form-control" id="regency" name="regency">
                                <?php if ($regency != null) : ?>
                                    <option value="<?= $regency->id ?>"><?= $regency->name ?></option>
                                <?php endif ?>
                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="district">Kecamatan</label>
                            <select onclick="getVillage()" class="form-control" id="district" name="district">
                                <?php if ($district != null) : ?>
                                    <option value="<?= $district->id ?>"><?= $district->name ?></option>
                                <?php endif ?>
                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="village">Kelurahan</label>
                            <select class="form-control" id="village" name="village">
                                <?php if ($village != null) : ?>
                                    <option value="<?= $village->id ?>"><?= $village->name ?></option>
                                <?php endif ?>
                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender" id="exampleFormControlSelect1">
                                <option value="p" {{$user->gender == 'p' ? 'selected' : ''}}>Perempuan</option>
                                <option value="l" {{$user->gender == 'l' ? 'selected' : ''}}>Laki-Laki</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="user_image">User Image</label>
                            <input class="form-control" name="user_image" id="user_image" type="file" accept="image/png, image/jpeg" placeholder="{{ $user->user_image }}" value="{{ $user->user_image }}">
                        </div>

                        <!-- kartu_identitas -->
                        <div class="form-group col-sm-6">
                            <label for="kartu_identitas">Kartu Identitas</label>
                            <input class="form-control" name="kartu_identitas" id="kartu_identitas" type="file"accept="image/png, image/jpeg, application/pdf" placeholder="{{ $user->kartu_identitas }}" value="{{ $user->kartu_identitas }}">
                            <!-- text help -->
                            <br>
                            <p id="fileHelp" class="form-text text-danger">
                                <i>*Kartu identitas seperti KTP atau KK harus berformat .jpg, .jpeg, .png, .pdf</i>
                            </p>
                        </div>
                    </div>

                    <div class="mt-2 col-md-12 text-center">
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
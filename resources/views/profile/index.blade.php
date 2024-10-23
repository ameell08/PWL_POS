@extends('layouts.template')
@section('content')
    <div class="container rounded bg-white border mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="p-3 py-3">
                    <h4 class="text-center">Edit Profil</h4>
                    <div class="d-flex flex-column align-items-center text-center p-3">
                        <img class="rounded-circle mt-3 mb-2" width="150px" src="{{ asset('profil.png') }}" alt="Profile Picture">
                        <h5>{{ $user->nama }}</h5>
                        <small class="text-muted">Ganti Foto Profil</small>
                        <input type="file" class="form-control-file mt-2" accept="image/*">
                    </div>
                </div>
                <div class="form-group">
                    <div class="card mt-4">
                        <div class="card-body">
                            <form method="POST" action="{{ route('profile.update', $user->user_id) }}">
                                @csrf
                                @method('PUT')
                                
                                <div class="form-group">
                                    <label for="nama"><i class="fa fa-user"></i> Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $user->nama }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="username"><i class="fa fa-user-circle"></i> Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="password"><i class="fa fa-lock"></i> Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password (minimal 6 karakter)">
                                </div>

                             
                            </form>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

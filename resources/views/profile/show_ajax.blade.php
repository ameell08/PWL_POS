<div class="profile-details">
        <div class="row mb-3">
            <div class="col-md-3">
                <strong>Nama</strong>
            </div>
            <div class="col-md-9">
                {{ $user->nama }}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3">
                <strong>Username</strong>
            </div>
            <div class="col-md-9">
                {{ $user->username }}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3">
                <strong>Level</strong>
            </div>
            <div class="col-md-9">
                {{ ucfirst($user->level) }}
            </div>
        </div>
    </div>

    {{-- resources/views/profile/edit_ajax.blade.php --}}
    <form id="profileForm" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="nama">Nama</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $user->nama }}"
                    required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <label for="username">Username</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}"
                    required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <label for="level">Level</label>
            </div>
            <div class="col-md-9">
                <select class="form-control" id="level" name="level" required>
                    {{-- @foreach ($level as $value => $label)
                    <option value="{{ $value }}" {{ $user->level == $value ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                @endforeach --}}
                    @foreach ($level as $l)
                        <option value="{{ $l->level_id }}">{{ $l->level_nama == $l ? 'selected' : '' }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <label for="password">Password</label>
            </div>
            <div class="col-md-9">
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Kosongkan jika tidak ingin mengubah password">
                <small class="text-muted">Minimal 6 karakter</small>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <label for="photo">Foto Profil</label>
            </div>
            <div class="col-md-9">
                <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-end">
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </div>
        </div>
    </form>

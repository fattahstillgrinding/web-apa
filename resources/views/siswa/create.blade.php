@extends('layouts.app')

@section('title', 'Tambah Siswa')

@section('content')

<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1><i class="bi bi-person-plus-fill" style="font-size:1.5rem;margin-right:8px;"></i>Tambah Siswa Baru</h1>
            <p>Isi formulir di bawah dengan data siswa yang lengkap dan benar.</p>
        </div>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
</div>

<div class="card">
    <form action="{{ route('siswa.store') }}" method="POST" id="createForm" novalidate>
        @csrf

        <div class="form-grid">

            {{-- Nama Lengkap --}}
            <div class="form-group">
                <label for="nama" class="form-label"><i class="bi bi-person"></i> Nama Lengkap <span style="color:var(--danger)">*</span></label>
                <input
                    type="text"
                    id="nama"
                    name="nama"
                    value="{{ old('nama') }}"
                    class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}"
                    placeholder="Masukkan nama lengkap..."
                    autocomplete="off">
                @error('nama')
                    <div class="invalid-feedback"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                @enderror
            </div>

            {{-- NIS --}}
            <div class="form-group">
                <label for="nis" class="form-label"><i class="bi bi-hash"></i> NIS <span style="color:var(--danger)">*</span></label>
                <input
                    type="text"
                    id="nis"
                    name="nis"
                    value="{{ old('nis') }}"
                    class="form-control {{ $errors->has('nis') ? 'is-invalid' : '' }}"
                    placeholder="Nomor Induk Siswa..."
                    autocomplete="off">
                @error('nis')
                    <div class="invalid-feedback"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                @enderror
            </div>

            {{-- Kelas --}}
            <div class="form-group">
                <label for="kelas" class="form-label"><i class="bi bi-door-open"></i> Kelas <span style="color:var(--danger)">*</span></label>
                <select id="kelas" name="kelas" class="form-control {{ $errors->has('kelas') ? 'is-invalid' : '' }}">
                    <option value="">-- Pilih Kelas --</option>
                    @foreach(['X IPA 1','X IPA 2','X IPS 1','X IPS 2','XI IPA 1','XI IPA 2','XI IPS 1','XI IPS 2','XII IPA 1','XII IPA 2','XII IPS 1','XII IPS 2'] as $k)
                        <option value="{{ $k }}" {{ old('kelas') === $k ? 'selected' : '' }}>{{ $k }}</option>
                    @endforeach
                </select>
                @error('kelas')
                    <div class="invalid-feedback"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                @enderror
            </div>

            {{-- Jenis Kelamin --}}
            <div class="form-group">
                <label for="jenis_kelamin" class="form-label"><i class="bi bi-gender-ambiguous"></i> Jenis Kelamin <span style="color:var(--danger)">*</span></label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control {{ $errors->has('jenis_kelamin') ? 'is-invalid' : '' }}">
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki"  {{ old('jenis_kelamin') === 'Laki-laki'  ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan"  {{ old('jenis_kelamin') === 'Perempuan'  ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <div class="invalid-feedback"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                @enderror
            </div>

            {{-- Tanggal Lahir --}}
            <div class="form-group">
                <label for="tanggal_lahir" class="form-label"><i class="bi bi-calendar3"></i> Tanggal Lahir <span style="color:var(--danger)">*</span></label>
                <input
                    type="date"
                    id="tanggal_lahir"
                    name="tanggal_lahir"
                    value="{{ old('tanggal_lahir') }}"
                    class="form-control {{ $errors->has('tanggal_lahir') ? 'is-invalid' : '' }}"
                    style="color-scheme:dark;">
                @error('tanggal_lahir')
                    <div class="invalid-feedback"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                @enderror
            </div>

            {{-- No HP --}}
            <div class="form-group">
                <label for="no_hp" class="form-label"><i class="bi bi-telephone"></i> No. HP</label>
                <input
                    type="text"
                    id="no_hp"
                    name="no_hp"
                    value="{{ old('no_hp') }}"
                    class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}"
                    placeholder="08xx-xxxx-xxxx">
                @error('no_hp')
                    <div class="invalid-feedback"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                @enderror
            </div>

            {{-- Email --}}
            <div class="form-group">
                <label for="email" class="form-label"><i class="bi bi-envelope"></i> Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                    placeholder="email@example.com">
                @error('email')
                    <div class="invalid-feedback"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                @enderror
            </div>

            {{-- Alamat (full width) --}}
            <div class="form-group full-width">
                <label for="alamat" class="form-label"><i class="bi bi-geo-alt"></i> Alamat <span style="color:var(--danger)">*</span></label>
                <textarea
                    id="alamat"
                    name="alamat"
                    class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}"
                    placeholder="Masukkan alamat lengkap...">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="divider"></div>

        <div style="display:flex;gap:10px;justify-content:flex-end;flex-wrap:wrap;">
            <a href="{{ route('siswa.index') }}" class="btn btn-secondary">
                <i class="bi bi-x-lg"></i> Batal
            </a>
            <button type="submit" class="btn btn-primary" id="submitBtn">
                <i class="bi bi-floppy2-fill"></i> Simpan Data
            </button>
        </div>
    </form>
</div>

<script>
document.getElementById('createForm').addEventListener('submit', function() {
    const btn = document.getElementById('submitBtn');
    btn.innerHTML = '<i class="bi bi-hourglass-split"></i> Menyimpan...';
    btn.disabled = true;
});
</script>

@endsection

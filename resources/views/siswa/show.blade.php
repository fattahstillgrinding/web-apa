@extends('layouts.app')

@section('title', 'Detail Siswa - ' . $siswa->nama)

@section('content')

<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1><i class="bi bi-person-badge-fill" style="font-size:1.5rem;margin-right:8px;"></i>Detail Siswa</h1>
            <p>Informasi lengkap data siswa terdaftar.</p>
        </div>
        <div style="display:flex;gap:8px;flex-wrap:wrap;">
            <a href="{{ route('siswa.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('siswa.edit', $siswa) }}" class="btn btn-success">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <button
                class="btn btn-danger"
                onclick="confirmDelete('{{ route('siswa.destroy', $siswa) }}', '{{ $siswa->nama }}')">
                <i class="bi bi-trash3"></i> Hapus
            </button>
        </div>
    </div>
</div>

{{-- Profile Card --}}
<div class="card" style="margin-bottom:1.5rem;">
    <div style="display:flex;align-items:center;gap:1.5rem;flex-wrap:wrap;">
        {{-- Avatar --}}
        <div style="
            width:80px;height:80px;border-radius:50%;
            background:linear-gradient(135deg,var(--primary),var(--secondary));
            display:flex;align-items:center;justify-content:center;
            font-size:2rem;font-weight:800;font-family:'Plus Jakarta Sans',sans-serif;
            color:#fff;flex-shrink:0;
            box-shadow:0 0 25px rgba(99,102,241,0.35);
        ">
            {{ mb_strtoupper(mb_substr($siswa->nama, 0, 1)) }}
        </div>
        <div>
            <h2 style="font-family:'Plus Jakarta Sans',sans-serif;font-size:1.4rem;font-weight:800;margin-bottom:6px;">
                {{ $siswa->nama }}
            </h2>
            <div style="display:flex;gap:8px;flex-wrap:wrap;align-items:center;">
                <span class="badge badge-blue"><i class="bi bi-hash"></i> {{ $siswa->nis }}</span>
                <span class="badge badge-green"><i class="bi bi-door-open"></i> {{ $siswa->kelas }}</span>
                @if($siswa->jenis_kelamin === 'Laki-laki')
                    <span class="badge badge-blue"><i class="bi bi-gender-male"></i> Laki-laki</span>
                @else
                    <span class="badge badge-pink"><i class="bi bi-gender-female"></i> Perempuan</span>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- Info Grid --}}
<div class="card">
    <div class="info-grid">

        <div class="info-item">
            <span class="info-label"><i class="bi bi-calendar3"></i> Tanggal Lahir</span>
            <span class="info-value">{{ $siswa->tanggal_lahir->translatedFormat('d F Y') }}</span>
        </div>

        <div class="info-item">
            <span class="info-label"><i class="bi bi-calculator"></i> Usia</span>
            <span class="info-value">{{ $siswa->tanggal_lahir->age }} tahun</span>
        </div>

        <div class="info-item">
            <span class="info-label"><i class="bi bi-telephone"></i> No. HP</span>
            <span class="info-value">{{ $siswa->no_hp ?? '—' }}</span>
        </div>

        <div class="info-item">
            <span class="info-label"><i class="bi bi-envelope"></i> Email</span>
            <span class="info-value">
                @if($siswa->email)
                    <a href="mailto:{{ $siswa->email }}" style="color:var(--primary-light);">{{ $siswa->email }}</a>
                @else
                    —
                @endif
            </span>
        </div>

        <div class="info-item full-width">
            <span class="info-label"><i class="bi bi-geo-alt"></i> Alamat</span>
            <span class="info-value">{{ $siswa->alamat }}</span>
        </div>

        <div class="info-item">
            <span class="info-label"><i class="bi bi-clock-history"></i> Ditambahkan</span>
            <span class="info-value">{{ $siswa->created_at->format('d M Y, H:i') }}</span>
        </div>

        <div class="info-item">
            <span class="info-label"><i class="bi bi-pencil-square"></i> Terakhir Diperbarui</span>
            <span class="info-value">{{ $siswa->updated_at->format('d M Y, H:i') }}</span>
        </div>

    </div>
</div>

@endsection

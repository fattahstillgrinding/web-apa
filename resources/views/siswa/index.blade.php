@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')

{{-- PAGE HEADER + STATS --}}
<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1><i class="bi bi-people-fill" style="font-size:1.6rem;margin-right:8px;"></i>Data Siswa</h1>
            <p>Kelola data siswa terdaftar di sistem.</p>
        </div>
        <a href="{{ route('siswa.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Tambah Siswa
        </a>
    </div>
</div>

{{-- STATS CARDS --}}
<div class="stats-row">
    @php
        $total = \App\Models\Siswa::count();
        $laki  = \App\Models\Siswa::where('jenis_kelamin','Laki-laki')->count();
        $perempuan = \App\Models\Siswa::where('jenis_kelamin','Perempuan')->count();
        $kelas = \App\Models\Siswa::distinct('kelas')->count('kelas');
    @endphp
    <div class="stat-card">
        <div class="stat-icon stat-icon-purple"><i class="bi bi-people"></i></div>
        <div class="stat-info">
            <span class="stat-value">{{ $total }}</span>
            <span class="stat-label">Total Siswa</span>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon stat-icon-blue"><i class="bi bi-gender-male"></i></div>
        <div class="stat-info">
            <span class="stat-value">{{ $laki }}</span>
            <span class="stat-label">Laki-laki</span>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon stat-icon-pink"><i class="bi bi-gender-female"></i></div>
        <div class="stat-info">
            <span class="stat-value">{{ $perempuan }}</span>
            <span class="stat-label">Perempuan</span>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon stat-icon-green"><i class="bi bi-door-open"></i></div>
        <div class="stat-info">
            <span class="stat-value">{{ $kelas }}</span>
            <span class="stat-label">Kelas</span>
        </div>
    </div>
</div>

{{-- SEARCH --}}
<div class="card" style="margin-bottom:1.5rem;">
    <form method="GET" action="{{ route('siswa.index') }}" class="search-bar">
        <div class="search-input-wrap" style="flex:1;min-width:200px;">
            <i class="bi bi-search"></i>
            <input
                type="text"
                id="search"
                name="search"
                value="{{ $search }}"
                class="form-control"
                placeholder="Cari nama, NIS, atau kelas...">
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-search"></i> Cari
        </button>
        @if($search)
            <a href="{{ route('siswa.index') }}" class="btn btn-secondary">
                <i class="bi bi-x-circle"></i> Reset
            </a>
        @endif
    </form>
</div>

{{-- TABLE --}}
@if($siswas->count() > 0)
<div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Siswa</th>
                <th>NIS</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
                <th>No. HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswas as $i => $siswa)
            <tr>
                <td style="color:var(--text-muted);font-size:0.82rem;">{{ ($siswas->currentPage() - 1) * $siswas->perPage() + $i + 1 }}</td>
                <td>
                    <div style="font-weight:600;">{{ $siswa->nama }}</div>
                    @if($siswa->email)
                        <div style="font-size:0.8rem;color:var(--text-muted);">{{ $siswa->email }}</div>
                    @endif
                </td>
                <td>
                    <span class="badge badge-blue">{{ $siswa->nis }}</span>
                </td>
                <td>
                    <span class="badge badge-green"><i class="bi bi-door-open"></i>{{ $siswa->kelas }}</span>
                </td>
                <td>
                    @if($siswa->jenis_kelamin === 'Laki-laki')
                        <span class="badge badge-blue"><i class="bi bi-gender-male"></i> Laki-laki</span>
                    @else
                        <span class="badge badge-pink"><i class="bi bi-gender-female"></i> Perempuan</span>
                    @endif
                </td>
                <td style="color:var(--text-secondary);">{{ $siswa->no_hp ?? '-' }}</td>
                <td>
                    <div style="display:flex;gap:6px;flex-wrap:wrap;">
                        <a href="{{ route('siswa.show', $siswa) }}" class="btn btn-sm btn-secondary">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('siswa.edit', $siswa) }}" class="btn btn-sm btn-success">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <button
                            class="btn btn-sm btn-danger"
                            onclick="confirmDelete('{{ route('siswa.destroy', $siswa) }}', '{{ $siswa->nama }}')">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="pagination-wrap">
    <div style="font-size:0.85rem;color:var(--text-muted);">
        Menampilkan {{ $siswas->firstItem() }}–{{ $siswas->lastItem() }} dari {{ $siswas->total() }} siswa
    </div>
    {{ $siswas->links() }}
</div>

@else
<div class="card">
    <div class="empty-state">
        <div class="empty-icon"><i class="bi bi-person-x"></i></div>
        <h2 style="font-family:'Plus Jakarta Sans',sans-serif;font-size:1.2rem;margin-bottom:8px;">
            {{ $search ? 'Tidak ada hasil pencarian' : 'Belum Ada Data Siswa' }}
        </h2>
        <p>
            {{ $search ? "Tidak ditemukan siswa dengan kata kunci \"$search\"." : 'Klik tombol di bawah untuk menambahkan data siswa pertama.' }}
        </p>
        @if($search)
            <a href="{{ route('siswa.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        @else
            <a href="{{ route('siswa.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Siswa Pertama
            </a>
        @endif
    </div>
</div>
@endif

@endsection

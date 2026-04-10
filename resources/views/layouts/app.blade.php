<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Input Data Siswa') | Sistem Data Siswa</title>
    <meta name="description" content="Sistem manajemen data siswa sederhana berbasis Laravel dan MySQL">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* ============================================================
           DESIGN TOKENS & ROOT VARIABLES
        ============================================================ */
        :root {
            --primary:       #6366f1;
            --primary-dark:  #4f46e5;
            --primary-light: #818cf8;
            --secondary:     #8b5cf6;
            --accent:        #06b6d4;
            --success:       #10b981;
            --danger:        #ef4444;
            --warning:       #f59e0b;
            --info:          #3b82f6;

            --bg-base:       #0f0f1a;
            --bg-card:       #1a1a2e;
            --bg-card2:      #16213e;
            --bg-input:      #0d0d1b;
            --border:        rgba(99,102,241,0.2);
            --border-hover:  rgba(99,102,241,0.5);

            --text-primary:  #e2e8f0;
            --text-secondary:#94a3b8;
            --text-muted:    #64748b;

            --shadow-glow:   0 0 30px rgba(99,102,241,0.15);
            --shadow-card:   0 4px 24px rgba(0,0,0,0.4);
            --radius:        14px;
            --radius-sm:     8px;
            --radius-lg:     20px;

            --transition:    all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* ============================================================
           BASE RESET
        ============================================================ */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-base);
            color: var(--text-primary);
            min-height: 100vh;
            background-image:
                radial-gradient(ellipse at 20% 0%, rgba(99,102,241,0.12) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 100%, rgba(139,92,246,0.1) 0%, transparent 50%);
        }

        a { color: var(--primary-light); text-decoration: none; transition: var(--transition); }
        a:hover { color: var(--primary); }

        /* ============================================================
           NAVBAR
        ============================================================ */
        .navbar {
            background: rgba(26,26,46,0.85);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 0 2rem;
        }

        .navbar-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 1.2rem;
            color: var(--text-primary);
        }

        .brand-icon {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            box-shadow: 0 0 15px rgba(99,102,241,0.4);
        }

        .nav-links {
            display: flex;
            gap: 8px;
            list-style: none;
        }

        .nav-links a {
            color: var(--text-secondary);
            padding: 8px 16px;
            border-radius: var(--radius-sm);
            font-size: 0.9rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: var(--transition);
        }

        .nav-links a:hover,
        .nav-links a.active {
            background: rgba(99,102,241,0.15);
            color: var(--primary-light);
        }

        /* ============================================================
           MAIN CONTAINER
        ============================================================ */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 2rem 4rem;
        }

        /* ============================================================
           PAGE HEADER
        ============================================================ */
        .page-header {
            margin-bottom: 2rem;
        }

        .page-header h1 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #e2e8f0 0%, var(--primary-light) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .page-header p {
            color: var(--text-secondary);
            margin-top: 4px;
            font-size: 0.95rem;
        }

        .page-header-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }

        /* ============================================================
           BUTTONS
        ============================================================ */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: var(--radius-sm);
            font-size: 0.9rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            font-family: 'Inter', sans-serif;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: #fff;
            box-shadow: 0 4px 15px rgba(99,102,241,0.35);
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(99,102,241,0.45);
            color: #fff;
        }

        .btn-secondary {
            background: rgba(99,102,241,0.12);
            color: var(--primary-light);
            border: 1px solid var(--border);
        }
        .btn-secondary:hover {
            background: rgba(99,102,241,0.22);
            border-color: var(--border-hover);
            color: var(--primary-light);
        }

        .btn-danger {
            background: rgba(239,68,68,0.15);
            color: #fca5a5;
            border: 1px solid rgba(239,68,68,0.3);
        }
        .btn-danger:hover {
            background: rgba(239,68,68,0.25);
            border-color: rgba(239,68,68,0.5);
            color: #fca5a5;
        }

        .btn-success {
            background: rgba(16,185,129,0.15);
            color: #6ee7b7;
            border: 1px solid rgba(16,185,129,0.3);
        }
        .btn-success:hover {
            background: rgba(16,185,129,0.25);
            transform: translateY(-1px);
            color: #6ee7b7;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 0.82rem;
        }

        /* ============================================================
           CARD
        ============================================================ */
        .card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow-card);
            padding: 1.75rem;
            transition: var(--transition);
        }

        .card:hover { border-color: var(--border-hover); }

        /* ============================================================
           ALERTS / FLASH MESSAGES
        ============================================================ */
        .alert {
            padding: 14px 18px;
            border-radius: var(--radius-sm);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
            font-weight: 500;
            animation: slideDown 0.4s ease;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .alert-success {
            background: rgba(16,185,129,0.12);
            border: 1px solid rgba(16,185,129,0.3);
            color: #6ee7b7;
        }

        .alert-danger {
            background: rgba(239,68,68,0.12);
            border: 1px solid rgba(239,68,68,0.3);
            color: #fca5a5;
        }

        /* ============================================================
           FORM STYLES
        ============================================================ */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .form-control {
            background: var(--bg-input);
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            color: var(--text-primary);
            padding: 11px 14px;
            font-size: 0.95rem;
            font-family: 'Inter', sans-serif;
            transition: var(--transition);
            outline: none;
            width: 100%;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99,102,241,0.15);
        }

        .form-control.is-invalid {
            border-color: var(--danger);
            box-shadow: 0 0 0 3px rgba(239,68,68,0.12);
        }

        .form-control option { background: #1a1a2e; }

        textarea.form-control { resize: vertical; min-height: 90px; }

        .invalid-feedback {
            font-size: 0.8rem;
            color: #fca5a5;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* ============================================================
           TABLE
        ============================================================ */
        .table-wrapper {
            overflow-x: auto;
            border-radius: var(--radius);
            border: 1px solid var(--border);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }

        thead th {
            background: rgba(99,102,241,0.1);
            padding: 14px 16px;
            text-align: left;
            font-size: 0.78rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--text-secondary);
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        tbody tr {
            border-bottom: 1px solid rgba(99,102,241,0.08);
            transition: var(--transition);
        }

        tbody tr:last-child { border-bottom: none; }

        tbody tr:hover { background: rgba(99,102,241,0.05); }

        tbody td {
            padding: 13px 16px;
            color: var(--text-primary);
            vertical-align: middle;
        }

        /* ============================================================
           BADGE
        ============================================================ */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 0.78rem;
            font-weight: 600;
        }

        .badge-blue  { background: rgba(59,130,246,0.15); color: #93c5fd; border: 1px solid rgba(59,130,246,0.25); }
        .badge-pink  { background: rgba(236,72,153,0.15); color: #f9a8d4; border: 1px solid rgba(236,72,153,0.25); }
        .badge-green { background: rgba(16,185,129,0.15); color: #6ee7b7; border: 1px solid rgba(16,185,129,0.25); }

        /* ============================================================
           SEARCH BAR
        ============================================================ */
        .search-bar {
            display: flex;
            gap: 10px;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .search-input-wrap {
            position: relative;
            flex: 1;
            min-width: 220px;
        }

        .search-input-wrap i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 1rem;
        }

        .search-input-wrap .form-control {
            padding-left: 38px;
        }

        /* ============================================================
           PAGINATION (Laravel default compat)
        ============================================================ */
        .pagination-wrap {
            margin-top: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .pagination-wrap nav { display: flex; gap: 4px; }

        .pagination-wrap span,
        .pagination-wrap a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            height: 36px;
            padding: 0 10px;
            border-radius: var(--radius-sm);
            font-size: 0.85rem;
            font-weight: 500;
            border: 1px solid var(--border);
            color: var(--text-secondary);
            background: var(--bg-card);
            transition: var(--transition);
        }

        .pagination-wrap a:hover {
            border-color: var(--primary);
            color: var(--primary-light);
            background: rgba(99,102,241,0.1);
        }

        .pagination-wrap [aria-current="page"] > span {
            background: var(--primary);
            border-color: var(--primary);
            color: #fff;
        }

        /* ============================================================
           INFO GRID (detail view)
        ============================================================ */
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
        }

        .info-item { display: flex; flex-direction: column; gap: 4px; }
        .info-label {
            font-size: 0.78rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--text-muted);
        }
        .info-value {
            font-size: 0.97rem;
            color: var(--text-primary);
            font-weight: 500;
        }

        .info-item.full-width { grid-column: 1 / -1; }

        /* ============================================================
           STATS CARD
        ============================================================ */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: var(--transition);
        }

        .stat-card:hover {
            border-color: var(--border-hover);
            transform: translateY(-2px);
            box-shadow: var(--shadow-glow);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .stat-icon-purple { background: rgba(99,102,241,0.15); color: var(--primary-light); }
        .stat-icon-blue   { background: rgba(6,182,212,0.15);  color: #67e8f9; }
        .stat-icon-green  { background: rgba(16,185,129,0.15); color: #6ee7b7; }
        .stat-icon-pink   { background: rgba(236,72,153,0.15); color: #f9a8d4; }

        .stat-info { display: flex; flex-direction: column; }
        .stat-value {
            font-size: 1.6rem;
            font-weight: 800;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-primary);
            line-height: 1;
        }
        .stat-label {
            font-size: 0.8rem;
            color: var(--text-muted);
            margin-top: 3px;
        }

        /* ============================================================
           EMPTY STATE
        ============================================================ */
        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
        }

        .empty-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--text-muted);
        }

        .empty-state p {
            color: var(--text-secondary);
            margin-bottom: 1.5rem;
        }

        /* ============================================================
           DIVIDER
        ============================================================ */
        .divider {
            height: 1px;
            background: var(--border);
            margin: 1.5rem 0;
        }

        /* ============================================================
           CONFIRM MODAL (vanilla JS)
        ============================================================ */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.7);
            backdrop-filter: blur(8px);
            z-index: 9000;
            display: none;
            align-items: center;
            justify-content: center;
        }
        .modal-overlay.open { display: flex; }

        .modal-box {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 2rem;
            max-width: 420px;
            width: 90%;
            box-shadow: 0 20px 60px rgba(0,0,0,0.5);
            animation: modalIn 0.3s ease;
        }

        @keyframes modalIn {
            from { opacity: 0; transform: scale(0.9) translateY(20px); }
            to   { opacity: 1; transform: scale(1)   translateY(0); }
        }

        .modal-icon {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: rgba(239,68,68,0.15);
            border: 1px solid rgba(239,68,68,0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #fca5a5;
            margin-bottom: 1rem;
        }

        .modal-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 6px;
        }

        .modal-desc {
            font-size: 0.9rem;
            color: var(--text-secondary);
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .modal-actions { display: flex; gap: 10px; justify-content: flex-end; }

        /* ============================================================
           RESPONSIVE
        ============================================================ */
        @media (max-width: 768px) {
            .container { padding: 1.25rem 1rem 3rem; }
            .form-grid { grid-template-columns: 1fr; }
            .info-grid { grid-template-columns: 1fr; }
            .page-header-row { flex-direction: column; }
            .navbar { padding: 0 1rem; }
        }
    </style>
</head>
<body>

{{-- NAVBAR --}}
<nav class="navbar">
    <div class="navbar-inner">
        <a href="{{ route('siswa.index') }}" class="brand">
            <div class="brand-icon">
                <i class="bi bi-mortarboard-fill"></i>
            </div>
            Sistem Data Siswa
        </a>
        <ul class="nav-links">
            <li>
                <a href="{{ route('siswa.index') }}" class="{{ request()->routeIs('siswa.index') ? 'active' : '' }}">
                    <i class="bi bi-people-fill"></i> Data Siswa
                </a>
            </li>
            <li>
                <a href="{{ route('siswa.create') }}" class="{{ request()->routeIs('siswa.create') ? 'active' : '' }}">
                    <i class="bi bi-plus-circle-fill"></i> Tambah Siswa
                </a>
            </li>
            <li style="margin-left: 1rem; border-left: 1px solid var(--border); padding-left: 1rem; display: flex; align-items: center; gap: 10px;">
                <div style="display: flex; align-items: center; gap: 8px;">
                    <div style="width: 32px; height: 32px; border-radius: 50%; background: var(--primary-light); color: #fff; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 0.9rem;">
                        {{ mb_strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div style="display: flex; flex-direction: column;">
                        <span style="font-size: 0.85rem; font-weight: 600; color: var(--text-primary); line-height: 1;">{{ Auth::user()->name }}</span>
                        <span style="font-size: 0.7rem; color: var(--text-muted);">Admin</span>
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger" style="padding: 6px 10px; font-size: 0.8rem;" title="Logout">
                        <i class="bi bi-box-arrow-right"></i>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>

{{-- CONTENT --}}
<main class="container">
    @if(session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle-fill"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            <i class="bi bi-exclamation-circle-fill"></i>
            {{ session('error') }}
        </div>
    @endif

    @yield('content')
</main>

{{-- DELETE CONFIRM MODAL --}}
<div class="modal-overlay" id="deleteModal">
    <div class="modal-box">
        <div class="modal-icon"><i class="bi bi-trash3-fill"></i></div>
        <div class="modal-title">Hapus Data Siswa?</div>
        <p class="modal-desc">Data siswa <strong id="deleteName" style="color:var(--text-primary)"></strong> akan dihapus secara permanen dan tidak bisa dikembalikan.</p>
        <div class="modal-actions">
            <button class="btn btn-secondary" onclick="closeDeleteModal()">Batal</button>
            <form id="deleteForm" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i> Hapus</button>
            </form>
        </div>
    </div>
</div>

<script>
    function confirmDelete(url, name) {
        document.getElementById('deleteForm').action = url;
        document.getElementById('deleteName').textContent = name;
        document.getElementById('deleteModal').classList.add('open');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.remove('open');
    }

    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) closeDeleteModal();
    });

    // Auto-hide alerts
    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(a => {
            a.style.transition = 'opacity 0.5s';
            a.style.opacity = '0';
            setTimeout(() => a.remove(), 500);
        });
    }, 4000);
</script>

</body>
</html>

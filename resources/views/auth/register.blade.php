<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar | Sistem Data Siswa</title>
    <meta name="description" content="Daftar ke Sistem Data Siswa">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --primary-light: #818cf8;
            --secondary: #8b5cf6;
            --danger: #ef4444;
            --success: #10b981;
            --bg-base: #0f0f1a;
            --bg-card: #1a1a2e;
            --bg-input: #0d0d1b;
            --border: rgba(99, 102, 241, 0.2);
            --border-hover: rgba(99, 102, 241, 0.5);
            --text-primary: #e2e8f0;
            --text-secondary: #94a3b8;
            --text-muted: #64748b;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-base);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
            padding: 2rem 0;
        }

        /* ── Animated background ── */
        .bg-glow {
            position: fixed;
            inset: 0;
            z-index: 0;
            pointer-events: none;
        }

        .glow-1 {
            position: absolute;
            top: -20%;
            left: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.18) 0%, transparent 70%);
            animation: floatGlow 8s ease-in-out infinite alternate;
        }

        .glow-2 {
            position: absolute;
            bottom: -20%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(139, 92, 246, 0.14) 0%, transparent 70%);
            animation: floatGlow 10s ease-in-out infinite alternate-reverse;
        }

        .glow-3 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(6, 182, 212, 0.05) 0%, transparent 60%);
            animation: pulse 6s ease-in-out infinite;
        }

        @keyframes floatGlow {
            from {
                transform: scale(1) translate(0, 0);
            }

            to {
                transform: scale(1.1) translate(20px, 20px);
            }
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 0.5;
            }

            50% {
                opacity: 1;
            }
        }

        /* Grid dots pattern */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: radial-gradient(circle, rgba(99, 102, 241, 0.08) 1px, transparent 1px);
            background-size: 40px 40px;
            z-index: 0;
            pointer-events: none;
        }

        /* ── Card ── */
        .login-wrapper {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 480px;
            padding: 1rem;
        }

        .login-card {
            background: rgba(26, 26, 46, 0.85);
            backdrop-filter: blur(24px);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow:
                0 8px 40px rgba(0, 0, 0, 0.5),
                0 0 0 1px rgba(99, 102, 241, 0.05) inset;
            animation: cardIn 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        @keyframes cardIn {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.97);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* ── Brand ── */
        .brand {
            text-align: center;
            margin-bottom: 2rem;
        }

        .brand-logo {
            width: 64px;
            height: 64px;
            border-radius: 18px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin: 0 auto 1rem;
            box-shadow:
                0 0 30px rgba(99, 102, 241, 0.4),
                0 8px 20px rgba(0, 0, 0, 0.3);
            animation: logoPulse 3s ease-in-out infinite;
        }

        @keyframes logoPulse {

            0%,
            100% {
                box-shadow: 0 0 30px rgba(99, 102, 241, 0.4), 0 8px 20px rgba(0, 0, 0, 0.3);
            }

            50% {
                box-shadow: 0 0 50px rgba(99, 102, 241, 0.6), 0 8px 20px rgba(0, 0, 0, 0.3);
            }
        }

        .brand h1 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 1.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #e2e8f0 0%, var(--primary-light) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 4px;
        }

        .brand p {
            font-size: 0.88rem;
            color: var(--text-muted);
        }

        /* ── Alert ── */
        .alert {
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.88rem;
            font-weight: 500;
            animation: slideDown 0.4s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #fca5a5;
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: #6ee7b7;
        }

        /* ── Form ── */
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: 1.1rem;
        }

        .form-label {
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .input-wrap {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 1rem;
            pointer-events: none;
            transition: color 0.3s;
        }

        .form-control {
            background: var(--bg-input);
            border: 1px solid var(--border);
            border-radius: 10px;
            color: var(--text-primary);
            padding: 12px 14px 12px 40px;
            font-size: 0.95rem;
            font-family: 'Inter', sans-serif;
            width: 100%;
            outline: none;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15);
        }

        .form-control:focus+.input-icon-right,
        .form-control:focus~.input-icon {
            color: var(--primary-light);
        }

        .form-control.is-invalid {
            border-color: var(--danger);
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
        }

        .invalid-feedback {
            font-size: 0.8rem;
            color: #fca5a5;
            display: flex;
            align-items: center;
            gap: 4px;
            margin-top: 4px;
        }

        /* Toggle password */
        .input-wrap-pw {
            position: relative;
        }

        .input-pw {
            padding-right: 44px;
        }

        .toggle-pass {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-muted);
            font-size: 1rem;
            transition: color 0.3s;
            padding: 0;
            display: flex;
        }

        .toggle-pass:hover {
            color: var(--primary-light);
        }

        /* Submit button */
        .btn-login {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 0.97rem;
            font-weight: 700;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 20px rgba(99, 102, 241, 0.35);
            letter-spacing: 0.02em;
            margin-top: 1rem;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(99, 102, 241, 0.5);
        }

        .btn-login:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        /* Divider */
        .divider {
            text-align: center;
            margin: 1.5rem 0;
            position: relative;
            color: var(--text-muted);
            font-size: 0.8rem;
        }

        .divider::before,
        .divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 40%;
            height: 1px;
            background: var(--border);
        }

        .divider::before {
            left: 0;
        }

        .divider::after {
            right: 0;
        }
    </style>
</head>

<body>

    {{-- Animated background --}}
    <div class="bg-glow">
        <div class="glow-1"></div>
        <div class="glow-2"></div>
        <div class="glow-3"></div>
    </div>

    <div class="login-wrapper">
        <div class="login-card">

            {{-- Brand --}}
            <div class="brand">
                <div class="brand-logo">
                    <i class="bi bi-person-plus-fill"></i>
                </div>
                <h1>Daftar Akun</h1>
                <p>Silakan buat akun baru Anda</p>
            </div>

            {{-- Form Registrasi --}}
            <form id="registerForm" action="{{ route('register.post') }}" method="POST" novalidate>
                @csrf

                {{-- Nama Lengkap --}}
                <div class="form-group">
                    <label for="name" class="form-label"><i class="bi bi-person"></i> Nama Lengkap</label>
                    <div class="input-wrap">
                        <i class="bi bi-person input-icon"></i>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Username"
                            autocomplete="name" autofocus>
                    </div>
                    @error('name')
                        <div class="invalid-feedback"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="form-group">
                    <label for="email" class="form-label"><i class="bi bi-envelope"></i> Email</label>
                    <div class="input-wrap">
                        <i class="bi bi-envelope input-icon"></i>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                            placeholder="your@gmail.com" autocomplete="email">
                    </div>
                    @error('email')
                        <div class="invalid-feedback"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="form-group">
                    <label for="password" class="form-label"><i class="bi bi-lock"></i> Password</label>
                    <div class="input-wrap input-wrap-pw">
                        <i class="bi bi-lock input-icon"></i>
                        <input type="password" id="password" name="password"
                            class="form-control input-pw {{ $errors->has('password') ? 'is-invalid' : '' }}"
                            placeholder="••••••••" autocomplete="new-password">
                        <button type="button" class="toggle-pass" onclick="togglePassword('password', 'eyeIcon1')"
                            tabindex="-1">
                            <i class="bi bi-eye" id="eyeIcon1"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="invalid-feedback"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                {{-- Konfirmasi Password --}}
                <div class="form-group">
                    <label for="password_confirmation" class="form-label"><i class="bi bi-shield-check"></i> Ulangi
                        Password</label>
                    <div class="input-wrap input-wrap-pw">
                        <i class="bi bi-shield-check input-icon"></i>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="form-control input-pw" placeholder="••••••••" autocomplete="new-password">
                        <button type="button" class="toggle-pass"
                            onclick="togglePassword('password_confirmation', 'eyeIcon2')" tabindex="-1">
                            <i class="bi bi-eye" id="eyeIcon2"></i>
                        </button>
                    </div>
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn-login" id="registerBtn">
                    <i class="bi bi-person-plus-fill"></i>
                    Daftar Sekarang
                </button>

                <div class="divider">atau</div>

                <div style="text-align: center; margin-top: 1rem;">
                    <span style="color: var(--text-muted); font-size: 0.9rem;">Sudah punya akun? </span>
                    <a href="{{ route('login') }}"
                        style="color: var(--primary-light); text-decoration: none; font-weight: 600; font-size: 0.9rem; transition: color 0.3s;">Masuk</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Toggle show/hide password
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);

            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'bi bi-eye-slash';
            } else {
                input.type = 'password';
                icon.className = 'bi bi-eye';
            }
        }

        // Loading state on submit
        document.getElementById('registerForm').addEventListener('submit', function () {
            const btn = document.getElementById('registerBtn');
            btn.innerHTML = '<i class="bi bi-hourglass-split"></i> Mendaftar...';
            btn.disabled = true;
        });
    </script>
</body>

</html>
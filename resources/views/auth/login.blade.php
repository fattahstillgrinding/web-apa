<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Sistem Data Siswa</title>
    <meta name="description" content="Login ke Sistem Data Siswa">

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
            overflow: hidden;
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
            max-width: 440px;
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

        /* Remember me */
        .remember-row {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 1.5rem;
        }

        .remember-row input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: var(--primary);
            cursor: pointer;
        }

        .remember-row label {
            font-size: 0.88rem;
            color: var(--text-secondary);
            cursor: pointer;
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
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(99, 102, 241, 0.5);
        }

        .btn-login:active {
            transform: translateY(0);
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

        /* Hint box */
        .hint-box {
            background: rgba(99, 102, 241, 0.08);
            border: 1px solid rgba(99, 102, 241, 0.2);
            border-radius: 10px;
            padding: 12px 14px;
            margin-top: 1.25rem;
        }

        .hint-box-title {
            font-size: 0.78rem;
            font-weight: 700;
            color: var(--primary-light);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .hint-box p {
            font-size: 0.83rem;
            color: var(--text-secondary);
            line-height: 1.6;
        }

        .hint-box code {
            background: rgba(99, 102, 241, 0.15);
            padding: 1px 6px;
            border-radius: 4px;
            color: var(--primary-light);
            font-size: 0.82rem;
        }
        /* ── Fullscreen Overlay Loader ── */
        #loading-overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 15, 26, 0.85); /* Matches --bg-base with opacity */
            backdrop-filter: blur(8px);
            z-index: 9999;
            display: none; /* hidden by default */
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        #loading-overlay.active {
            display: flex;
        }

        /* From Uiverse.io by mobinkakei */
        #wifi-loader {
            --background: #62abff;
            --front-color: var(--primary);
            --back-color: rgba(99, 102, 241, 0.2);
            --text-color: var(--text-primary);
            width: 64px;
            height: 64px;
            border-radius: 50px;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #wifi-loader svg {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #wifi-loader svg circle {
            position: absolute;
            fill: none;
            stroke-width: 6px;
            stroke-linecap: round;
            stroke-linejoin: round;
            transform: rotate(-100deg);
            transform-origin: center;
        }

        #wifi-loader svg circle.back {
            stroke: var(--back-color);
        }

        #wifi-loader svg circle.front {
            stroke: var(--front-color);
        }

        #wifi-loader svg.circle-outer {
            height: 86px;
            width: 86px;
        }

        #wifi-loader svg.circle-outer circle {
            stroke-dasharray: 62.75 188.25;
        }

        #wifi-loader svg.circle-outer circle.back {
            animation: circle-outer135 1.8s ease infinite 0.3s;
        }

        #wifi-loader svg.circle-outer circle.front {
            animation: circle-outer135 1.8s ease infinite 0.15s;
        }

        #wifi-loader svg.circle-middle {
            height: 60px;
            width: 60px;
        }

        #wifi-loader svg.circle-middle circle {
            stroke-dasharray: 42.5 127.5;
        }

        #wifi-loader svg.circle-middle circle.back {
            animation: circle-middle6123 1.8s ease infinite 0.25s;
        }

        #wifi-loader svg.circle-middle circle.front {
            animation: circle-middle6123 1.8s ease infinite 0.1s;
        }

        #wifi-loader svg.circle-inner {
            height: 34px;
            width: 34px;
        }

        #wifi-loader svg.circle-inner circle {
            stroke-dasharray: 22 66;
        }

        #wifi-loader svg.circle-inner circle.back {
            animation: circle-inner162 1.8s ease infinite 0.2s;
        }

        #wifi-loader svg.circle-inner circle.front {
            animation: circle-inner162 1.8s ease infinite 0.05s;
        }

        #wifi-loader .text {
            position: absolute;
            bottom: -40px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-transform: capitalize;
            font-weight: 500;
            font-size: 14px;
            letter-spacing: 0.2px;
        }

        #wifi-loader .text::before,
        #wifi-loader .text::after {
            content: attr(data-text);
        }

        #wifi-loader .text::before {
            color: var(--text-color);
        }

        #wifi-loader .text::after {
            color: var(--front-color);
            animation: text-animation76 3.6s ease infinite;
            position: absolute;
            left: 0;
        }

        @keyframes circle-outer135 {
            0% { stroke-dashoffset: 25; }
            25% { stroke-dashoffset: 0; }
            65% { stroke-dashoffset: 301; }
            80% { stroke-dashoffset: 276; }
            100% { stroke-dashoffset: 276; }
        }

        @keyframes circle-middle6123 {
            0% { stroke-dashoffset: 17; }
            25% { stroke-dashoffset: 0; }
            65% { stroke-dashoffset: 204; }
            80% { stroke-dashoffset: 187; }
            100% { stroke-dashoffset: 187; }
        }

        @keyframes circle-inner162 {
            0% { stroke-dashoffset: 9; }
            25% { stroke-dashoffset: 0; }
            65% { stroke-dashoffset: 106; }
            80% { stroke-dashoffset: 97; }
            100% { stroke-dashoffset: 97; }
        }

        @keyframes text-animation76 {
            0% { clip-path: inset(0 100% 0 0); }
            50% { clip-path: inset(0); }
            100% { clip-path: inset(0 0 0 100%); }
        }
    </style>
</head>

<body>

    <!-- Loading Overlay -->
    <div id="loading-overlay">
        <div id="wifi-loader">
            <svg class="circle-outer" viewBox="0 0 86 86">
                <circle class="back" cx="43" cy="43" r="40"></circle>
                <circle class="front" cx="43" cy="43" r="40"></circle>
                <circle class="new" cx="43" cy="43" r="40"></circle>
            </svg>
            <svg class="circle-middle" viewBox="0 0 60 60">
                <circle class="back" cx="30" cy="30" r="27"></circle>
                <circle class="front" cx="30" cy="30" r="27"></circle>
            </svg>
            <svg class="circle-inner" viewBox="0 0 34 34">
                <circle class="back" cx="17" cy="17" r="14"></circle>
                <circle class="front" cx="17" cy="17" r="14"></circle>
            </svg>
            <div class="text" data-text="Memverifikasi..."></div>
        </div>
    </div>

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
                    <i class="bi bi-mortarboard-fill"></i>
                </div>
                <h1>Sistem Data Siswa</h1>
                <p>Masuk untuk mengakses dashboard</p>
            </div>

            {{-- Flash messages --}}
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="bi bi-check-circle-fill"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->has('email') && !$errors->has('password'))
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    {{ $errors->first('email') }}
                </div>
            @endif

            {{-- Login Form --}}
            <form id="loginForm" action="{{ route('login.post') }}" method="POST" novalidate>
                @csrf

                {{-- Email --}}
                <div class="form-group">
                    <label for="email" class="form-label"><i class="bi bi-envelope"></i> Email</label>
                    <div class="input-wrap">
                        <i class="bi bi-envelope input-icon"></i>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                            placeholder="username or email" autocomplete="email" autofocus>
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
                            placeholder="••••••••" autocomplete="current-password">
                        <button type="button" class="toggle-pass" id="togglePass" tabindex="-1">
                            <i class="bi bi-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="invalid-feedback"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                {{-- Remember Me --}}
                <div class="remember-row">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Ingat saya selama 30 hari</label>
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn-login" id="loginBtn">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Masuk ke Dashboard
                </button>

                <div class="divider">atau</div>

                <div style="text-align: center; margin-top: 1rem;">
                    <span style="color: var(--text-muted); font-size: 0.9rem;">Belum punya akun? </span>
                    <a href="{{ route('register') }}"
                        style="color: var(--primary-light); text-decoration: none; font-weight: 600; font-size: 0.9rem; transition: color 0.3s;">Daftar
                        Sekarang</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Toggle show/hide password
        const toggleBtn = document.getElementById('togglePass');
        const pwInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        toggleBtn.addEventListener('click', function () {
            if (pwInput.type === 'password') {
                pwInput.type = 'text';
                eyeIcon.className = 'bi bi-eye-slash';
            } else {
                pwInput.type = 'password';
                eyeIcon.className = 'bi bi-eye';
            }
        });

        // Loading state on submit
        document.getElementById('loginForm').addEventListener('submit', function () {
            // Show overlay
            document.getElementById('loading-overlay').classList.add('active');
            
            // Disable button
            const btn = document.getElementById('loginBtn');
            btn.disabled = true;
        });
    </script>

</body>

</html>
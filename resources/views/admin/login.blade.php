<!DOCTYPE html>
<html lang="mk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пријава - КПУ Идризово Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * { box-sizing: border-box; }
        @media (max-width: 480px) {
            .login-card { padding: 24px !important; border-radius: 16px !important; }
            .login-logo { width: 56px !important; height: 56px !important; font-size: 1.1rem !important; }
            .login-title { font-size: 1.3rem !important; }
            .login-input { padding: 12px 14px !important; font-size: 0.9rem !important; }
            .login-btn { padding: 13px !important; font-size: 0.95rem !important; }
        }
    </style>
</head>
<body style="background:#f0f4fa; display:flex; align-items:center; justify-content:center; min-height:100vh; padding:1rem; font-family:system-ui,sans-serif;">

    <div style="width:100%; max-width:420px;">

        {{-- Logo / Brand --}}
<div style="text-align:center; margin-bottom:32px;">
    <img src="{{ asset('images/logo.png') }}" style="width:80px; height:80px; object-fit:contain; filter:brightness(0) saturate(100%) invert(19%) sepia(52%) saturate(834%) hue-rotate(185deg) brightness(89%) contrast(95%); display:block; margin:0 auto 12px;" />
    <h1 class="login-title" style="font-size:1.6rem; font-weight:800; color:#1a2e4a; margin:0;">КПУ Идризово</h1>
    <p style="color:#5a7299; font-size:0.875rem; margin-top:6px;">Администраторски пристап</p>
</div>

        {{-- Card --}}
        <div class="login-card" style="background:#fff; border:1px solid #d1dff0; border-radius:24px; padding:36px; box-shadow:0 4px 32px rgba(29,111,165,0.08);">

            <form action="{{ route('login.post') }}" method="POST">
                @csrf

                <div style="display:flex; flex-direction:column; gap:18px;">

                    <div>
                        <label style="display:block; font-size:0.8rem; font-weight:700; color:#1a2e4a; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.05em;">Е-пошта</label>
                        <input type="email" name="email" required autocomplete="email"
                            class="login-input"
                            style="width:100%; background:#f5f8ff; border:1.5px solid #d1dff0; border-radius:12px; padding:14px 16px; font-size:0.95rem; color:#1a2e4a; outline:none; transition:border-color 0.2s;"
                            onfocus="this.style.borderColor='#1d6fa5'; this.style.background='#fff';"
                            onblur="this.style.borderColor='#d1dff0'; this.style.background='#f5f8ff';">
                    </div>

                    <div>
                        <label style="display:block; font-size:0.8rem; font-weight:700; color:#1a2e4a; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.05em;">Лозинка</label>
                        <input type="password" name="password" required autocomplete="current-password"
                            class="login-input"
                            style="width:100%; background:#f5f8ff; border:1.5px solid #d1dff0; border-radius:12px; padding:14px 16px; font-size:0.95rem; color:#1a2e4a; outline:none; transition:border-color 0.2s;"
                            onfocus="this.style.borderColor='#1d6fa5'; this.style.background='#fff';"
                            onblur="this.style.borderColor='#d1dff0'; this.style.background='#f5f8ff';">
                    </div>

                    @if($errors->any())
                    <div style="background:#fee2e2; border:1px solid #fca5a5; border-radius:10px; padding:12px 14px; display:flex; align-items:center; gap:8px;">
                        <span style="font-size:1rem;">⚠️</span>
                        <p style="color:#991b1b; font-size:0.85rem; font-weight:600; margin:0;">{{ $errors->first() }}</p>
                    </div>
                    @endif

                    <button type="submit"
                        class="login-btn"
                        style="width:100%; background:#1d6fa5; color:#fff; font-weight:700; font-size:1rem; padding:15px; border-radius:12px; border:none; cursor:pointer; margin-top:4px; letter-spacing:0.02em; transition:background 0.2s, transform 0.1s;"
                        onmouseover="this.style.background='#155f8a';"
                        onmouseout="this.style.background='#1d6fa5';"
                        onmousedown="this.style.transform='scale(0.98)';"
                        onmouseup="this.style.transform='scale(1)';">
                        Пријави се →
                    </button>

                </div>
            </form>
        </div>

        {{-- Footer --}}
        <p style="text-align:center; color:#5a7299; font-size:0.75rem; margin-top:24px;">
            КПУ Идризово &nbsp;·&nbsp; Само за овластен персонал
        </p>

    </div>

</body>
</html>
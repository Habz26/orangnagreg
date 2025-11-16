<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App</title>

    @vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/fontawesome/css/all.min.css') }}">

    <style>
        /* Dropdown animation */
        .dropdown-menu {
            transition: transform 0.3s ease, opacity 0.3s ease;
            transform-origin: top;
            display: block;
            opacity: 0;
            transform: translateY(-10px);
            pointer-events: none;
        }

        .dropdown-menu.show {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }

        /* Preloader overlay */
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: linear-gradient(135deg, #2802ff, #2379fa);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            z-index: 9999;
            color: #fff;
            font-family: 'Instrument Sans', sans-serif;
        }

        .spinner {
            width: 80px;
            height: 80px;
            border: 8px solid rgba(255, 255, 255, 0.3);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 20px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .loading-text {
            font-size: 1.5rem;
            letter-spacing: 2px;
        }

        .loading-text span {
            animation: bounce 1.2s infinite ease-in-out;
            display: inline-block;
        }

        .loading-text span:nth-child(1) { animation-delay: 0s; }
        .loading-text span:nth-child(2) { animation-delay: 0.2s; }
        .loading-text span:nth-child(3) { animation-delay: 0.4s; }
        .loading-text span:nth-child(4) { animation-delay: 0.6s; }
        .loading-text span:nth-child(5) { animation-delay: 0.8s; }
        .loading-text span:nth-child(6) { animation-delay: 1s; }
        .loading-text span:nth-child(7) { animation-delay: 1.2s; }

        @keyframes bounce {
            0%, 80%, 100% { transform: scale(0); }
            40% { transform: scale(1); }
        }

        .scroll-hidden::-webkit-scrollbar { display: none; }
        .scroll-hidden { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>

<body>

    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner"></div>
        <div class="loading-text">
            <span>L</span><span>O</span><span>A</span><span>D</span><span>I</span><span>N</span><span>G</span>
        </div>
    </div>

    @include('layouts.nav')

    <div class="container">
        @yield('content')
    </div>

    <script>
        // ===== PRELOADER =====
        window.addEventListener('load', function () {
            const pre = document.getElementById('preloader');
            if (!pre) return;

            pre.style.transition = 'opacity 0.5s';
            pre.style.opacity = '0';
            setTimeout(() => pre.style.display = 'none', 500);
        });

        // ===== DOM READY =====
        document.addEventListener('DOMContentLoaded', function () {

            // ===== TOGGLE PASSWORD =====
            const toggleBtn = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');

            if (toggleBtn && passwordInput) {
                toggleBtn.addEventListener('click', function () {
                    const isHidden = passwordInput.type === 'password';
                    passwordInput.type = isHidden ? 'text' : 'password';

                    const icon = this.querySelector('i');
                    if (icon) {
                        icon.classList.toggle('fa-eye');
                        icon.classList.toggle('fa-eye-slash');
                    }
                });
            }

            // ===== AUTO SCROLL (if available) =====
            const container = document.getElementById('scrollContainer');
            if (container) {
                let direction = 1;
                setInterval(() => {
                    container.scrollTop += 1 * direction;
                    if (container.scrollTop + container.clientHeight >= container.scrollHeight) direction = -1;
                    if (container.scrollTop <= 0) direction = 1;
                }, 20);
            }

            // ===== REFRESH CAPTCHA =====
            const refreshBtn = document.getElementById('refresh-captcha');
            const captchaImg = document.getElementById('captchaImage');
            const captchaInput = document.getElementById('captcha');

            if (refreshBtn && captchaImg) {
                refreshBtn.addEventListener('click', async function () {
                    try {
                        refreshBtn.disabled = true;
                        refreshBtn.textContent = 'Loading...';

                        const res = await fetch('/refresh-captcha', {
                            method: 'GET',
                            headers: { 'Accept': 'application/json' }
                        });

                        if (!res.ok) throw new Error('Gagal fetch captcha baru');

                        const data = await res.json();
                        captchaImg.src = data.captcha + '?' + Date.now();

                        if (captchaInput) captchaInput.value = '';

                    } catch (e) {
                        alert('Gagal me-refresh captcha!');
                        console.error(e);
                    } finally {
                        refreshBtn.disabled = false;
                        refreshBtn.textContent = 'Refresh';
                    }
                });
            }

        });
    </script>

</body>
</html>

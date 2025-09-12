<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/fontawesome/css/all.min.css') }}">

    <style>
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
            z-index: 9999;
            flex-direction: column;
            color: #fff;
            font-family: 'Instrument Sans', sans-serif;
        }

        /* Spinner */
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
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Animated dots text */
        .loading-text {
            font-size: 1.5rem;
            letter-spacing: 2px;
        }

        .loading-text span {
            display: inline-block;
            animation: bounce 1.2s infinite ease-in-out;
        }

        .loading-text span:nth-child(1) {
            animation-delay: 0s;
        }

        .loading-text span:nth-child(2) {
            animation-delay: 0.2s;
        }

        .loading-text span:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes bounce {

            0%,
            80%,
            100% {
                transform: scale(0);
            }

            40% {
                transform: scale(1);
            }
        }
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
        // Hapus preloader ketika page sudah load
        window.addEventListener('load', function() {
            const preloader = document.getElementById('preloader');
            preloader.style.transition = 'opacity 0.5s ease';
            preloader.style.opacity = '0';
            setTimeout(() => preloader.style.display = 'none', 500);
        });
    </script>
</body>

</html>

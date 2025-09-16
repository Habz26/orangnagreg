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
        .dropdown-menu {
            transition: transform 0.3s ease, opacity 0.3s ease;
            transform-origin: top;
            display: block;
            /* tetap di DOM */
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

        .scroll-hidden::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari, Edge */
        }

        .scroll-hidden {
            -ms-overflow-style: none;
            /* IE 10+ */
            scrollbar-width: none;
            /* Firefox */
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
    <script>
        document.querySelectorAll('.dropdown').forEach(dropdown => {
            const menu = dropdown.querySelector('.dropdown-menu');
            dropdown.addEventListener('hide.bs.dropdown', e => {
                e.preventDefault(); // hentikan Bootstrap remove show class
                menu.classList.remove('show'); // mulai animasi close
                setTimeout(() => {
                    bootstrap.Dropdown.getInstance(dropdown.querySelector(
                        '[data-bs-toggle="dropdown"]'))._completeHide();
                }, 300); // sesuai durasi transition
            });
        });
    </script>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const input = document.getElementById('password');
            const icon = this.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const container = document.getElementById("scrollContainer");
            const speed = 1; // pixels per interval
            const intervalTime = 20; // ms

            let direction = 1; // 1 = scroll ke bawah, -1 = scroll ke atas

            function autoScroll() {
                container.scrollTop += speed * direction;

                // cek batas bawah
                if (container.scrollTop + container.clientHeight >= container.scrollHeight) {
                    direction = -1; // balik scroll ke atas
                }

                // cek batas atas
                if (container.scrollTop <= 0) {
                    direction = 1; // scroll ke bawah lagi
                }
            }

            setInterval(autoScroll, intervalTime);
        });
    </script>


</body>

</html>

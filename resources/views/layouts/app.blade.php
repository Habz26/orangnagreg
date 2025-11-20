<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <style>
        /* Body tetap bisa scroll tapi scrollbar tersembunyi */
        body {
            overflow: auto;
            /* atau overflow-y: scroll; */
            -ms-overflow-style: none;
            /* IE & Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        /* Hanya untuk Chrome, Safari, Opera */
        body::-webkit-scrollbar {
            width: 0px;
            background: transparent;
            /* optional, biar invisible */
        }

        /* Scrollable container tapi scrollbar tersembunyi */
        .scroll-hidden {
            overflow: auto;
            /* tetap bisa scroll */
            -ms-overflow-style: none;
            /* IE & Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        /* Chrome, Safari, Opera */
        .scroll-hidden::-webkit-scrollbar {
            width: 0px;
            height: 0px;
            background: transparent;
            /* optional */
        }
    </style>
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">...</div>

    <!-- Navbar -->
    @auth
        @if (auth()->user()->role == '1')
            @include('layouts.nav')
        @else
            @include('layouts.navuser')
        @endif
    @endauth

    @guest
        @if (!Request::routeIs('login'))
            @include('layouts.navuser')
        @endif
    @endguest



    <div class="container mt-3">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    <script>
        window.addEventListener('load', function() {
            const pre = document.getElementById('preloader');
            pre.style.opacity = '0';
            setTimeout(() => pre.style.display = 'none', 500);
        });

        function printRekap() {
            // Ambil konten div rekap
            var content = document.getElementById('rekapCard').innerHTML;

            // Buka jendela baru
            var myWindow = window.open('', '', 'width=1000,height=800');
            myWindow.document.write('<html><head><title>Rekap Data</title>');
            // Optional: tambahkan CSS Bootstrap biar styling ikut
            myWindow.document.write('<link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">');
            myWindow.document.write('<style>body{padding:20px;} h5,h6{margin:0 0 5px 0;}</style>');
            myWindow.document.write('</head><body>');
            myWindow.document.write(content);
            myWindow.document.write('</body></html>');

            myWindow.document.close();
            myWindow.focus();
            myWindow.print();
            myWindow.close();
        }
    </script>
</body>

</html>

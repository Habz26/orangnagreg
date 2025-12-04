<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <style>
        /* Body tetap bisa scroll tapi scrollbar tersembunyi */
        /* Background abu-abu lembut global */
        body {
            background: #2e2e2e !important;
            /* Abu-abu gelap elegan */
            color: #ffffff;
            /* Teks tetap terbaca */
            overflow: auto;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        body::-webkit-scrollbar {
            width: 0;
            background: transparent;
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

        /* From Uiverse.io by Praashoo7 */
        .form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding-left: 2em;
            padding-right: 2em;
            padding-bottom: 0.4em;
            background-color: #171717;
            border-radius: 25px;
            transition: .4s ease-in-out;
        }

        .form:hover {
            transform: scale(1.05);
            border: 1px solid black;
        }

        #heading {
            text-align: center;
            margin: 2em;
            color: rgb(255, 255, 255);
            font-size: 1.2em;
        }

        .field {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5em;
            border-radius: 25px;
            padding: 0.6em;
            border: none;
            outline: none;
            color: white;
            background-color: #171717;
            box-shadow: inset 2px 5px 10px rgb(5, 5, 5);
        }

        .input-icon {
            height: 1.3em;
            width: 1.3em;
            fill: white;
        }

        .input-field {
            background: none;
            border: none;
            outline: none;
            width: 100%;
            color: #d3d3d3;
        }

        .form .btn {
            display: flex;
            justify-content: center;
            flex-direction: row;
            margin-top: 2.5em;
        }

        .button1 {
            padding: 0.5em;
            padding-left: 1.1em;
            padding-right: 1.1em;
            border-radius: 5px;
            margin-right: 0.5em;
            border: none;
            outline: none;
            transition: .4s ease-in-out;
            background-color: #252525;
            color: white;
        }

        .button1:hover {
            background-color: black;
            color: white;
        }

        .button2 {
            padding: 0.5em;
            padding-left: 2.3em;
            padding-right: 2.3em;
            border-radius: 5px;
            border: none;
            outline: none;
            transition: .4s ease-in-out;
            background-color: #252525;
            color: white;
        }

        .button2:hover {
            background-color: black;
            color: white;
        }

        .button3 {
            margin-bottom: 3em;
            padding: 0.5em;
            border-radius: 5px;
            border: none;
            outline: none;
            transition: .4s ease-in-out;
            background-color: #252525;
            color: white;
        }

        .button3:hover {
            background-color: red;
            color: white;
        }

        /* From Uiverse.io by Peary74 - versi diperkecil */
        .del {
            position: relative;
            width: 120px;
            /* dari 160px → lebih kecil */
            height: 40px;
            /* dari 50px */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .del div {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: none;
            box-shadow: 3px 3px 5px 0 rgba(255, 255, 255, .5),
                -3px -3px 5px 0 rgba(116, 125, 136, .5),
                inset -3px -3px 5px 0 rgba(255, 255, 255, .2),
                inset 3px 3px 5px 0 rgba(0, 0, 0, .4);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 25px;
            /* sedikit mengecil */
            letter-spacing: 1px;
            font-size: 14px;
            /* biar proporsional */
            color: #ff0000;
            z-index: 1;
            transition: .6s;
        }

        .del:hover div {
            letter-spacing: 3px;
            /* dari 4px biar gak melebar banget */
            color: #fff;
            background: #ff0000;
        }

        .btn-logout {
            background: none;
            border: none;
            outline: none;
            width: 100%;
            height: 100%;
            font: inherit;
            color: inherit;
            cursor: pointer;
            padding: 0;
        }
    </style>
    @stack('head')
</head>

<body>
    @stack('scripts')

    <!-- Navbar -->
    @if (!Request::routeIs('login'))
        @include('layouts.nav')
    @endif

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

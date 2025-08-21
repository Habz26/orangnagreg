<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    nav{
          background-color: purple;
      }
        .nav-link {
    color: white;
    text-decoration: underline;
    transition: all 0.3s ease;
    position: relative;
  }

  .nav-link:hover {
    color: yellow;
    text-shadow: 0 0 5px yellow;
    transform: translateY(-2px);
  }

  .nav-link.active {
    font-weight: bold;
    color: rgb(226, 13, 226);
    text-decoration: none;
    border-bottom: 2px solid rgb(226, 13, 226);
  }
  table {
  width: 100%;
  border-collapse: collapse; /* biar border tidak double */
}

table, th, td {
  border: 1px  dashed purple; /* kasih border di semua sisi */
}

th, td {
  padding: 8px;
  text-align: center;
}

    </style>
</head>
<body>
    @include('layouts.nav')
    
    <div class="container">
        @yield('content')
        @yield('content_tanah')
        @yield('content_ruangan')
        @yield('content_bangunan')
        @yield('content_kategori')
    </div>
</body>
</html>
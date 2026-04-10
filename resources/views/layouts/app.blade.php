<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pustaka Aksara - Penerbit Buku Indonesia</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Merriweather:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">

    @include('component.style')
    @stack('style')
</head>
<body class="bg-paper text-ink font-sans antialiased">

    <!-- Navigation -->
    @include('component.navbar')

    @yield('content')

    @include('component.footer')

    @include('component.script')
    @stack('script')
</body>
</html>

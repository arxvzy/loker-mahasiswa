<!doctype html>
<html class="scroll-smooth" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Loker Mahasiswa adalah platform informasi lowongan kerja untuk mahasiswa yang menyediakan pilihan untuk magang, freelance, part-time, hingga full-time. Berbagai pilihan karir yang menarik dapat ditemukan di Loker Mahasiswa">
    <meta property="og:locale" content="id_ID">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Loker Mahasiswa - Lowongan Terbaru {{ date('Y') }}">
    <meta property="og:description"
        content="Loker Mahasiswa adalah platform informasi lowongan kerja untuk mahasiswa yang menyediakan pilihan untuk magang, freelance, part-time, hingga full-time. Berbagai pilihan karir yang menarik dapat ditemukan di Loker Mahasiswa">
    <meta property="og:url" content="https://lokermahasiswa.my.id/">
    <meta property="og:site_name" content="LokerMahasiswa.my.id">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
    @vite('resources/css/app.css')
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
    </style>
</head>

<body class="bg-slate-200 font-poppins text-slate-800 text-xl font-medium">
    <x-navbar />
    @if (Request::path() != 'pasang-loker')
        <div class="container mx-auto py-6">
            @yield('content')
        </div>
    @else
        <div>
            @yield('content')
        </div>
    @endif
    @if (Request::path() != 'pasang-loker')
        <x-footer />
    @endif
    <div class="fixed bottom-60 md:bottom-20 right-4 z-50 max-w-16 lg:max-w-20">
        <a href="https://wa.me/6285879505877" target="_blank" class="block">
            <img src="/images/whatsapp.svg" class="w-16 lg:w-20">
            <p class="text-xs md:text-base text-center font-bold leading-4">Pasang Loker!</p>
        </a>
    </div>
    <script src="/js/lazysizes.min.js"></script>
    <script src="/js/clipboard.min.js"></script>
    <script>
        new ClipboardJS('.copy');
    </script>
</body>

</html>

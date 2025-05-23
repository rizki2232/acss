<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT ACS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="relative min-h-screen bg-[url('{{ asset('image/backgroud.png') }}')] bg-center bg-cover">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-50 z-0"></div>

        <!-- Header -->
        @include('komponen.header')

        <!-- Content -->
        <main class="z-10 relative">
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    @include('komponen.footer')
</body>

</html>

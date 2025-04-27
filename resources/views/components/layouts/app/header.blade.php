<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body>
    <x-navigation>
        <x-nav-link>
            Brea
        </x-nav-link>
    </x-navigation>

    <main class="min-h-svh">
        {{ $slot }}
    </main>

    <x-footer />

    @stack('scripts')
    @livewireScriptConfig
</body>

</html>

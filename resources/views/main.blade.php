@extends('layouts.app')

@section('content')
<div class="absolute top-1/2 left-0 w-full px-10 transform -translate-y-1/2 flex items-center justify-between">
    <!-- Teks di Kiri -->
    <div class="text-left text-white">
        <h1 class="text-5xl font-bold">Delivering Trust,</h1>
        <h1 class="text-5xl font-bold">
            <span class="text-yellow-400">Connecting</span> the Future
        </h1>
    </div>

    <!-- Gambar Mobil di Kanan -->
    <div>
        <img src="{{ asset('image/mobil.png') }}" alt="Mobil" class="h-80 w-auto">
    </div>
</div>
<div class="absolute bottom-0 left-0 w-full z-10">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#FFFFFF" fill-opacity="1"
            d="M0,288L80,266.7C160,245,320,203,480,208C640,213,800,267,960,277.3C1120,288,1280,256,1360,240L1440,224L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
    </svg>
</div>
@endsection

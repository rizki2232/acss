<x-layouts.app>
    <div class="max-w-7xl mx-auto mt-16">
        <!-- Contoh konten -->
        <p class="text-lg">Selamat datang di halaman berita.</p>
    </div>

<div class="bg-gradient-to-r from-blue-500 to-blue-700 min-h-[150px]">
    <div class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
        <h5 class="mb-8 text-2xl font-bold text-red-500">

            Lihat cerita<br />lain kami
        </h5>
    </div>
</div>



    <section class="max-w-7xl mx-auto mt-6 mb-12">
        @if ($posts->count())
            <section class="px-4 grid grid-cols-1 gap-6 sm:grid-cols-2 sm:px-6 lg:grid-cols-3 lg:px-8">
                @foreach ($posts as $post)
                    <x-post :post="$post" :type="__('item')" />
                @endforeach
            </section>
        @else
            <p class="text-center text-gray-500">Belum ada postingan.</p>
        @endif
    </section>
</x-layouts.app>

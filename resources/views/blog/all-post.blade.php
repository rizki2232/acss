<x-layouts.app>


<div  class="max-w-7xl mx-auto mt-16">
    <!-- Hero -->
    <section class="text-center py-10 bg-blue-100">
        <h1 class="text-3xl font-bold">Selamat Datang di Berita PT ACS</h1>
    </section>

    <!-- Konten Berita -->
    <div class="container mx-auto px-4 py-8 space-y-8">
        {{-- @foreach ($berita as $item)
        <div class="flex flex-col md:flex-row gap-4 bg-white shadow-md rounded-lg overflow-hidden">
            <div class="md:w-1/3">
                <img src="{{ asset('uploads/' . $item->gambar) }}" alt="Gambar Berita" class="w-full h-full object-cover">
            </div>
            <div class="md:w-2/3 p-4">
                <h5 class="text-xl font-bold">{{ $item->judul }}</h5>
                <p class="text-sm mt-2">{{ Str::limit($item->isi, 400, '...') }}</p>
                <a href="{{ route('berita.show', $item->id) }}" class="text-blue-600 hover:underline text-sm mt-4 inline-block">Baca Selengkapnya</a>
            </div>
        </div>
        @endforeach --}}
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

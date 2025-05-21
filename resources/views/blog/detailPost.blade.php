<x-layouts.app>
    <div class="max-w-4xl mx-auto mt-16 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-primary mb-4">{{ $post->title }}</h1>
        <p class="text-gray-500 text-sm mb-6">
            Dipublikasikan pada {{ $post->created_at->translatedFormat('d F Y') }}
        </p>

        @if ($post->thumbnail)
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                class="w-full rounded-lg mb-6 shadow-md max-h-[500px] object-cover">
        @endif

        <div class="prose prose-lg max-w-none prose-primary dark:prose-invert">
            {!! $post->content !!}
        </div>

        <div class="mt-12">
            <a href="{{ route('guest.blog.all') }}"
               class="inline-flex items-center text-sm text-primary hover:underline">
                ← Kembali ke semua berita
            </a>
        </div>
    </div>
</x-layouts.app>

@props(['post'])

<article class="border rounded-lg p-4 hover:shadow-lg transition">
    <a href="{{ route('guest.blog.show', $post->slug) }}">
        <h3 class="text-xl font-semibold text-primary hover:underline">{{ $post->title }}</h3>
        <p class="text-gray-500 text-sm mt-2">{{ Str::limit($post->excerpt, 100) }}</p>
    </a>
</article>

@props(['post', 'type'])

@php
    $classes = match ($type) {
        'highlight' => 'flex flex-col-reverse space-y-4 md:flex-col',
        'item' => 'space-y-4',
        'mini' => 'flex',
    }
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    <div>
        <a href="{{ route('post.show', $post['id_posts']) }}">
            <img class="rounded-md w-64 h-64 object-cover mx-auto"
                src="{{ asset('storage/' . $post['img']) }}"
                alt="{{ $post['title'] }}">
        </a>

<a href="{{ route('post.show', $post['id_posts']) }}" class="hover:underline">
</a>

    </div>
    <div class="">
        <div class="mb-2 flex justify-between items-center">
            <span class="text-sm py-1 px-2 bg-blue-200 rounded-xs">Berita Terbaru</span>
            <span class="ml-2 text-xs">{{ \Carbon\Carbon::parse($post['published_at'])->format('d M Y') }}</span>
        </div>
        <a href="" class="hover:underline">
            <h3 class="text-3xl font-semibold">{{ $post['title'] }}</h3>
        </a>
        <p class="mt-4">{!! Str::limit($post['body'], 100, '...') !!} </p>
    </div>
</div>

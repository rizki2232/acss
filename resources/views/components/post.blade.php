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
        <a href="">
            <img class="rounded-md"
                src="https://cdn.prod.website-files.com/5fac161927bf86485ba43fd0/64706159e30465c80f983e2e_How-to-record-a-high-quality-podcast-(1).webp"
                alt="">
        </a>
    </div>
    <div class="">
        <div class="mb-2 flex justify-between items-center">
            <span class="text-sm py-1 px-2 bg-blue-200 rounded-xs">Berita Terbaru</span>
            <span class="ml-2 text-xs">{{ \Carbon\Carbon::parse($post['date'])->format('d M Y') }}</span>
        </div>
        <a href="" class="hover:underline">
            <h3 class="text-3xl font-semibold">{{ $post['title'] }}</h3>
        </a>
        <p class="mt-4">{{ Str::limit($post['description'], 100, '...') }}</p>
    </div>
</div>

<x-layouts.app>
    <div class="max-w-7xl mx-auto">

    </div>
    <div class="max-w-7xl mx-auto">
        <div class="pt-24 px-4 sm:px-6 lg:px-8">
            <div class="mb-8 grid grid-cols-1 gap-4 md:grid-cols-5">
                <x-post :post="$post_latest" class="col-span-3" :type="__('highlight')" />
                <div class="col-span-2">
                    <div class="mb-4 p-4 bg-linear-to-r from-primary to-primary/80 rounded-sm">
                        <h2 class="mb-8 text-3xl font-black text-white">Kabar Terbaru</h2>
                    </div>
                    @foreach ($post_highlight as $post)
                    {{-- <x-post :post="$post" :type="__('mini')" /> --}}
                    <div class="flex items-center space-x-4 space-y-2">
                        <img class="w-42 rounded-md" src="https://cdn.prod.website-files.com/5fac161927bf86485ba43fd0/64706159e30465c80f983e2e_How-to-record-a-high-quality-podcast-(1).webp" alt="">
                        <div class="grow">
                            <a href="" class="hover:underline">
                                <h3 class="text-lg font-semibold">{{ $post['title'] }}</h3>
                            </a>
                            <div class="grow mb-2 flex justify-between">
                                <span class="text-xs py-1 px-2 bg-blue-200 rounded-xs">Berita Terbaru</span>
                                <span class="ml-2 flex justify-between text-xs">{{ \Carbon\Carbon::parse($post['date'])->format('F j, Y') }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            {{-- <div>
                <span class="text-sm py-1 px-2 bg-blue-200">Berita Terbaru</span>
                <span class="ml-2 text-sm">{{ \Carbon\Carbon::parse($latest_post['date'])->format('F j, Y') }}</span>
            </div>
            <div class="mt-4 space-y-4">
                <h3 class="text-3xl font-semibold">{{ $latest_post['title'] }}</h3>
                <p>{{ $latest_post['description'] }}</p>
                <a href="">
                    <img class="rounded-md"
                        src="https://cdn.prod.website-files.com/5fac161927bf86485ba43fd0/64706159e30465c80f983e2e_How-to-record-a-high-quality-podcast-(1).webp"
                        alt="">
                </a>
            </div> --}}

            <div class="-mx-4 px-4 py-8 bg-linear-to-r from-primary to-primary/80 sm:-mx-6 lg:-mx-8">
                <h5 class="mb-8 text-2xl font-bold text-white">Lihat cerita<br />lain kami</h5>
            </div>

            @if ($posts)
            <section class="mt-6 mb-12 grid grid-cols-1 gap-6 sm:grid-cols-3">
                @foreach ($posts as $post)
                <x-post :post="$post" :type="__('item')" />
                @endforeach
            </section>
            @else
            <p>No Posts</p>
            @endif
        </div>
    </div>
</x-layouts.app>

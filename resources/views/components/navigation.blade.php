<header x-data="{ navOpen: false }" class="fixed top-0 left-0 right-0 flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full bg-primary backdrop-blur-sm shadow">
    <nav class="relative max-w-7xl w-full mx-auto md:flex md:items-center md:justify-between md:gap-3 py-2 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center gap-x-1">
            <a href="index.php" class="relative mr-6">
                <x-app-logo />
            </a>

            <!-- Collapse Button -->
            <button x-on:click="navOpen = ! navOpen" class="md:hidden p-2 border border-gray-200 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4" x-show="!navOpen">
                    <path fill-rule="evenodd" d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4" x-show="navOpen">
                    <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                </svg>

                <span class="sr-only">Toggle navigation</span>
            </button>
        </div>
        <div class="overflow-hidden" :class="navOpen ? '' : 'hidden md:block'">
            <div class="overflow-hidden overflow-y-auto max-h-[75vh] [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
                <div class="py-2 md:py-0  flex flex-col md:flex-row md:items-center gap-0.5 md:gap-1">
                    <div class="grow">
                        <div class="flex flex-col md:flex-row md:justify-end md:items-center gap-0.5 md:gap-1">
                            <x-nav-link href="{{ route('guest.home') }}" :active="request()->routeIs('guest.home')">
                                <span class="shrink-0 size-4 me-3 md:me-2 md:hidden">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-house"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                                </span>
                                Home
                            </x-nav-link>
                            <x-nav-link href="{{ route('guest.blog.all') }}" :active="request()->routeIs('guest.blog.all')">
                                <span class="shrink-0 size-4 me-3 md:me-2 md:hidden">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-house"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                                </span>
                                Blog
                            </x-nav-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=""></div>
    </nav>
</header>

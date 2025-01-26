<nav id="page-sidebar"
    class="fixed top-0 bottom-0 z-50 flex flex-col w-full h-full transition-transform duration-300 ease-out bg-white border-gray-200 start-0 dark:border-gray-700/75 dark:bg-gray-900 lg:w-64 ltr:border-r rtl:border-l"
    x-bind:class="{
        '-translate-x-full': !isSidebarOpen,
        'translate-x-0': isSidebarOpen,
    }" aria-label="Main Sidebar Navigation">
    <!-- Sidebar Header -->
    <div class="flex items-center justify-between flex-none w-full h-16 px-5 shadow-sm">
        <!-- Brand -->
        <a href="/"
            class="inline-flex items-center gap-2 font-semibold text-gray-800 group dark:text-gray-200 dark:hover:text-gray-300">
            <x-icon.briefcase />
            <span class="font-bold">PROJEKIT</span>
        </a>
        <!-- END Brand -->

        <!-- Extra Actions -->
        <div class="flex items-center">
            <!-- Dark Mode Toggle -->
            <button type="button"
                class="inline-flex items-center justify-center leading-5 text-gray-800 hover:text-gray-600 focus:outline-none active:text-gray-800 dark:text-gray-200 dark:hover:text-gray-300 dark:active:text-gray-200"
                x-on:click="() => { darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)}">
                <x-icon.moon />
                <x-icon.sun />
            </button>
            <!-- END Dark Mode Toggle -->

            <!-- Close Sidebar on Mobile -->
            <button type="button"
                class="inline-flex items-center justify-center leading-5 text-gray-800 ms-3 hover:text-blue-600 focus:outline-none active:text-blue-800 dark:text-gray-200 dark:hover:text-blue-300 dark:active:text-blue-200 lg:hidden"
                x-on:click="isSidebarOpen = false">
                <x-icon.fries />
            </button>
            <!-- END Close Sidebar on Mobile -->
        </div>
        <!-- END Extra Actions -->
    </div>
    <!-- END Sidebar Header -->

    <!-- Sidebar Navigation -->
    <div class="overflow-y-auto">
        <div class="w-full py-4">
            <nav class="space-y-1">
                <a href="/"
                    class="group flex items-center gap-2 border-r-4 border-blue-400 bg-blue-100 px-5 py-0.5 text-sm font-medium text-blue-900 dark:bg-blue-700 dark:text-blue-100">
                    <span class="flex items-center flex-none opacity-75">
                        <x-icon.home />
                    </span>
                    <span class="py-2 grow">Home</span>
                </a>
                <a href="/favorite"
                    class="group flex items-center gap-2 px-5 py-0.5 text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-900 active:bg-gray-50 dark:text-gray-200 dark:hover:bg-blue-700 dark:hover:text-blue-200">
                    <span class="flex items-center flex-none opacity-75">
                        <x-icon.heart />
                    </span>
                    <span class="py-2 grow">Favorite</span>
                </a>
                <a href="/favorite"
                    class="group flex items-center gap-2 px-5 py-0.5 text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-900 active:bg-gray-50 dark:text-gray-200 dark:hover:bg-blue-700 dark:hover:text-blue-200">
                    <span class="flex items-center flex-none opacity-75">
                        <x-icon.archive />
                    </span>
                    <span class="py-2 grow">Your Projects</span>
                </a>
                <div class="px-5 pt-6 pb-2 text-xs font-medium tracking-wider text-gray-400 uppercase">
                    Category
                </div>
                @php
                $categories = \App\Models\Category::pluck('name', 'slug')->toArray();
                @endphp
                @foreach ($categories as $slug => $name)
                <a href="{{ route('category', $slug) }}"
                    class="group flex items-center gap-2 px-5 py-0.5 text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-900 active:bg-gray-50 dark:text-gray-200 dark:hover:bg-blue-800 dark:hover:text-blue-200">
                    <span class="flex items-center flex-none opacity-75">
                        <x-icon.hashtag />
                    </span>
                    <span class="py-2 grow">{{ $name }}</span>
                </a>
                @endforeach
            </nav>
        </div>
    </div>
    <!-- END Sidebar Navigation -->
</nav>
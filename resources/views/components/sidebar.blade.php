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
                <x-navlink :active="request()->routeIs('home')" :href="route('home')" name="Home">
                    <x-icon.home />
                </x-navlink>
                <x-navlink :active="request()->routeIs('favorite')" :href="route('favorite')" name="Favorite">
                    <x-icon.heart />
                </x-navlink>
                @auth
                @php
                $username = auth()->user()->username;
                $route = route('projects-by-user', $username);
                @endphp
                <x-navlink :active="request()->fullUrl() == $route" :href="$route" name="My Project">
                    <x-icon.archive />
                </x-navlink>
                @endauth
                <div class="px-5 pt-6 pb-2 text-xs font-medium tracking-wider text-gray-400 uppercase">
                    Category
                </div>
                @php
                $categories = \App\Models\Category::pluck('name', 'slug')->toArray();
                @endphp
                @foreach ($categories as $slug => $name)
                @php
                $route = route('projets-by-category', $slug);
                @endphp
                <x-navlink :active="request()->fullUrl() == $route" :href="$route" :name="$name">
                    <x-icon.hashtag />
                </x-navlink>
                @endforeach
            </nav>
        </div>
    </div>
    <!-- END Sidebar Navigation -->
</nav>
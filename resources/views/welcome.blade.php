<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ 
        isSidebarOpen: true, 
        darkMode: localStorage.getItem('darkMode') === 'true', 
        userDropdownOpen: false 
    }" x-bind:class="{ 'dark': darkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

    <!-- Styles / Scripts -->
    <script>
        if (localStorage.getItem('darkMode') === 'true') {
            document.documentElement.classList.add('dark');
        }
    </script>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="font-sans antialiased">
    <div>
        <!-- Page Container -->
        <div id="page-container"
            class="mx-auto flex min-h-screen w-full min-w-[320px] flex-col bg-gray-100 transition-all duration-300 ease-out dark:bg-gray-800 dark:text-gray-200 lg:ps-64"
            x-bind:class="{ 'lg:ps-64': isSidebarOpen }">
            <!-- Page Sidebar -->
            <nav id="page-sidebar"
                class="fixed top-0 bottom-0 z-50 flex flex-col w-full h-full transition-transform duration-300 ease-out bg-white border-gray-200 start-0 dark:border-gray-700/75 dark:bg-gray-900 lg:w-64 ltr:border-r rtl:border-l"
                x-bind:class="{
        '-translate-x-full': !isSidebarOpen,
        'translate-x-0': isSidebarOpen,
      }" aria-label="Main Sidebar Navigation">
                <!-- Sidebar Header -->
                <div class="flex items-center justify-between flex-none w-full h-16 px-5 shadow-sm">
                    <!-- Brand -->
                    <a href="javascript:void(0)"
                        class="inline-flex items-center gap-2 font-semibold text-gray-800 group hover:text-gray-600 dark:text-gray-200 dark:hover:text-gray-300">
                        <svg class="inline-block w-5 h-5 hi-mini hi-briefcase -rotate-6"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M6 3.75A2.75 2.75 0 018.75 1h2.5A2.75 2.75 0 0114 3.75v.443c.572.055 1.14.122 1.706.2C17.053 4.582 18 5.75 18 7.07v3.469c0 1.126-.694 2.191-1.83 2.54-1.952.599-4.024.921-6.17.921s-4.219-.322-6.17-.921C2.694 12.73 2 11.665 2 10.539V7.07c0-1.321.947-2.489 2.294-2.676A41.047 41.047 0 016 4.193V3.75zm6.5 0v.325a41.622 41.622 0 00-5 0V3.75c0-.69.56-1.25 1.25-1.25h2.5c.69 0 1.25.56 1.25 1.25zM10 10a1 1 0 00-1 1v.01a1 1 0 001 1h.01a1 1 0 001-1V11a1 1 0 00-1-1H10z"
                                clip-rule="evenodd" />
                            <path
                                d="M3 15.055v-.684c.126.053.255.1.39.142 2.092.642 4.313.987 6.61.987 2.297 0 4.518-.345 6.61-.987.135-.041.264-.089.39-.142v.684c0 1.347-.985 2.53-2.363 2.686a41.454 41.454 0 01-9.274 0C3.985 17.585 3 16.402 3 15.055z" />
                        </svg>
                        <span class="font-bold">PROJEKIT</span>
                    </a>
                    <!-- END Brand -->

                    <!-- Extra Actions -->
                    <div class="flex items-center">
                        <!-- Dark Mode Toggle -->
                        <button type="button"
                            class="inline-flex items-center justify-center leading-5 text-gray-800 hover:text-gray-600 focus:outline-none active:text-gray-800 dark:text-gray-200 dark:hover:text-gray-300 dark:active:text-gray-200"
                            x-on:click="() => { darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)}">
                            <svg x-show="!darkMode" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="inline-block w-5 h-5 hi-outline hi-moon">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                            </svg>
                            <svg x-cloak x-show="darkMode" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="inline-block w-5 h-5 hi-outline hi-sun">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                            </svg>
                        </button>
                        <!-- END Dark Mode Toggle -->

                        <!-- Close Sidebar on Mobile -->
                        <button type="button"
                            class="inline-flex items-center justify-center leading-5 text-gray-800 ms-3 hover:text-rose-600 focus:outline-none active:text-rose-800 dark:text-gray-200 dark:hover:text-rose-300 dark:active:text-rose-200 lg:hidden"
                            x-on:click="isSidebarOpen = false">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="inline-block w-5 h-5 hi-solid hi-x-mark">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
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
                            <a href="javascript:void(0)"
                                class="group flex items-center gap-2 border-r-4 border-rose-400 bg-rose-50 px-5 py-0.5 text-sm font-medium text-rose-900 dark:bg-rose-800 dark:text-rose-200">
                                <span class="flex items-center flex-none opacity-75">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="inline-block w-6 h-6 hi-outline hi-home text-rose-600 dark:text-rose-300">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                    </svg>
                                </span>
                                <span class="py-2 grow">Home</span>
                            </a>
                            <a href="javascript:void(0)"
                                class="group flex items-center gap-2 px-5 py-0.5 text-sm font-medium text-gray-700 hover:bg-rose-50 hover:text-rose-900 active:bg-gray-50 dark:text-gray-200 dark:hover:bg-rose-800 dark:hover:text-rose-200">
                                <span class="flex items-center flex-none opacity-75">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="inline-block w-6 h-6 text-gray-400 hi-outline hi-globe-americas group-hover:text-rose-600 dark:group-hover:text-rose-300">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.115 5.19l.319 1.913A6 6 0 008.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 002.288-4.042 1.087 1.087 0 00-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 01-.98-.314l-.295-.295a1.125 1.125 0 010-1.591l.13-.132a1.125 1.125 0 011.3-.21l.603.302a.809.809 0 001.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 001.528-1.732l.146-.292M6.115 5.19A9 9 0 1017.18 4.64M6.115 5.19A8.965 8.965 0 0112 3c1.929 0 3.716.607 5.18 1.64" />
                                    </svg>
                                </span>
                                <span class="py-2 grow">Explore</span>
                            </a>
                            <a href="javascript:void(0)"
                                class="group flex items-center gap-2 px-5 py-0.5 text-sm font-medium text-gray-700 hover:bg-rose-50 hover:text-rose-900 active:bg-gray-50 dark:text-gray-200 dark:hover:bg-rose-800 dark:hover:text-rose-200">
                                <span class="flex items-center flex-none opacity-75">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="inline-block w-6 h-6 text-gray-400 hi-outline hi-clipboard-list group-hover:text-rose-600 dark:group-hover:text-rose-300">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                                    </svg>
                                </span>
                                <span class="py-2 grow">Subscriptions</span>
                            </a>
                            <div class="px-5 pt-6 pb-2 text-xs font-medium tracking-wider text-gray-400 uppercase">
                                Personal
                            </div>
                            <a href="javascript:void(0)"
                                class="group flex items-center gap-2 px-5 py-0.5 text-sm font-medium text-gray-700 hover:bg-rose-50 hover:text-rose-900 active:bg-gray-50 dark:text-gray-200 dark:hover:bg-rose-800 dark:hover:text-rose-200">
                                <span class="flex items-center flex-none opacity-75">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="inline-block w-6 h-6 text-gray-400 hi-outline hi-square-2x2 group-hover:text-rose-600 dark:group-hover:text-rose-300">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                                    </svg>
                                </span>
                                <span class="py-2 grow">Library</span>
                            </a>
                            <a href="javascript:void(0)"
                                class="group flex items-center gap-2 px-5 py-0.5 text-sm font-medium text-gray-700 hover:bg-rose-50 hover:text-rose-900 active:bg-gray-50 dark:text-gray-200 dark:hover:bg-rose-800 dark:hover:text-rose-200">
                                <span class="flex items-center flex-none opacity-75">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="inline-block w-6 h-6 text-gray-400 hi-outline hi-queue-list group-hover:text-rose-600 dark:group-hover:text-rose-300">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" />
                                    </svg>
                                </span>
                                <span class="py-2 grow">History</span>
                            </a>
                            <a href="javascript:void(0)"
                                class="group flex items-center gap-2 px-5 py-0.5 text-sm font-medium text-gray-700 hover:bg-rose-50 hover:text-rose-900 active:bg-gray-50 dark:text-gray-200 dark:hover:bg-rose-800 dark:hover:text-rose-200">
                                <span class="flex items-center flex-none opacity-75">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="inline-block w-6 h-6 text-gray-400 hi-outline hi-play-circle group-hover:text-rose-600 dark:group-hover:text-rose-300">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                    </svg>
                                </span>
                                <span class="py-2 grow">Your Videos</span>
                                <span
                                    class="px-2 py-1 text-xs font-medium leading-4 transition rounded-full bg-rose-400/10 text-rose-700 dark:bg-rose-400/20 dark:text-rose-200 dark:group-hover:bg-rose-400/30">26</span>
                            </a>
                            <a href="javascript:void(0)"
                                class="group flex items-center gap-2 px-5 py-0.5 text-sm font-medium text-gray-700 hover:bg-rose-50 hover:text-rose-900 active:bg-gray-50 dark:text-gray-200 dark:hover:bg-rose-800 dark:hover:text-rose-200">
                                <span class="flex items-center flex-none opacity-75">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="inline-block w-6 h-6 text-gray-400 hi-outline hi-clock group-hover:text-rose-600 dark:group-hover:text-rose-300">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                                <span class="py-2 grow">Watch Later</span>
                                <span
                                    class="px-2 py-1 text-xs font-medium leading-4 transition rounded-full bg-rose-400/10 text-rose-700 dark:bg-rose-400/20 dark:text-rose-200 dark:group-hover:bg-rose-400/30">12</span>
                            </a>
                            <a href="javascript:void(0)"
                                class="group flex items-center gap-2 px-5 py-0.5 text-sm font-medium text-gray-700 hover:bg-rose-50 hover:text-rose-900 active:bg-gray-50 dark:text-gray-200 dark:hover:bg-rose-800 dark:hover:text-rose-200">
                                <span class="flex items-center flex-none opacity-75">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="inline-block w-6 h-6 text-gray-400 hi-outline hi-heart group-hover:text-rose-600 dark:group-hover:text-rose-300">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </span>
                                <span class="py-2 grow">Liked Videos</span>
                                <span
                                    class="px-2 py-1 text-xs font-medium leading-4 transition rounded-full bg-rose-400/10 text-rose-700 dark:bg-rose-400/20 dark:text-rose-200 dark:group-hover:bg-rose-400/30">39</span>
                            </a>
                            <div class="px-5 pt-6 pb-2 text-xs font-medium tracking-wider text-gray-400 uppercase">
                                Subscriptions
                            </div>
                            <a href="javascript:void(0)"
                                class="group flex items-center gap-2 px-5 py-0.5 text-sm font-medium text-gray-700 hover:bg-rose-50 hover:text-rose-900 active:bg-gray-50 dark:text-gray-200 dark:hover:bg-rose-800 dark:hover:text-rose-200">
                                <span class="flex items-center flex-none opacity-75">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="inline-block w-6 h-6 text-gray-400 hi-outline hi-at-symbol group-hover:text-rose-600 dark:group-hover:text-rose-300">
                                        <path stroke-linecap="round"
                                            d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                                    </svg>
                                </span>
                                <span class="py-2 grow">Nature Moments</span>
                            </a>
                            <a href="javascript:void(0)"
                                class="group flex items-center gap-2 px-5 py-0.5 text-sm font-medium text-gray-700 hover:bg-rose-50 hover:text-rose-900 active:bg-gray-50 dark:text-gray-200 dark:hover:bg-rose-800 dark:hover:text-rose-200">
                                <span class="flex items-center flex-none opacity-75">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="inline-block w-6 h-6 text-gray-400 hi-outline hi-at-symbol group-hover:text-rose-600 dark:group-hover:text-rose-300">
                                        <path stroke-linecap="round"
                                            d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                                    </svg>
                                </span>
                                <span class="py-2 grow">Animals Kingdom</span>
                            </a>
                            <a href="javascript:void(0)"
                                class="group flex items-center gap-2 px-5 py-0.5 text-sm font-medium text-gray-700 hover:bg-rose-50 hover:text-rose-900 active:bg-gray-50 dark:text-gray-200 dark:hover:bg-rose-800 dark:hover:text-rose-200">
                                <span class="flex items-center flex-none opacity-75">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="inline-block w-6 h-6 text-gray-400 hi-outline hi-at-symbol group-hover:text-rose-600 dark:group-hover:text-rose-300">
                                        <path stroke-linecap="round"
                                            d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                                    </svg>
                                </span>
                                <span class="py-2 grow">Inspiration Strike</span>
                            </a>
                            <a href="javascript:void(0)"
                                class="group flex items-center gap-2 px-5 py-0.5 text-sm font-medium text-gray-700 hover:bg-rose-50 hover:text-rose-900 active:bg-gray-50 dark:text-gray-200 dark:hover:bg-rose-800 dark:hover:text-rose-200">
                                <span class="flex items-center flex-none opacity-75">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="inline-block w-6 h-6 text-gray-400 hi-outline hi-at-symbol group-hover:text-rose-600 dark:group-hover:text-rose-300">
                                        <path stroke-linecap="round"
                                            d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                                    </svg>
                                </span>
                                <span class="py-2 grow">Into The Wild</span>
                            </a>
                        </nav>
                    </div>
                </div>
                <!-- END Sidebar Navigation -->
            </nav>
            <!-- Page Sidebar -->

            <!-- Page Header -->
            <header id="page-header"
                class="fixed top-0 z-30 flex items-center flex-none h-16 transition-all duration-300 ease-out bg-white shadow-sm end-0 start-0 dark:bg-gray-900 lg:ps-64"
                x-bind:class="{ 'lg:ps-64': isSidebarOpen }">
                <div class="flex justify-between w-full px-4 mx-auto max-w-7xl lg:px-8">
                    <!-- Left Section -->
                    <div class="flex items-center">
                        <!-- Toggle Sidebar on Mobile -->
                        <div class="me-2 lg:hidden">
                            <button type="button"
                                class="inline-flex items-center justify-center gap-2 px-3 py-2 font-semibold leading-6 text-gray-800 bg-white border border-gray-300 rounded shadow-sm hover:border-gray-300 hover:bg-gray-100 hover:text-gray-800 hover:shadow focus:outline-none focus:ring focus:ring-gray-500/25 active:border-white active:bg-white active:shadow-none dark:border-gray-700/75 dark:bg-gray-900 dark:text-gray-200 dark:hover:border-gray-700 dark:hover:bg-gray-800 dark:hover:text-gray-200 dark:focus:ring-gray-700 dark:active:border-gray-900 dark:active:bg-gray-900"
                                x-on:click="isSidebarOpen = true">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="inline-block w-5 h-5 hi-solid hi-menu-alt-1">
                                    <path fill-rule="evenodd"
                                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        <!-- END Toggle Sidebar on Mobile -->

                        <!-- Toggle Sidebar on Desktop -->
                        <div class="hidden lg:block">
                            <button type="button"
                                class="inline-flex items-center justify-center gap-2 px-3 py-2 font-semibold leading-6 text-gray-800 bg-white border border-gray-300 rounded shadow-sm hover:border-gray-300 hover:bg-gray-100 hover:text-gray-800 hover:shadow focus:outline-none focus:ring focus:ring-gray-500/25 active:border-white active:bg-white active:shadow-none dark:border-gray-700/75 dark:bg-gray-900 dark:text-gray-200 dark:hover:border-gray-700 dark:hover:bg-gray-800 dark:hover:text-gray-200 dark:focus:ring-gray-700 dark:active:border-gray-900 dark:active:bg-gray-900"
                                x-on:click="isSidebarOpen = !isSidebarOpen">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="inline-block w-5 h-5 hi-solid hi-menu-alt-1">
                                    <path fill-rule="evenodd"
                                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        <!-- END Toggle Sidebar on Desktop -->
                    </div>
                    <!-- END Left Section -->

                    <!-- Main Section -->
                    <div class="flex items-center">
                        <!-- Search -->
                        <div class="hidden sm:block">
                            <form onsubmit="return false;">
                                <div class="relative">
                                    <input
                                        class="block py-2 text-sm leading-5 border border-gray-300 rounded w-96 pe-10 focus:border-rose-500 focus:ring focus:ring-rose-500/50 dark:border-gray-700 dark:bg-gray-800 dark:placeholder:text-gray-400 dark:focus:border-rose-400 dark:focus:ring-rose-400"
                                        type="text" id="search" name="search" placeholder="Search.." />
                                    <div
                                        class="absolute inset-y-0 flex items-center justify-center w-10 my-px text-gray-300 rounded-r pointer-events-none end-0 me-px">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            class="w-5 h-5 hi-solid hi-magnifying-glass">
                                            <path fill-rule="evenodd"
                                                d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- END Search -->

                        <!-- Brand -->
                        <a href="javascript:void(0)"
                            class="inline-flex items-center gap-2 font-semibold text-gray-800 group hover:text-gray-600 sm:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor"
                                class="inline-block w-6 h-6 transition hi-outline hi-video-camera text-rose-500 group-hover:scale-110">
                                <path stroke-linecap="round"
                                    d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                        </a>
                        <!-- END Brand -->
                    </div>
                    <!-- END Main Section -->

                    <!-- Right Section -->
                    <div class="flex items-center gap-2">
                        <!-- User Dropdown -->
                        <div class="relative inline-block">
                            <!-- Dropdown Toggle Button -->
                            <button type="button"
                                class="inline-flex items-center justify-center px-3 py-2 text-sm font-semibold leading-5 text-gray-800 bg-white border border-gray-300 rounded shadow-sm hover:border-gray-300 hover:bg-gray-100 hover:text-gray-800 hover:shadow focus:outline-none focus:ring focus:ring-gray-500/25 active:border-white active:bg-white active:shadow-none dark:border-gray-700/75 dark:bg-gray-900 dark:text-gray-200 dark:hover:border-gray-700 dark:hover:bg-gray-800 dark:hover:text-gray-200 dark:focus:ring-gray-700 dark:active:border-gray-900 dark:active:bg-gray-900"
                                id="tk-dropdown-layouts-user" aria-haspopup="true"
                                x-bind:aria-expanded="userDropdownOpen" x-on:click="userDropdownOpen = true">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="inline-block w-5 h-5 hi-solid hi-user-circle sm:hidden">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-5.5-2.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zM10 12a5.99 5.99 0 00-4.793 2.39A6.483 6.483 0 0010 16.5a6.483 6.483 0 004.793-2.11A5.99 5.99 0 0010 12z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="hidden sm:inline">John</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="hidden w-5 h-5 opacity-50 hi-solid hi-chevron-down ms-1 sm:inline-block">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <!-- END Dropdown Toggle Button -->

                            <!-- Dropdown -->
                            <div x-cloak x-show="userDropdownOpen" x-transition:enter="transition ease-out duration-150"
                                x-transition:enter-start="opacity-0 scale-75"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-75"
                                x-on:click.outside="userDropdownOpen = false" role="menu"
                                aria-labelledby="tk-dropdown-layouts-user"
                                class="absolute w-48 mt-2 rounded shadow-xl z-1 end-0 ltr:origin-top-right rtl:origin-top-left">
                                <div
                                    class="bg-white divide-y divide-gray-100 rounded ring-1 ring-black/5 dark:divide-gray-700 dark:bg-gray-900 dark:ring-gray-700">
                                    <div class="p-2 space-y-1">
                                        <a role="menuitem" href="javascript:void(0)"
                                            class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-600 rounded hover:bg-gray-100 hover:text-gray-700 focus:bg-gray-100 focus:text-gray-700 focus:outline-none dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-gray-100 dark:focus:bg-gray-800 dark:focus:text-gray-100">
                                            <span>Your Channel</span>
                                        </a>
                                        <a role="menuitem" href="javascript:void(0)"
                                            class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-600 rounded hover:bg-gray-100 hover:text-gray-700 focus:bg-gray-100 focus:text-gray-700 focus:outline-none dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-gray-100 dark:focus:bg-gray-800 dark:focus:text-gray-100">
                                            <span>Video Studio</span>
                                        </a>
                                    </div>
                                    <div class="p-2 space-y-1">
                                        <a role="menuitem" href="javascript:void(0)"
                                            class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-600 rounded hover:bg-gray-100 hover:text-gray-700 focus:bg-gray-100 focus:text-gray-700 focus:outline-none dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-gray-100 dark:focus:bg-gray-800 dark:focus:text-gray-100">
                                            <span>Settings</span>
                                        </a>
                                    </div>
                                    <div class="p-2 space-y-1">
                                        <form onsubmit="return false;">
                                            <button type="submit" role="menuitem"
                                                class="flex items-center w-full gap-2 px-3 py-2 text-sm font-medium text-gray-600 rounded text-start hover:bg-gray-100 hover:text-gray-700 focus:bg-gray-100 focus:text-gray-700 focus:outline-none dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-gray-100 dark:focus:bg-gray-800 dark:focus:text-gray-100">
                                                <span>Sign out</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- END Dropdown -->
                        </div>
                        <!-- END User Dropdown -->
                    </div>
                    <!-- END Right Section -->
                </div>
            </header>
            <!-- END Page Header -->

            <!-- Page Content -->
            <main id="page-content" class="flex flex-col flex-auto max-w-full pt-16">
                <!-- Tags -->
                <div class="shadow-sm bg-gray-50 dark:bg-gray-900/50">
                    <div class="w-full px-4 py-2 mx-auto max-w-7xl lg:px-8 lg:py-5">
                        <nav class="-m-0.5">
                            <a href="javascript:void(0)"
                                class="m-0.5 inline-flex rounded border bg-white px-2 py-1.5 text-xs font-medium leading-4 text-gray-600 hover:border-gray-300 hover:bg-gray-50 hover:text-rose-600 active:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-700 dark:hover:bg-gray-900/75 dark:hover:text-rose-300 dark:active:border-gray-600">
                                All
                            </a>
                            <a href="javascript:void(0)"
                                class="m-0.5 inline-flex rounded border border-gray-300 bg-gray-50 px-2 py-1.5 text-xs font-medium leading-4 text-rose-600 dark:border-gray-700 dark:bg-gray-800 dark:text-rose-300">
                                Nature
                            </a>
                            <a href="javascript:void(0)"
                                class="m-0.5 inline-flex rounded border bg-white px-2 py-1.5 text-xs font-medium leading-4 text-gray-600 hover:border-gray-300 hover:bg-gray-50 hover:text-rose-600 active:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-700 dark:hover:bg-gray-900/75 dark:hover:text-rose-300 dark:active:border-gray-600">
                                Gaming
                            </a>
                            <a href="javascript:void(0)"
                                class="m-0.5 inline-flex rounded border bg-white px-2 py-1.5 text-xs font-medium leading-4 text-gray-600 hover:border-gray-300 hover:bg-gray-50 hover:text-rose-600 active:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-700 dark:hover:bg-gray-900/75 dark:hover:text-rose-300 dark:active:border-gray-600">
                                Music
                            </a>
                            <a href="javascript:void(0)"
                                class="m-0.5 inline-flex rounded border border-gray-300 bg-gray-50 px-2 py-1.5 text-xs font-medium leading-4 text-rose-600 dark:border-gray-700 dark:bg-gray-800 dark:text-rose-300">
                                Animals
                            </a>
                            <a href="javascript:void(0)"
                                class="m-0.5 inline-flex rounded border bg-white px-2 py-1.5 text-xs font-medium leading-4 text-gray-600 hover:border-gray-300 hover:bg-gray-50 hover:text-rose-600 active:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-700 dark:hover:bg-gray-900/75 dark:hover:text-rose-300 dark:active:border-gray-600">
                                Live
                            </a>
                            <a href="javascript:void(0)"
                                class="m-0.5 inline-flex rounded border bg-white px-2 py-1.5 text-xs font-medium leading-4 text-gray-600 hover:border-gray-300 hover:bg-gray-50 hover:text-rose-600 active:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-700 dark:hover:bg-gray-900/75 dark:hover:text-rose-300 dark:active:border-gray-600">
                                Web Development
                            </a>
                            <a href="javascript:void(0)"
                                class="m-0.5 inline-flex rounded border bg-white px-2 py-1.5 text-xs font-medium leading-4 text-gray-600 hover:border-gray-300 hover:bg-gray-50 hover:text-rose-600 active:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-700 dark:hover:bg-gray-900/75 dark:hover:text-rose-300 dark:active:border-gray-600">
                                Web Design
                            </a>
                            <a href="javascript:void(0)"
                                class="m-0.5 inline-flex rounded border bg-white px-2 py-1.5 text-xs font-medium leading-4 text-gray-600 hover:border-gray-300 hover:bg-gray-50 hover:text-rose-600 active:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-700 dark:hover:bg-gray-900/75 dark:hover:text-rose-300 dark:active:border-gray-600">
                                Business
                            </a>
                            <a href="javascript:void(0)"
                                class="m-0.5 inline-flex rounded border bg-white px-2 py-1.5 text-xs font-medium leading-4 text-gray-600 hover:border-gray-300 hover:bg-gray-50 hover:text-rose-600 active:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-700 dark:hover:bg-gray-900/75 dark:hover:text-rose-300 dark:active:border-gray-600">
                                Hiking
                            </a>
                            <a href="javascript:void(0)"
                                class="m-0.5 inline-flex rounded border bg-white px-2 py-1.5 text-xs font-medium leading-4 text-gray-600 hover:border-gray-300 hover:bg-gray-50 hover:text-rose-600 active:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-700 dark:hover:bg-gray-900/75 dark:hover:text-rose-300 dark:active:border-gray-600">
                                Inspiration
                            </a>
                            <a href="javascript:void(0)"
                                class="m-0.5 inline-flex rounded border bg-white px-2 py-1.5 text-xs font-medium leading-4 text-gray-600 hover:border-gray-300 hover:bg-gray-50 hover:text-rose-600 active:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-700 dark:hover:bg-gray-900/75 dark:hover:text-rose-300 dark:active:border-gray-600">
                                Motivation
                            </a>
                            <a href="javascript:void(0)"
                                class="m-0.5 inline-flex rounded border bg-white px-2 py-1.5 text-xs font-medium leading-4 text-gray-600 hover:border-gray-300 hover:bg-gray-50 hover:text-rose-600 active:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-700 dark:hover:bg-gray-900/75 dark:hover:text-rose-300 dark:active:border-gray-600">
                                Productivity
                            </a>
                        </nav>
                    </div>
                </div>
                <!-- END Tags -->

                <!-- Video List -->
                <div class="w-full p-4 mx-auto max-w-7xl lg:p-8">
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:gap-8 xl:grid-cols-4">
                        <div>
                            <a href="javascript:void(0)" class="relative block group">
                                <div
                                    class="absolute inset-0 z-10 flex items-center justify-center transition rounded opacity-0 bg-gray-800/75 group-hover:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="inline-block w-6 h-6 text-white transition hi-outline hi-play-circle group-hover:scale-150 group-active:scale-125">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                    </svg>
                                </div>
                                <div class="aspect-h-10 aspect-w-16">
                                    <img src="https://images.unsplash.com/photo-1465056836041-7f43ac27dcb5?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=350&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY2NTA1MDQ4Ng&ixlib=rb-1.2.1&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=560"
                                        alt="Video Preview" class="rounded" />
                                </div>
                            </a>
                            <div class="py-3">
                                <h4 class="font-semibold">
                                    <a href="javascript:void(0)"
                                        class="font-semibold transition hover:text-gray-700 dark:hover:text-gray-300">
                                        The best roadtrip of our lives
                                    </a>
                                </h4>
                                <h5 class="mb-2">
                                    <a href="javascript:void(0)"
                                        class="text-sm font-medium text-gray-500 transition hover:text-rose-500 hover:underline hover:underline-offset-2 dark:text-gray-400 dark:hover:text-rose-300">Into
                                        The Wild</a>
                                </h5>
                                <p class="text-xs font-medium text-gray-500 dark:text-gray-400/75">
                                    3,2k • 2 days ago
                                </p>
                            </div>
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="relative block group">
                                <div
                                    class="absolute inset-0 z-10 flex items-center justify-center transition rounded opacity-0 bg-gray-800/75 group-hover:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="inline-block w-6 h-6 text-white transition hi-outline hi-play-circle group-hover:scale-150 group-active:scale-125">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                    </svg>
                                </div>
                                <div class="aspect-h-10 aspect-w-16">
                                    <img src="https://images.unsplash.com/photo-1547314283-befb6cc5cf29?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=350&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY2NTA1MDQ4Ng&ixlib=rb-1.2.1&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=560"
                                        alt="Video Preview" class="rounded" />
                                </div>
                            </a>
                            <div class="py-3">
                                <h4 class="font-semibold">
                                    <a href="javascript:void(0)"
                                        class="font-semibold transition hover:text-gray-700 dark:hover:text-gray-300">
                                        By the water
                                    </a>
                                </h4>
                                <h5 class="mb-2">
                                    <a href="javascript:void(0)"
                                        class="text-sm font-medium text-gray-500 transition hover:text-rose-500 hover:underline hover:underline-offset-2 dark:text-gray-400 dark:hover:text-rose-300">Nature
                                        Moments</a>
                                </h5>
                                <p class="text-xs font-medium text-gray-500 dark:text-gray-400/75">
                                    17,2k • 2 days ago
                                </p>
                            </div>
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="relative block group">
                                <div
                                    class="absolute inset-0 z-10 flex items-center justify-center transition rounded opacity-0 bg-gray-800/75 group-hover:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="inline-block w-6 h-6 text-white transition hi-outline hi-play-circle group-hover:scale-150 group-active:scale-125">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                    </svg>
                                </div>
                                <div class="aspect-h-10 aspect-w-16">
                                    <img src="https://images.unsplash.com/photo-1519874950331-12655cb7ae70?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=350&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY2NTA1MDY3NQ&ixlib=rb-1.2.1&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=560"
                                        alt="Video Preview" class="rounded" />
                                </div>
                            </a>
                            <div class="py-3">
                                <h4 class="font-semibold">
                                    <a href="javascript:void(0)"
                                        class="font-semibold transition hover:text-gray-700 dark:hover:text-gray-300">
                                        Tropical animals and their life
                                    </a>
                                </h4>
                                <h5 class="mb-2">
                                    <a href="javascript:void(0)"
                                        class="text-sm font-medium text-gray-500 transition hover:text-rose-500 hover:underline hover:underline-offset-2 dark:text-gray-400 dark:hover:text-rose-300">Into
                                        The Wild</a>
                                </h5>
                                <p class="text-xs font-medium text-gray-500 dark:text-gray-400/75">
                                    2,7k • 3 days ago
                                </p>
                            </div>
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="relative block group">
                                <div
                                    class="absolute inset-0 z-10 flex items-center justify-center transition rounded opacity-0 bg-gray-800/75 group-hover:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="inline-block w-6 h-6 text-white transition hi-outline hi-play-circle group-hover:scale-150 group-active:scale-125">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                    </svg>
                                </div>
                                <div class="aspect-h-10 aspect-w-16">
                                    <img src="https://images.unsplash.com/photo-1584216514638-929205f5dd5e?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=350&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY2NTA1MDY3NQ&ixlib=rb-1.2.1&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=560"
                                        alt="Video Preview" class="rounded" />
                                </div>
                            </a>
                            <div class="py-3">
                                <h4 class="font-semibold">
                                    <a href="javascript:void(0)"
                                        class="font-semibold transition hover:text-gray-700 dark:hover:text-gray-300">
                                        The sharks are real
                                    </a>
                                </h4>
                                <h5 class="mb-2">
                                    <a href="javascript:void(0)"
                                        class="text-sm font-medium text-gray-500 transition hover:text-rose-500 hover:underline hover:underline-offset-2 dark:text-gray-400 dark:hover:text-rose-300">Nature
                                        Moments</a>
                                </h5>
                                <p class="text-xs font-medium text-gray-500 dark:text-gray-400/75">
                                    6,8k • 3 days ago
                                </p>
                            </div>
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="relative block group">
                                <div
                                    class="absolute inset-0 z-10 flex items-center justify-center transition rounded opacity-0 bg-gray-800/75 group-hover:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="inline-block w-6 h-6 text-white transition hi-outline hi-play-circle group-hover:scale-150 group-active:scale-125">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                    </svg>
                                </div>
                                <div class="aspect-h-10 aspect-w-16">
                                    <img src="https://images.unsplash.com/photo-1531804226530-70f8004aa44e?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=350&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY2NTA1MDQ4Nw&ixlib=rb-1.2.1&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=560"
                                        alt="Video Preview" class="rounded" />
                                </div>
                            </a>
                            <div class="py-3">
                                <h4 class="font-semibold">
                                    <a href="javascript:void(0)"
                                        class="font-semibold transition hover:text-gray-700 dark:hover:text-gray-300">
                                        How to mountain hiking
                                    </a>
                                </h4>
                                <h5 class="mb-2">
                                    <a href="javascript:void(0)"
                                        class="text-sm font-medium text-gray-500 transition hover:text-rose-500 hover:underline hover:underline-offset-2 dark:text-gray-400 dark:hover:text-rose-300">Nature
                                        Moments</a>
                                </h5>
                                <p class="text-xs font-medium text-gray-500 dark:text-gray-400/75">
                                    8,2k • 3 days ago
                                </p>
                            </div>
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="relative block group">
                                <div
                                    class="absolute inset-0 z-10 flex items-center justify-center transition rounded opacity-0 bg-gray-800/75 group-hover:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="inline-block w-6 h-6 text-white transition hi-outline hi-play-circle group-hover:scale-150 group-active:scale-125">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                    </svg>
                                </div>
                                <div class="aspect-h-10 aspect-w-16">
                                    <img src="https://images.unsplash.com/flagged/photo-1552035791-b3cc1632e933?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=350&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY2NTA1MDUzMQ&ixlib=rb-1.2.1&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=560"
                                        alt="Video Preview" class="rounded" />
                                </div>
                            </a>
                            <div class="py-3">
                                <h4 class="font-semibold">
                                    <a href="javascript:void(0)"
                                        class="font-semibold transition hover:text-gray-700 dark:hover:text-gray-300">
                                        The great challenge
                                    </a>
                                </h4>
                                <h5 class="mb-2">
                                    <a href="javascript:void(0)"
                                        class="text-sm font-medium text-gray-500 transition hover:text-rose-500 hover:underline hover:underline-offset-2 dark:text-gray-400 dark:hover:text-rose-300">Nature
                                        Moments</a>
                                </h5>
                                <p class="text-xs font-medium text-gray-500 dark:text-gray-400/75">
                                    7,3k • 2 days ago
                                </p>
                            </div>
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="relative block group">
                                <div
                                    class="absolute inset-0 z-10 flex items-center justify-center transition rounded opacity-0 bg-gray-800/75 group-hover:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="inline-block w-6 h-6 text-white transition hi-outline hi-play-circle group-hover:scale-150 group-active:scale-125">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                    </svg>
                                </div>
                                <div class="aspect-h-10 aspect-w-16">
                                    <img src="https://images.unsplash.com/photo-1571503929253-cc2ca9c4f27c?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=350&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY2NTA1MDUzNw&ixlib=rb-1.2.1&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=560"
                                        alt="Video Preview" class="rounded" />
                                </div>
                            </a>
                            <div class="py-3">
                                <h4 class="font-semibold">
                                    <a href="javascript:void(0)"
                                        class="font-semibold transition hover:text-gray-700 dark:hover:text-gray-300">
                                        Around the lake
                                    </a>
                                </h4>
                                <h5 class="mb-2">
                                    <a href="javascript:void(0)"
                                        class="text-sm font-medium text-gray-500 transition hover:text-rose-500 hover:underline hover:underline-offset-2 dark:text-gray-400 dark:hover:text-rose-300">Nature
                                        Moments</a>
                                </h5>
                                <p class="text-xs font-medium text-gray-500 dark:text-gray-400/75">
                                    12,1k • 2 days ago
                                </p>
                            </div>
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="relative block group">
                                <div
                                    class="absolute inset-0 z-10 flex items-center justify-center transition rounded opacity-0 bg-gray-800/75 group-hover:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="inline-block w-6 h-6 text-white transition hi-outline hi-play-circle group-hover:scale-150 group-active:scale-125">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                    </svg>
                                </div>
                                <div class="aspect-h-10 aspect-w-16">
                                    <img src="https://images.unsplash.com/photo-1494500764479-0c8f2919a3d8?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=350&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY2NTA1MDU1MQ&ixlib=rb-1.2.1&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=560"
                                        alt="Video Preview" class="rounded" />
                                </div>
                            </a>
                            <div class="py-3">
                                <h4 class="font-semibold">
                                    <a href="javascript:void(0)"
                                        class="font-semibold transition hover:text-gray-700 dark:hover:text-gray-300">
                                        The lonely tree
                                    </a>
                                </h4>
                                <h5 class="mb-2">
                                    <a href="javascript:void(0)"
                                        class="text-sm font-medium text-gray-500 transition hover:text-rose-500 hover:underline hover:underline-offset-2 dark:text-gray-400 dark:hover:text-rose-300">Nature
                                        Moments</a>
                                </h5>
                                <p class="text-xs font-medium text-gray-500 dark:text-gray-400/75">
                                    11,3k • 2 days ago
                                </p>
                            </div>
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="relative block group">
                                <div
                                    class="absolute inset-0 z-10 flex items-center justify-center transition rounded opacity-0 bg-gray-800/75 group-hover:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="inline-block w-6 h-6 text-white transition hi-outline hi-play-circle group-hover:scale-150 group-active:scale-125">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                    </svg>
                                </div>
                                <div class="aspect-h-10 aspect-w-16">
                                    <img src="https://images.unsplash.com/photo-1558469070-b0bb906830a2?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=350&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY2NTA1MDU3Mg&ixlib=rb-1.2.1&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=560"
                                        alt="Video Preview" class="rounded" />
                                </div>
                            </a>
                            <div class="py-3">
                                <h4 class="font-semibold">
                                    <a href="javascript:void(0)"
                                        class="font-semibold transition hover:text-gray-700 dark:hover:text-gray-300">
                                        Chasing the peaks
                                    </a>
                                </h4>
                                <h5 class="mb-2">
                                    <a href="javascript:void(0)"
                                        class="text-sm font-medium text-gray-500 transition hover:text-rose-500 hover:underline hover:underline-offset-2 dark:text-gray-400 dark:hover:text-rose-300">Into
                                        The Wild</a>
                                </h5>
                                <p class="text-xs font-medium text-gray-500 dark:text-gray-400/75">
                                    3,5k • 2 days ago
                                </p>
                            </div>
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="relative block group">
                                <div
                                    class="absolute inset-0 z-10 flex items-center justify-center transition rounded opacity-0 bg-gray-800/75 group-hover:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="inline-block w-6 h-6 text-white transition hi-outline hi-play-circle group-hover:scale-150 group-active:scale-125">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                    </svg>
                                </div>
                                <div class="aspect-h-10 aspect-w-16">
                                    <img src="https://images.unsplash.com/photo-1589883661923-6476cb0ae9f2?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=350&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY2NTA1MDYwNg&ixlib=rb-1.2.1&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=560"
                                        alt="Video Preview" class="rounded" />
                                </div>
                            </a>
                            <div class="py-3">
                                <h4 class="font-semibold">
                                    <a href="javascript:void(0)"
                                        class="font-semibold transition hover:text-gray-700 dark:hover:text-gray-300">
                                        Cats are evil
                                    </a>
                                </h4>
                                <h5 class="mb-2">
                                    <a href="javascript:void(0)"
                                        class="text-sm font-medium text-gray-500 transition hover:text-rose-500 hover:underline hover:underline-offset-2 dark:text-gray-400 dark:hover:text-rose-300">Animals
                                        Kingdom</a>
                                </h5>
                                <p class="text-xs font-medium text-gray-500 dark:text-gray-400/75">
                                    2,8k • 4 days ago
                                </p>
                            </div>
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="relative block group">
                                <div
                                    class="absolute inset-0 z-10 flex items-center justify-center transition rounded opacity-0 bg-gray-800/75 group-hover:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="inline-block w-6 h-6 text-white transition hi-outline hi-play-circle group-hover:scale-150 group-active:scale-125">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                    </svg>
                                </div>
                                <div class="aspect-h-10 aspect-w-16">
                                    <img src="https://images.unsplash.com/photo-1548199973-03cce0bbc87b?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=350&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY2NTA1MDYwNg&ixlib=rb-1.2.1&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=560"
                                        alt="Video Preview" class="rounded" />
                                </div>
                            </a>
                            <div class="py-3">
                                <h4 class="font-semibold">
                                    <a href="javascript:void(0)"
                                        class="font-semibold transition hover:text-gray-700 dark:hover:text-gray-300">
                                        Best dogs ever
                                    </a>
                                </h4>
                                <h5 class="mb-2">
                                    <a href="javascript:void(0)"
                                        class="text-sm font-medium text-gray-500 transition hover:text-rose-500 hover:underline hover:underline-offset-2 dark:text-gray-400 dark:hover:text-rose-300">Animals
                                        Kingdom</a>
                                </h5>
                                <p class="text-xs font-medium text-gray-500 dark:text-gray-400/75">
                                    3,9k • 4 days ago
                                </p>
                            </div>
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="relative block group">
                                <div
                                    class="absolute inset-0 z-10 flex items-center justify-center transition rounded opacity-0 bg-gray-800/75 group-hover:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="inline-block w-6 h-6 text-white transition hi-outline hi-play-circle group-hover:scale-150 group-active:scale-125">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                    </svg>
                                </div>
                                <div class="aspect-h-10 aspect-w-16">
                                    <img src="https://images.unsplash.com/photo-1527073620320-77635188c627?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=350&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY2NTA1MDY1MA&ixlib=rb-1.2.1&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=560"
                                        alt="Video Preview" class="rounded" />
                                </div>
                            </a>
                            <div class="py-3">
                                <h4 class="font-semibold">
                                    <a href="javascript:void(0)"
                                        class="font-semibold transition hover:text-gray-700 dark:hover:text-gray-300">
                                        Lions and their life
                                    </a>
                                </h4>
                                <h5 class="mb-2">
                                    <a href="javascript:void(0)"
                                        class="text-sm font-medium text-gray-500 transition hover:text-rose-500 hover:underline hover:underline-offset-2 dark:text-gray-400 dark:hover:text-rose-300">Animals
                                        Kingdom</a>
                                </h5>
                                <p class="text-xs font-medium text-gray-500 dark:text-gray-400/75">
                                    4,1k • 5 days ago
                                </p>
                            </div>
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="relative block group">
                                <div
                                    class="absolute inset-0 z-10 flex items-center justify-center transition rounded opacity-0 bg-gray-800/75 group-hover:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="inline-block w-6 h-6 text-white transition hi-outline hi-play-circle group-hover:scale-150 group-active:scale-125">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                    </svg>
                                </div>
                                <div class="aspect-h-10 aspect-w-16">
                                    <img src="https://images.unsplash.com/photo-1528652899333-492965af4854?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=350&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY2NTA1MDY1MA&ixlib=rb-1.2.1&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=560"
                                        alt="Video Preview" class="rounded" />
                                </div>
                            </a>
                            <div class="py-3">
                                <h4 class="font-semibold">
                                    <a href="javascript:void(0)"
                                        class="font-semibold transition hover:text-gray-700 dark:hover:text-gray-300">
                                        The fox is here
                                    </a>
                                </h4>
                                <h5 class="mb-2">
                                    <a href="javascript:void(0)"
                                        class="text-sm font-medium text-gray-500 transition hover:text-rose-500 hover:underline hover:underline-offset-2 dark:text-gray-400 dark:hover:text-rose-300">Animals
                                        Kingdom</a>
                                </h5>
                                <p class="text-xs font-medium text-gray-500 dark:text-gray-400/75">
                                    9,6k • 5 days ago
                                </p>
                            </div>
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="relative block group">
                                <div
                                    class="absolute inset-0 z-10 flex items-center justify-center transition rounded opacity-0 bg-gray-800/75 group-hover:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="inline-block w-6 h-6 text-white transition hi-outline hi-play-circle group-hover:scale-150 group-active:scale-125">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                    </svg>
                                </div>
                                <div class="aspect-h-10 aspect-w-16">
                                    <img src="https://images.unsplash.com/photo-1503308823166-13ce184e3007?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=350&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY2NTA1MDY1MA&ixlib=rb-1.2.1&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=560"
                                        alt="Video Preview" class="rounded" />
                                </div>
                            </a>
                            <div class="py-3">
                                <h4 class="font-semibold">
                                    <a href="javascript:void(0)"
                                        class="font-semibold transition hover:text-gray-700 dark:hover:text-gray-300">
                                        The deer is near
                                    </a>
                                </h4>
                                <h5 class="mb-2">
                                    <a href="javascript:void(0)"
                                        class="text-sm font-medium text-gray-500 transition hover:text-rose-500 hover:underline hover:underline-offset-2 dark:text-gray-400 dark:hover:text-rose-300">Animals
                                        Kingdom</a>
                                </h5>
                                <p class="text-xs font-medium text-gray-500 dark:text-gray-400/75">
                                    26,5k • 5 days ago
                                </p>
                            </div>
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="relative block group">
                                <div
                                    class="absolute inset-0 z-10 flex items-center justify-center transition rounded opacity-0 bg-gray-800/75 group-hover:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="inline-block w-6 h-6 text-white transition hi-outline hi-play-circle group-hover:scale-150 group-active:scale-125">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                    </svg>
                                </div>
                                <div class="aspect-h-10 aspect-w-16">
                                    <img src="https://images.unsplash.com/photo-1524261399568-56d8c862aaf8?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=350&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY2NTA1MDY1OA&ixlib=rb-1.2.1&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=560"
                                        alt="Video Preview" class="rounded" />
                                </div>
                            </a>
                            <div class="py-3">
                                <h4 class="font-semibold">
                                    <a href="javascript:void(0)"
                                        class="font-semibold transition hover:text-gray-700 dark:hover:text-gray-300">
                                        Into the woods
                                    </a>
                                </h4>
                                <h5 class="mb-2">
                                    <a href="javascript:void(0)"
                                        class="text-sm font-medium text-gray-500 transition hover:text-rose-500 hover:underline hover:underline-offset-2 dark:text-gray-400 dark:hover:text-rose-300">Into
                                        The Wild</a>
                                </h5>
                                <p class="text-xs font-medium text-gray-500 dark:text-gray-400/75">
                                    2,3k • 5 days ago
                                </p>
                            </div>
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="relative block group">
                                <div
                                    class="absolute inset-0 z-10 flex items-center justify-center transition rounded opacity-0 bg-gray-800/75 group-hover:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="inline-block w-6 h-6 text-white transition hi-outline hi-play-circle group-hover:scale-150 group-active:scale-125">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                    </svg>
                                </div>
                                <div class="aspect-h-10 aspect-w-16">
                                    <img src="https://images.unsplash.com/photo-1554281559-0d21d1f5073e?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=350&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY2NTA1MDY4Mg&ixlib=rb-1.2.1&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=560"
                                        alt="Video Preview" class="rounded" />
                                </div>
                            </a>
                            <div class="py-3">
                                <h4 class="font-semibold">
                                    <a href="javascript:void(0)"
                                        class="font-semibold transition hover:text-gray-700 dark:hover:text-gray-300">
                                        Most amazing animals
                                    </a>
                                </h4>
                                <h5 class="mb-2">
                                    <a href="javascript:void(0)"
                                        class="text-sm font-medium text-gray-500 transition hover:text-rose-500 hover:underline hover:underline-offset-2 dark:text-gray-400 dark:hover:text-rose-300">Animals
                                        Kingdom</a>
                                </h5>
                                <p class="text-xs font-medium text-gray-500 dark:text-gray-400/75">
                                    8,4k • 6 days ago
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END Video List -->

                    <!-- Load more -->
                    <div class="mt-8 text-center">
                        <button type="button"
                            class="inline-flex items-center justify-center gap-2 px-3 py-2 text-sm font-semibold leading-6 text-gray-800 bg-white border border-gray-300 rounded shadow-sm hover:border-gray-300 hover:bg-gray-100 hover:text-gray-800 hover:shadow focus:outline-none focus:ring focus:ring-gray-500/25 active:border-white active:bg-white active:shadow-none dark:border-gray-700/75 dark:bg-gray-900 dark:text-gray-200 dark:hover:border-gray-700 dark:hover:bg-gray-800 dark:hover:text-gray-200 dark:focus:ring-gray-700 dark:active:border-gray-900 dark:active:bg-gray-900">
                            <span>Load more..</span>
                        </button>
                    </div>
                </div>
                <!-- END Page Section -->
            </main>
            <!-- END Page Content -->

            <!-- Page Footer -->
            <footer id="page-footer" class="flex items-center border-t grow-0 border-slate-200 dark:border-slate-700">
                <div
                    class="container flex flex-col gap-2 px-4 py-6 mx-auto text-sm font-medium text-center text-gray-500 md:flex-row md:justify-between md:gap-0 md:text-start lg:px-8 xl:max-w-7xl">
                    <div>© <span class="font-semibold">TailTube</span></div>
                    <div class="inline-flex items-center justify-center">
                        <span>Crafted with</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true" class="w-4 h-4 mx-1 text-red-600">
                            <path
                                d="M9.653 16.915l-.005-.003-.019-.01a20.759 20.759 0 01-1.162-.682 22.045 22.045 0 01-2.582-1.9C4.045 12.733 2 10.352 2 7.5a4.5 4.5 0 018-2.828A4.5 4.5 0 0118 7.5c0 2.852-2.044 5.233-3.885 6.82a22.049 22.049 0 01-3.744 2.582l-.019.01-.005.003h-.002a.739.739 0 01-.69.001l-.002-.001z">
                            </path>
                        </svg>
                        <span>by
                            <a class="font-medium transition text-rose-600 hover:text-rose-700 dark:text-rose-400 dark:hover:text-rose-300"
                                href="https://pixelcave.com" target="_blank">pixelcave</a></span>
                    </div>
                </div>
            </footer>
            <!-- END Page Footer -->
        </div>
        <!-- END Page Container -->
    </div>
</body>

</html>
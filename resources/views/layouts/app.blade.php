<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ 
        isSidebarOpen: window.innerWidth >= 1024, 
        darkMode: localStorage.getItem('darkMode') === 'true', 
        userDropdownOpen: false 
    }" x-bind:class="{ 'dark': darkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Projekit' }} - Projeknya Mahasiswa Informatika</title>
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link rel="shortcut icon" href="favicon.svg" type="image/x-icon">
    <script>
        if (localStorage.getItem('darkMode') === 'true') {
            document.documentElement.classList.add('dark');
        }
    </script>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div id="page-container"
        class="mx-auto flex min-h-screen w-full min-w-[320px] flex-col bg-gray-100 transition-all duration-300 ease-out dark:bg-gray-800 dark:text-gray-200 lg:ps-64"
        x-bind:class="{ 'lg:ps-64': isSidebarOpen }">
        <x-sidebar />
        <x-header />
        <main id="page-content" class="flex flex-col flex-auto max-w-full pt-16">
            <x-tag-list />
            {{ $slot }}
        </main>
        <x-footer />
    </div>
    @livewireScripts
</body>

</html>
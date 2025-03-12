<x-layout.base :title="$title ?? null">
    <div id="page-container"
        class="mx-auto flex min-h-screen w-full min-w-[320px] flex-col bg-gray-100 transition-all duration-300 ease-out dark:bg-gray-800 dark:text-gray-200 lg:ps-64"
        x-bind:class="{ 'lg:ps-64': isSidebarOpen }">
        <x-sidebar />
        <x-header />
        <main id="page-content" class="flex flex-col flex-auto max-w-full pt-16">
            @livewire('tag-list')
            {{ $slot }}
        </main>
        <x-footer />
    </div>
</x-layout.base>

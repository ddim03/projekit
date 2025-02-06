<a href="{{ $href }}" wire:navigate x-on:click="if(window.innerWidth < 1024) isSidebarOpen = false"
    class="group flex items-center gap-2 px-5 py-0.5 text-sm font-medium {{ $active ? 'border-r-4 border-blue-400 bg-blue-100 text-blue-900 dark:bg-blue-700 dark:text-blue-100' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-900 active:bg-gray-50 dark:text-gray-200 dark:hover:bg-blue-700 dark:hover:text-blue-200' }}">
    <span class="flex items-center flex-none opacity-75">
        {{ $slot }}
    </span>
    <span class="py-2 grow">{{ $name }}</span>
</a>
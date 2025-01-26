<div class="shadow-sm bg-gray-50 dark:bg-gray-900/50">
    <div class="w-full px-4 py-2 mx-auto max-w-7xl lg:px-8 lg:py-5">
        <nav class="-m-0.5">
            <a href="javascript:void(0)"
                class="m-0.5 inline-flex rounded border bg-white px-2 py-1.5 text-xs font-medium leading-4 text-gray-600 hover:border-gray-300 hover:bg-gray-50 hover:text-blue-600 active:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-700 dark:hover:bg-gray-900/75 dark:hover:text-blue-300 dark:active:border-gray-600">
                All
            </a>
            @php
            $tags = App\Models\Tag::pluck('name', 'slug')->toArray();
            @endphp
            @foreach ($tags as $slug => $name)
            <a href="{{ route('tag', $slug) }}"
                class="m-0.5 inline-flex rounded border bg-white px-2 py-1.5 text-xs font-medium leading-4 text-gray-600 hover:border-gray-300 hover:bg-gray-50 hover:text-blue-600 active:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-700 dark:hover:bg-gray-900/75 dark:hover:text-blue-300 dark:active:border-gray-600">
                {{ $name }}
            </a>
            @endforeach
        </nav>
    </div>
</div>
<div class="w-full p-4 mx-auto max-w-7xl lg:p-8">
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:gap-8 xl:grid-cols-4">
        @forelse ($projects as $project)
        <x-project-card :project="$project" />
        @empty
        <div>No projects found</div>
        @endforelse
    </div>
    <!-- Load more -->
    <div class="mt-8 text-center">
        <button type="button"
            class="inline-flex items-center justify-center gap-2 px-3 py-2 text-sm font-semibold leading-6 text-gray-800 bg-white border border-gray-300 rounded shadow-sm hover:border-gray-300 hover:bg-gray-100 hover:text-gray-800 hover:shadow focus:outline-none focus:ring focus:ring-gray-500/25 active:border-white active:bg-white active:shadow-none dark:border-gray-700/75 dark:bg-gray-900 dark:text-gray-200 dark:hover:border-gray-700 dark:hover:bg-gray-800 dark:hover:text-gray-200 dark:focus:ring-gray-700 dark:active:border-gray-900 dark:active:bg-gray-900">
            <span>Load more..</span>
        </button>
    </div>
</div>
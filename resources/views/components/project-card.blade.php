<div>
    <a href="javascript:void(0)" class="relative block group">
        <div
            class="absolute inset-0 z-10 flex items-center justify-center transition rounded opacity-0 bg-gray-800/50 group-hover:opacity-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-white size-6" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-arrow-up-right">
                <path d="M7 7h10v10" />
                <path d="M7 17 17 7" />
            </svg>
        </div>
        <div class="aspect-h-10 aspect-w-16">
            <img src="{{ $project->image_path }}" alt="{{ $project->title }}" class="rounded" />
        </div>
    </a>
    <span
        class="inline-flex mt-2 items-center gap-x-1.5 py-0.5 px-2 rounded-sm text-xs font-medium border border-blue-200 bg-blue-200 text-blue-800 shadow-sm dark:bg-blue-900 dark:border-blue-700 dark:text-blue-100">
        {{ $project->category->name }}
    </span>
    <div class="py-1">
        <h4 class="font-semibold">
            <a href="javascript:void(0)" class="font-semibold transition hover:text-gray-700 dark:hover:text-gray-300">
                {{ Str::limit($project->title, 30) }}
            </a>
        </h4>
        <h5 class="mb-2">
            <a href="javascript:void(0)"
                class="text-sm font-medium text-gray-500 transition hover:text-blue-500 hover:underline hover:underline-offset-2 dark:text-gray-400 dark:hover:text-blue-300">{{
                $project->user->name }}</a>
        </h5>
        <p class="text-xs font-medium text-gray-500 dark:text-gray-400/75">
            {{ $project->likes_count }} Likes • {{ $project->created_at->diffForHumans() }}
        </p>
    </div>
</div>
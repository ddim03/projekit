<div class="w-full p-4 mx-auto max-w-7xl lg:p-8">
    <div class="grid grid-cols-1 gap-4 mb-10 md:grid-cols-2 lg:gap-8 xl:grid-cols-4">
        @forelse ($projects as $project)
        <x-project-card :project="$project" />
        @empty
        <div>No projects found</div>
        @endforelse
    </div>
    {{ $projects->links() }}
</div>
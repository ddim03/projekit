<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class FavoriteProjects extends Component
{
    use WithPagination;
    public function render()
    {
        $projects = Project::withDetails()
            ->orderBy('likes_count', 'desc')
            ->paginate(12)
            ->onEachSide(1);

        return view('livewire.project-list', ['projects' => $projects])
            ->title('Favorite');
    }
}

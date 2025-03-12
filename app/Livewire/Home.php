<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;
    public function render()
    {
        $projects = Project::withDetails()
            ->paginate(12)
            ->onEachSide(1);
        return view('livewire.project-list', ['projects' => $projects]);
    }
}

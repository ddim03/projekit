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
        $projects = Project::with('user:id,name', 'category:id,name')
            ->withCount('likes')
            ->orderBy('id', 'desc')
            ->paginate(12)
            ->onEachSide(1);
        return view('livewire.home', ['projects' => $projects]);
    }
}

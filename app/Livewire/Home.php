<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class Home extends Component
{

    public function render()
    {
        $projects = Project::with('category', 'tags', 'likes', 'user')->cursorPaginate(12);
        return view('livewire.home', compact('projects'));
    }
}

<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectsByCategory extends Component
{
    use WithPagination;

    public $category;

    public function mount(string $slug)
    {
        $this->category = Category::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        $projects = Project::where('category_id', $this->category->id)
            ->withDetails()
            ->paginate(12)
            ->onEachSide(1);

        return view('livewire.project-list', ['projects' => $projects])
            ->title($this->category->name);
    }
}

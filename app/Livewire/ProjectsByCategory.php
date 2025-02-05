<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectsByCategory extends Component
{
    use WithPagination;

    public $categoryId;

    public function mount(string $slug)
    {
        $this->categoryId = Category::where('slug', $slug)->firstOrFail()->id;
    }

    public function render()
    {
        $projects = Project::where('category_id', $this->categoryId)
            ->withDetails()
            ->paginate(12)
            ->onEachSide(1);

        return view('livewire.project-list', ['projects' => $projects]);
    }
}

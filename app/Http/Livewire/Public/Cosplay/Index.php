<?php

namespace App\Http\Livewire\Public\Cosplay;

use App\Models\Post as CosplayModel;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.public.cosplay.index', [
            'posts' => CosplayModel::where('title', 'like', '%'.$this->search.'%')
                                    ->orderBy('created_at', 'desc')
                                    ->paginate(20),
        ]);
    }
}

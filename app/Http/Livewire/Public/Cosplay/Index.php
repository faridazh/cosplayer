<?php

namespace App\Http\Livewire\Public\Cosplay;

use App\Models\Post as CosplayModel;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $is_hidden = false;
    public $is_approved = true;
    public $is_nsfw = true;
    public $paginate = 20;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.public.cosplay.index', [
            'posts' => CosplayModel::where('title', 'like', '%'.$this->search.'%')
                ->where('is_hidden', $this->is_hidden)
                ->where('is_approved', $this->is_approved)
                ->where('is_nsfw', $this->is_nsfw)
                ->orderBy('created_at', 'desc')
                ->paginate($this->paginate),
        ]);
    }
}

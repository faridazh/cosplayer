<?php

namespace App\Http\Livewire\Public\Cosplayer;

use App\Models\Cosplayer as CosplayerModel;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $paginate = 20;

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.public.cosplayer.index', [
            'cosplayers' => CosplayerModel::where('name', 'like', '%'.$this->search.'%')
                                            ->orderBy('created_at', 'desc')
                                            ->paginate($this->paginate),
        ]);
    }
}

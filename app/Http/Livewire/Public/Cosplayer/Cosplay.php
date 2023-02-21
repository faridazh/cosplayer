<?php

namespace App\Http\Livewire\Public\Cosplayer;

use App\Models\Cosplayer;
use Livewire\Component;

class Cosplay extends Component
{
    public $cosplayer;

    public $is_hidden = false;
    public $is_approved = true;
    public $is_nsfw = true;
    public $paginate = 20;

    public function mount(Cosplayer $cosplayer)
    {
        $this->cosplayer = $cosplayer;
    }

    public function render()
    {
        return view('livewire.public.cosplayer.cosplay', [
            'posts' => $this->cosplayer->posts()->latest()
                ->where('is_hidden', $this->is_hidden)
                ->where('is_approved', $this->is_approved)
                ->where('is_nsfw', $this->is_nsfw)
                ->paginate($this->paginate),
        ]);
    }
}

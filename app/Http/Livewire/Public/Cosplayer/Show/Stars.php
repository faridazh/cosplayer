<?php

namespace App\Http\Livewire\Public\Cosplayer\Show;

use App\Models\Cosplayer;
use App\Models\CosplayerStar;
use Livewire\Component;

class Stars extends Component
{
    public $cosplayer;

    public function mount(Cosplayer $cosplayer)
    {
        $this->cosplayer = $cosplayer;
    }
    public function render()
    {
        return view('livewire.public.cosplayer.show.stars');
    }

    public function GiveCosplayerStar()
    {
        $givestar = new CosplayerStar();

        if (empty($this->cosplayer->stared()))
        {
            $givestar->star($this->cosplayer->id, auth()->user()->id);
            $this->cosplayer->countStars();
        }
        else {
            $givestar->unstar($this->cosplayer->id, auth()->user()->id);
            $this->cosplayer->countStars();
        }
    }
}

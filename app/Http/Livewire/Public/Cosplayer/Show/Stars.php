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
            $givestar->star(auth()->user()->id, $this->cosplayer->id);
            $this->cosplayer->countStars();
        }
        else {
            $givestar->unstar(auth()->user()->id, $this->cosplayer->id);
            $this->cosplayer->countStars();
        }
    }
}

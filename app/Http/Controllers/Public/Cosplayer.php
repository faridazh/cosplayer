<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
USE App\Models\Cosplayer as CosplayerModel;
use Illuminate\Http\Request;

class Cosplayer extends Controller
{
    protected $page_title = 'Cosplayer';

    public function index()
    {
        return view('public.cosplayer.index', [
            'page_title' => $this->page_title,
            'cosplayers' => CosplayerModel::paginate(20),
        ]);
    }

    public function showWithSlug(CosplayerModel $cosplayer, $slug)
    {
        if ($slug != $cosplayer->slug) {
            return redirect()->route('public.cosplayer.show', [$cosplayer->id]);
        }

        return view('public.cosplayer.show', [
            'page_title' => $cosplayer->name,
            'cosplayer' => $cosplayer,
        ]);
    }

    public function show(CosplayerModel $cosplayer)
    {
        return redirect()->route('public.cosplayer.showWithSLug', [$cosplayer->id, $cosplayer->slug]);
    }
}

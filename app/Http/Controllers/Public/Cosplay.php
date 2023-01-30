<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post as CosplayModel;
use Illuminate\Http\Request;

class Cosplay extends Controller
{
    protected $page_title = 'Cosplay';

    public function index()
    {
        return view('public.cosplay.index', [
            'page_title' => $this->page_title,
            'posts' => CosplayModel::orderBy('created_at', 'desc')->paginate(),
        ]);
    }

    public function showWithSlug(CosplayModel $post, $slug)
    {
        if ($slug != $post->slug)
        {
            return redirect()->route('public.cosplay.show', [$post->id]);
        }

        return view('public.cosplay.show', [
            'page_title' => $this->page_title,
            'post' => $post,
        ]);
    }

    public function show(CosplayModel $post)
    {
        return redirect()->route('public.cosplay.showWithSlugWithCosplayer', [$post->id, $post->slug, $post->cosplayer->slug]);
    }
}

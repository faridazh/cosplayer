<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class Cosplay extends Controller
{
    protected $page_title = 'Cosplay';

    public function __invoke()
    {
        return view('public.cosplay', [
            'page_title' => $this->page_title,
            'posts' => Post::paginate(),
        ]);
    }
}

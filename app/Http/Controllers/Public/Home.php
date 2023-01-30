<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\WebStatistic;

class Home extends Controller
{
    protected $page_title = null;

    public function __invoke()
    {
        $webStats = WebStatistic::select('attribute', 'value');

        $hidden = 0;
        $approved = 1;

        return view('public.homepage', [
            'page_title' => $this->page_title,
            'totalUsers' => $webStats->where('attribute', 'users')->first(),
            'totalCosplayers' => $webStats->Where('attribute', 'cosplayers')->first(),
            'posts' => Post::where('is_approved', $approved)->where('is_hidden', $hidden)->limit(5)->get(),
        ]);
    }
}

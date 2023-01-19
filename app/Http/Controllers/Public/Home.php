<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\WebStatistic;
use Illuminate\Http\Request;

class Home extends Controller
{
    protected $page_title = null;
    public function __invoke()
    {
        $webStats = WebStatistic::select('attribute', 'value');

        return view('public.homepage', [
            'page_title' => $this->page_title,
            'users' => $webStats->where('attribute', 'users')->first(),
            'cosplayers' => $webStats->Where('attribute', 'cosplayers')->first(),
        ]);
    }
}

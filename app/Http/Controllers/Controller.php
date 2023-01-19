<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected $page_title = null;

    public function __invoke()
    {
        return view('public.homepage', [
            'page_title' => $this->page_title,
        ]);
    }
}

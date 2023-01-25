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
            'posts' => CosplayModel::paginate(),
        ]);
    }
}

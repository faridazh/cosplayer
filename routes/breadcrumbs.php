<?php

use App\Models\Cosplayer as CosplayerModel;
use App\Models\Post as CosplayModel;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('homepage', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('homepage'));
});

// Home > Cosplayer
Breadcrumbs::for('public.cosplayer.index', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push('Cosplayer', route('public.cosplayer.index'));
});
// Home > Cosplay
Breadcrumbs::for('public.cosplay.index', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push('Cosplay', route('public.cosplay.index'));
});
// Home > Cosplayer > [Cosplayer]
Breadcrumbs::for('public.cosplayer.showWithSlug', function (BreadcrumbTrail $trail, CosplayerModel $cosplayer) {
    $trail->parent('public.cosplayer.index');
    $trail->push($cosplayer->name, route('public.cosplayer.showWithSlug', [$cosplayer->id, $cosplayer->slug]));
});
// Home > Cosplayer > Cosplay > [Cosplay]
Breadcrumbs::for('public.cosplay.showWithSlug', function (BreadcrumbTrail $trail, CosplayModel $cosplay) {
    $trail->parent('public.cosplayer.index');
    $trail->push($cosplay->cosplayer->name, route('public.cosplayer.showWithSlug', [$cosplay->cosplayer->id, $cosplay->cosplayer->slug]));
    $trail->push('Cosplay', route('public.cosplay.index'));
    $trail->push($cosplay->title, route('public.cosplay.showWithSlug', [$cosplay->id, $cosplay->slug]));
});

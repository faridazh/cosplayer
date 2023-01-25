<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Public\Cosplayer as CosplayerController;
use App\Http\Controllers\Public\Cosplay as CosplayController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require_once __DIR__ . '/auth.php';

Route::middleware(['auth'])->group(function () {
    //
});

Route::get('/', \App\Http\Controllers\Public\Home::class)->name('homepage');

Route::name('public')->group(function () {
    Route::controller(CosplayerController::class)->name('.cosplayer')->group(function () {
        Route::get('/cosplayer', 'index')->name('.index');
        Route::get('/cosplayer/{cosplayer:id}-{slug}', 'showWithSlug')->name('.showWithSlug');
        Route::get('/cosplayer/{cosplayer:id}', 'show')->name('.show');
    });

    Route::controller(CosplayController::class)->name('.cosplay')->group(function () {
        Route::get('/cosplay', 'index')->name('.index');
        Route::get('/cosplay/{post:id}-{slug}', 'showWithSlug')->name('.showWithSlug');
        Route::get('/cosplay/{post:id}', 'show')->name('.show');
    });
});

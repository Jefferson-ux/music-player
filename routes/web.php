<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;

Route::get('/', [SongController::class, 'index'])->name('song.index');

Route::get('/music/{song}', [SongController::class, 'show'])->name('song.show');


// Route::resource('/', SongController::class);

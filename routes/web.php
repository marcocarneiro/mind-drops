<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\{
	ShowDrops
};


Route::get('/', function () {
    return view('auth.login');
});

Route::get('drops', [ShowDrops::class, 'show'])->middleware(['auth:sanctum', 'verified'])
    ->name('drops');

/* Route::post('createDrop', [ShowDrops::class, 'create'])->middleware(['auth:sanctum', 'verified'])
    ->name('createDrop'); */

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


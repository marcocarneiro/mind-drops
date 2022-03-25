<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\{
	ShowDrops
};


Route::get('/', function () {
    return view('auth.login');
});

/* Route::get('drops', ShowDrops::class)->middleware(['auth:sanctum', 'verified'])
    ->name('drops'); */

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('fortify/login', ShowDrops::class)
->middleware(['auth']);
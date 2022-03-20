<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\{
	ShowDrops
};


Route::get('/', function () {
    return view('welcome');
});

Route::get('drops', ShowDrops::class);

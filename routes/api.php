<?php

use Illuminate\Support\Facades\Route;
use App\Models\JenisMakanan;
use App\Models\JenisOlahraga;

Route::get('/makanan', function () {
    return JenisMakanan::all();
})->name('api.makanan');

Route::get('/jenisolahraga', function () {
    return JenisOlahraga::all();
})->name('api.jenisolahraga');


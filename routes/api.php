<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// 1. Import semua Resource Filament yang ingin Anda ekspos sebagai API
use App\Filament\Resources\JenisMakananResource;
use App\Filament\Resources\JadwalOlahragaResource;
use App\Filament\Resources\JenisOlahragaResource;
use App\Filament\Resources\BmiLogResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Di sini Anda bisa mendaftarkan rute API untuk aplikasi Anda. Rute-rute
| ini dimuat oleh RouteServiceProvider dan semuanya akan
| diberi prefix '/api'.
|
*/

// Grup ini menambahkan awalan /api/admin ke semua endpoint di dalamnya
Route::prefix('admin')->group(function () {
    
    // 2. Daftarkan semua endpoint untuk setiap resource dengan satu baris.
    // Ini adalah cara yang direkomendasikan jika Anda menggunakan Filament API Service.
    // Setiap baris ini secara otomatis membuat endpoint GET, POST, PUT, dan DELETE.
    JenisMakananResource::routes();
    JadwalOlahragaResource::routes();
    JenisOlahragaResource::routes();
    BmiLogResource::routes(); // Menambahkan BMI Log juga

});

// Endpoint default untuk mendapatkan user yang sedang login (jika diperlukan)
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

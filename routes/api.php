<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JenisOlahragaController;
use App\Http\Controllers\JenisMakananController;
use App\Models\JenisOlahraga;

// 🔓 Endpoint login tanpa auth
Route::post('/auth/login', [AuthController::class, 'login']);

// 🔒 Semua route berikut butuh token Sanctum
Route::middleware(['auth:sanctum'])->group(function () {

    // Endpoint logout
    Route::post('/auth/logout', [AuthController::class, 'logout']);

    // ✅ Proteksi berdasarkan ROLE 'admin'
    Route::middleware('role:admin')->group(function () {
        // Jenis Olahraga endpoints
        Route::get('/admin/jenis-olahragas', [JenisOlahragaController::class, 'index']);
        Route::post('/admin/jenis-olahragas', [JenisOlahragaController::class, 'store']);
        Route::put('/admin/jenis-olahragas/{id}', [JenisOlahragaController::class, 'update']);
        Route::delete('/admin/jenis-olahragas/{id}', [JenisOlahragaController::class, 'destroy']);

        // Jenis Makanan endpoints
        Route::get('/admin/jenis-makanans', [JenisMakananController::class, 'index']);
        Route::post('/admin/jenis-makanans', [JenisMakananController::class, 'store']);
        Route::put('/admin/jenis-makanans/{id}', [JenisMakananController::class, 'update']);
        Route::delete('/admin/jenis-makanans/{id}', [JenisMakananController::class, 'destroy']);
    });

    // ✅ Alternatif proteksi berdasarkan permission langsung (tanpa pakai controller)
    Route::get('/admin/jenis-olahragas-permission', function () {
        return response()->json([
            'success' => true,
            'message' => 'Data jenis olahraga berhasil diambil.',
            'data' => JenisOlahraga::all()
        ]);
    })->middleware('permission:view jenis olahraga');
});

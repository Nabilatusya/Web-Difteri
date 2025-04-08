<?php

use App\Http\Controllers\DataDifteriController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\Tahuncontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('/data-difteri', DataDifteriController::class);
    //tahun
Route::apiResource('/tahun', Tahuncontroller::class);
    //kecamatan
Route::apiResource('/kecamatan', KecamatanController::class);

Route::get('/difteri/clustering', [DataDifteriController::class, 'getClusteringData']);


//autentikasi login, register, logout

//autentikasi login, register, dan logout
//memastikan hanya user yang bisa login bisa mengakses CRUD Data
// Route::middleware('auth:sanctum')->group(function () {
//     //data difteri
//     // Route::apiResource('/data-difteri', DataDifteriController::class);
//     // //tahun
//     // Route::apiResource('/tahun', Tahuncontroller::class);
//     // //kecamatan
//     // Route::apiResource('/kecamatan', KecamatanController::class);
// });

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::get('/user', function (Request $request) {
//     return 'kamu pasti bisa bitus';
// });

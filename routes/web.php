<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\Tahuncontroller;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\PuskesmasController;
use App\Http\Controllers\ClusteringController;
use App\Http\Controllers\DataDifteriController;

Auth::routes();

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function(){
    return view('layouts.landing_page');
})->name('landingpage');

// Proteksi halaman dashboard agar hanya admin bisa mengakses
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('layouts.admin.dashboard_admin.peta_kerawanan');
    });

    //data_puskemas
    Route::resource('puskesmas', PuskesmasController::class);
    Route::get('/index/puskesmas', [PuskesmasController::class, 'index'])->name('puskesmas.index');

    //data_kecamatan
    Route::resource('kecamatan', KecamatanController::class);
    Route::get('/index/kecamatan', [KecamatanController::class, 'index'])->name('kecamatan.index');

    //data_difteri
    Route::resource('data-difteri', DataDifteriController::class);
    // Route::get('/peta-kerawanan/{year}', [DataDifteriController::class, 'getClusteringData']);

    //data_tahun
    Route::resource('tahun', Tahuncontroller::class);

    //visualisasi pemetaan
    Route::get('/peta-difteri', function () {
        return view('layouts.admin.dashboard_admin.peta_kerawanan'); // Pastikan file ini ada di resources/views
    })->name('peta.difteri');

    //visualisasi pemataan tapi pake leaflet - mapping blade
    Route::get('/mapping-difteri', function(){
        return view('layouts.admin.dashboard_admin.mapping');
    })->name('mapping-difteri');

    // Route::get('/mapping-difteri/{year}', [MapController::class, 'showMap'])->name('mapping-difteri');

    //visualisasi grafik persebaran
    Route::get('/grafik/difteri', function () {
        return view('layouts.admin.dashboard_admin.grafik_persebaran'); // Pastikan file ini ada di resources/views
    })->name('grafik.difteri');

    //route jumlah kasus di peta_kerawanan
    //Route::get('/peta-kerawanan', [DataDifteriController::class, 'petaKerawanan'])->name('peta.kerawanan');

    //peta kerawanan
    // Route::get('/map/{year}', [MapController::class, 'showMap'])->name('map.show');

    Route::get('/difteri/clustering', [DataDifteriController::class, 'getClusteringData'])->name('datadifteri.clustering');
});


//user-puskesmas
Route::get('/user/index/puskesmas', [PuskesmasController::class, 'indexUser'])->name('user.puskesmas.index');
Route::get('/puskesmas/profile/{id}', [PuskesmasController::class, 'profile'])->name('puskesmas.profile');

//user-kecamatan
Route::get('/user/index/kecamatan', [KecamatanController::class, 'indexUser'])->name('user.kecamatan.index');

//user-grafik-persebaran
Route::get('/user/index/grafik', function () {
    return view('layouts.user.grafik_persebaran.index_grafik'); // Pastikan file ini ada di resources/views
})->name('user.grafik.index');

//user-tren-kasus
Route::get('/user/index/tren', [KecamatanController::class, 'trenKecamatan'])->name('user.tren.kecamatan');
//Route::get('/user/index/tren', function () {
//     return view('layouts.user.grafik_persebaran.index_tren_kasus'); // Pastikan file ini ada di resources/views
// })->name('user.tren.index');

//user peta persebaran
Route::get('/peta-khusus', function () {
    return view('layouts.user.peta_khusus.peta_difteri'); // Pastikan file ini ada di resources/views
})->name('peta.khusus');

//user-data difteri
Route::get('/data-klaster', [DataDifteriController::class, 'indexUser'])->name('data.klaster');




// Route::get('/puskesmas', function(){
//     return view('layouts.user.puskesmas.puskesmas_index');
// })->name('puskesmas');




// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/coba', function () {
//     return 'Helooo bituss';
// });

// // Route::get('/coba', function (){
// //     return view('coba', ['data' =>  'bisa kok ngerjain skripsinya']);
// // });


// //route view gabisa menggunakan data dynamic, bisanya data static
// //gunakan ini ketika hanya ingin menampilkan halaman saja,
// Route::view('/coba', 'coba', ['data' => 'ini kalo pake route view']);

// //misal ambil data dari db
// //sedangkan kalo ini pake route view, dia gabisa pake data dynamic
// Route::get('/coba', function (){
//     //ini db nya
//     $difteri = 'merupakan penyakit menular';
//     //terus lgsg panggil aja pake $
//     return view('coba', ['data' =>  $difteri]);
// });

//membuat route yang ada paramater misal coba/1
Route::get('/coba/{id}', function ($id){
    return 'ini adalah coba '.$id;
})->name('coba');

// //route $erequest
// Route::get('/coba', function (Request $request){
//     return redirect()->route('coba');
// });

//route controller
Route::get('/coba', [KelasController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\TerminController;
use App\Http\Controllers\Backend\BankController;

use Illuminate\Support\Facades\File;

use Illuminate\Http\Response;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// cek


require_once 'web_storage.php';

// still figuring out kenapa ini gabisa masuk ke function prefix manage
Route::get('credit-request/{id}/confirm', [CreditRequestController::class], 'confirm')->name('manage.credit-request.confirm');
Route::get('credit-request/{id}/redirect',[CreditRequestController::class],'redirect')->name('manage.credit-request.redirect');
Route::get('credit-request/{id}/accept',[CreditRequestController::class],'accept')->name('manage.credit-request.accept');
Route::get('credit-request/{id}/pending',[CreditRequestController::class],'pending')->name('manage.credit-request.pending');
Route::get('credit-request/{id}/reject',[CreditRequestController::class],'reject')->name('manage.credit-request.reject');

#suspect untuk route manage.credit-request.show
#found a problem in Api/CreditRequestController.php, need to explicity declare the name route i guess
Route::get('credit-request',[CreditRequestController::class], 'show')->name('manage.credit-request.show');
#or
Route::get('credit-request/{id}/show',[CreditRequestController::class], 'show')->name('manage.credit-request.show');
#lebih make sense yg bawahhhh ini but didnt find any "{id}/show" route di file project sebelumnya



// Route::resource('manage/credit-request',CreditRequestController::class);


Route::middleware('auth:sanctum')->prefix('manage')->group(function () {
    // Route::resource('credit-request',CreditRequestController::class);



    Route::resource('/', HomeController::class);

    Route::middleware('admin0123')->group(function () {
        // semua admin -------------

        // Dashboard
        // Modul Data

        // KUR
        // Pengajuan KUR
        // Riwayat Pengajuan


        Route::middleware('admin01')->group(function () {
            // hanya admin 0 1 (ojk dan bank) ------------

            // Master Data
            // Pengguna


            Route::middleware('superadmin0')->group(function () {
                // hanya admin 0 (ojk) ------------

                // DADHBOARD
                // Data Visualisasi Statistik

                // MASTER DATA CRUD
                Route::resource('bank', BankController::class);
                // Jenis Usaha ()
                Route::resource('business-type', BusinessTypeController::class);
                // Izin Usaha
                Route::resource('business-permit',BusinessPermitController::class);
                // Jenis KUR
                Route::resource('kur-type',KurTypeController::class);
                // Termin
                Route::resource('termin', TerminController::class);

                // MEMBER
                // Data Member


                // CONTENT MANAJ SYSTEM
                // Kategori Berita
                Route::resource('news-category',NewsCategoryController::class);
                // Berita
                Route::resource('news', NewsController::class);
                // Profil dan Syarat KUR (suspect)
                Route::resource('requirement', RequirementController::class);
                // FaQ
                Route::resource('faq',FaqController::class);
                // Testimoni ()
                Route::resource('testimoni',TestimonialController::class);




            });

        });

    });
});





Route::get('/login', function () {
    return view('auth.login'); // Nama view yang akan ditampilkan
})->name('login'); // Anda bisa memberikan nama rute (Opsional)


// Route::prefix('manage')->group(function () {
//     Route::resource('termin', TerminController::class);
// });



// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/h', function () {
//     // return view('welcome');
//     return view('backend.pages.testimoni.index');
// });

// Route::resource('/testimoni', TestimonialController::class);
// Route::get('testimoni', TestimonialController::class);


// Route::middleware('auth:sanctum')->group(function () {

//     // Route::resource('/', HomeController::class);

//     Route::middleware('admin')->group(function () {

//         Route::resource('termin', TerminController::class)->names([
//             'index' => 'api.termin.index',
//             'destroy' => 'api.termin.destroy',
//         ]);

//     });
// });


// Route::prefix('manage')->group(function () {
//     Route::resource('/', HomeController::class);
// });

// Route::get('/', function () {
//     return response()->json([
//         'status' => false,
//         'message' => "akses gaboleh krn belum login. routes/api cok"
//     ],401);
// })->name('login');

// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');




// Route::get('/', [HomeController::class, 'index']);
// Route::resource('/', HomeController::class);

// Route::get('/cek',[HomeController::class, 'index']);


// Route::resource('/', HomeController::class);





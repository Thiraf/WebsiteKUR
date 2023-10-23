<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\TerminController;
use App\Http\Controllers\Backend\BankController;
use App\Http\Controllers\Backend\BusinessTypeController;

use Illuminate\Support\Facades\File;

use Illuminate\Http\Response;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\BusinessType;

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
require_once 'web_storage.php';

// route login register (bisa dipake)
// note : pas register ada kolom role, tapi, rolenya masi error, jadi masuk ke db default 0
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');


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


// Route::middleware('auth')->prefix('manage')->group(function () {
//     // Route::resource('credit-request',CreditRequestController::class);



//     Route::resource('/', HomeController::class);

//     Route::middleware('admin0123')->group(function () {
//         // semua admin -------------

//         // Dashboard
//         // Modul Data

//         // KUR
//         // Pengajuan KUR
//         // Riwayat Pengajuan


//         Route::middleware('admin01')->group(function () {
//             // hanya admin 0 1 (ojk dan bank) ------------

//             // Master Data
//             // Pengguna


//             Route::middleware('superadmin0')->group(function () {
//                 // hanya admin 0 (ojk) ------------

//                 // DADHBOARD
//                 // Data Visualisasi Statistik

//                 // MASTER DATA CRUD
//                 Route::resource('bank', BankController::class);
//                 // Jenis Usaha ()
//                 Route::resource('business-type', BusinessTypeController::class);
//                 // Izin Usaha
//                 Route::resource('business-permit',BusinessPermitController::class);
//                 // Jenis KUR
//                 Route::resource('kur-type',KurTypeController::class);
//                 // Termin
//                 Route::resource('termin', TerminController::class);

//                 // MEMBER
//                 // Data Member


//                 // CONTENT MANAJ SYSTEM
//                 // Kategori Berita
//                 Route::resource('news-category',NewsCategoryController::class);
//                 // Berita
//                 Route::resource('news', NewsController::class);
//                 // Profil dan Syarat KUR (suspect)
//                 Route::resource('requirement', RequirementController::class);
//                 // FaQ
//                 Route::resource('faq',FaqController::class);
//                 // Testimoni ()
//                 Route::resource('testimoni',TestimonialController::class);




//             });

//         });

//     });
// });

// Route::resource('termin', TerminController::class);
// Route::resource('testimoni',TestimonialController::class);


Route::middleware('auth')->prefix('manage')->name('manage.')->group(function () {
// Route::prefix('manage')->name('manage.')->group(function () {
    // Route::resource('credit-request',CreditRequestController::class);
    Route::resource('/', HomeController::class);

    // Route::middleware('admin0123')->group(function () {
        // semua admin -------------

        // Dashboard
        // Modul Data

        // KUR
        // Pengajuan KUR
        // Riwayat Pengajuan
        Route::resource('credit-request', CreditRequestController::class, [
            'names' => 'manage.credit-request'
        ]);
        Route::get('credit-request/history', [CreditRequestController::class, 'history'])->name('credit-request.history');

        Route::get('manage/credit-request', [CreditRequestController::class, 'index'])->name('credit-request.index');

        Route::get('credit-request/export', [CreditRequestController::class, 'exportExcel'])->name('credit-request.export');


        // Route::middleware('admin01')->group(function () {
            // hanya admin 0 1 (ojk dan bank) ------------

            // Master Data
            // Pengguna
            Route::resource('user', UserController::class, [
                'names' => 'user'
            ]);



            // Route::middleware('superadmin0')->group(function () {
                // hanya admin 0 (ojk) ------------

                // DADHBOARD
                // Data Visualisasi Statistik

                // MASTER DATA CRUD
                Route::resource('bank', BankController::class);
                Route::get('bank', [BankController::class, 'index'])->name('bank.index');

                // Jenis Usaha ()
                Route::resource('business-type', BusinessTypeController::class);
                // Route::resource('business-type', BusinessTypeController::class, [
                //     'names' => 'manage.business-type'
                // ]);

                // Izin Usaha
                Route::resource('business-permit',BusinessPermitController::class);
                // Route::resource('business-permit', BusinessPermitController::class, [
                //     'names' => [
                //         'index' => 'manage.business-permit.index',
                //         'create' => 'manage.business-permit.create',
                //         'store' => 'manage.business-permit.store',
                //         'show' => 'manage.business-permit.show',
                //         'edit' => 'manage.business-permit.edit',
                //         'update' => 'manage.business-permit.update',
                //         'destroy' => 'manage.business-permit.destroy',
                //     ],
                // ]);

                // Jenis KUR
                Route::resource('kur-type',KurTypeController::class);
                // Route::resource('kur-type', KurTypeController::class, [
                //     'names' => [
                //         'index' => 'manage.kur-type.index',
                //         'create' => 'manage.kur-type.create',
                //         'store' => 'manage.kur-type.store',
                //         'show' => 'manage.kur-type.show',
                //         'edit' => 'manage.kur-type.edit',
                //         'update' => 'manage.kur-type.update',
                //         'destroy' => 'manage.kur-type.destroy',
                //     ],
                // ]);

                // Termin
                Route::resource('termin', TerminController::class);
                // Route::resource('termin', TerminController::class, [
                //     'names' => [
                //         'index' => 'manage.termin.index',
                //         'create' => 'manage.termin.create',
                //         'store' => 'manage.termin.store',
                //         'show' => 'manage.termin.show',
                //         'edit' => 'manage.termin.edit',
                //         'update' => 'manage.termin.update',
                //         'destroy' => 'manage.termin.destroy',
                //     ],
                // ]);


                // MEMBER

                // Data Member
                // blm dibenerin
                Route::resource('credit-request', CreditRequestController::class, [
                    'names' => 'member'
                ]);


                // CONTENT MANAJ SYSTEM
                // Kategori Berita
                Route::resource('news-category',NewsCategoryController::class);
                // Route::resource('news-category', NewsCategoryController::class, [
                //     'names' => [
                //         'index' => 'manage.news-category.index',
                //         'create' => 'manage.news-category.create',
                //         'store' => 'manage.news-category.store',
                //         'show' => 'manage.news-category.show',
                //         'edit' => 'manage.news-category.edit',
                //         'update' => 'manage.news-category.update',
                //         'destroy' => 'manage.news-category.destroy',
                //     ],
                // ]);

                // Berita
                Route::resource('news', NewsController::class);
                // Route::resource('news', NewsController::class, [
                //     'names' => [
                //         'index' => 'manage.news.index',
                //         'create' => 'manage.news.create',
                //         'store' => 'manage.news.store',
                //         'show' => 'manage.news.show',
                //         'edit' => 'manage.news.edit',
                //         'update' => 'manage.news.update',
                //         'destroy' => 'manage.news.destroy',
                //     ],
                // ]);


                // Profil dan Syarat KUR (suspect)
                Route::resource('requirement', RequirementController::class);
                // Route::resource('requirement', RequirementController::class, [
                //     'names' => [
                //         'index' => 'manage.requirement.index',
                //         'create' => 'manage.requirement.create',
                //         'store' => 'manage.requirement.store',
                //         'show' => 'manage.requirement.show',
                //         'edit' => 'manage.requirement.edit',
                //         'update' => 'manage.requirement.update',
                //         'destroy' => 'manage.requirement.destroy',
                //     ],
                // ]);
                // FaQ
                Route::resource('faq',FaqController::class);
                // Route::resource('faq', FaqController::class, [
                //     'names' => [
                //         'index' => 'manage.faq.index',
                //         'create' => 'manage.faq.create',
                //         'store' => 'manage.faq.store',
                //         'show' => 'manage.faq.show',
                //         'edit' => 'manage.faq.edit',
                //         'update' => 'manage.faq.update',
                //         'destroy' => 'manage.faq.destroy',
                //     ],
                // ]);
                // Testimoni ()
                Route::resource('testimoni',TestimonialController::class);
                // Route::resource('testimoni', TestimonialController::class, [
                //     'names' => [
                //         'index' => 'manage.testimoni.index',
                //         'create' => 'manage.testimoni.create',
                //         'store' => 'manage.testimoni.store',
                //         'show' => 'manage.testimoni.show',
                //         'edit' => 'manage.testimoni.edit',
                //         'update' => 'manage.testimoni.update',
                //         'destroy' => 'manage.testimoni.destroy',
                //     ],
                // ]);

            });

        // });

    // });
// });



// Route::get('/login', function () {
//     return view('login'); // Nama view yang akan ditampilkan
// })->name('login'); // Anda bisa memberikan nama rute (Opsional)


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





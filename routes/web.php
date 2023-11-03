<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\TerminController;
use App\Http\Controllers\Backend\BankController;
use App\Http\Controllers\Backend\BusinessTypeController;
use App\Http\Controllers\Backend\BusinessPermitController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CreditRequestController;
use App\Http\Controllers\Backend\KurTypeController;
use App\Http\Controllers\Backend\NewsCategoryController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\RequirementController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\MemberController;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Api\UserController as UserApiController;
use App\Http\Controllers\Api\TerminController as TerminApiController;

use App\Http\Controllers\Api\MemberController as MemberApiController;




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
// Route::get('credit-request/{id}/confirm', [CreditRequestController::class], 'confirm')->name('manage.credit-request.confirm');
// Route::get('credit-request/{id}/redirect',[CreditRequestController::class],'redirect')->name('manage.credit-request.redirect');
// Route::get('credit-request/{id}/accept',[CreditRequestController::class],'accept')->name('manage.credit-request.accept');
// Route::get('credit-request/{id}/pending',[CreditRequestController::class],'pending')->name('manage.credit-request.pending');
// Route::get('credit-request/{id}/reject',[CreditRequestController::class],'reject')->name('manage.credit-request.reject');

#suspect untuk route manage.credit-request.show
#found a problem in Api/CreditRequestController.php, need to explicity declare the name route i guess
// Route::get('credit-request',[CreditRequestController::class], 'show')->name('manage.credit-request.show');
#or
// Route::get('credit-request/{id}/show',[CreditRequestController::class], 'show')->name('manage.credit-request.show');
#lebih make sense yg bawahhhh ini but didnt find any "{id}/show" route di file project sebelumnya



Route::middleware('auth')->prefix('manage')->name('manage.')->group(function () {
// Route::prefix('manage')->name('manage.')->group(function () {
    Route::resource('/', HomeController::class);

    // Route::middleware('admin0123')->group(function () {
        // semua admin -------------

        // Dashboard
        // Modul Data

        // KUR
        // Pengajuan KUR
        // Riwayat Pengajuan
        // Route::resource('credit-request', CreditRequestController::class, [
        //     'names' => 'manage.credit-request'
        // ]);
        Route::get('credit-request/history', [CreditRequestController::class, 'history'])->name('credit-request.history');

        Route::get('manage/credit-request', [CreditRequestController::class, 'index'])->name('credit-request.index');

        Route::get('credit-request/export', [CreditRequestController::class, 'exportExcel'])->name('credit-request.export');



        // Route::middleware('admin01')->group(function () {
            // hanya admin 0 1 (ojk dan bank) ------------

            // Master Data
            // Pengguna
            Route::resource('user-api',UserApiController::class);
            Route::resource('user', UserController::class);

            // Route::middleware('superadmin0')->group(function () {
                // hanya admin 0 (ojk) ------------

                // DADHBOARD
                // Data Visualisasi Statistik

                // MASTER DATA CRUD (DONE)
                Route::resource('bank', BankController::class);

                // Jenis Usaha (DONE)
                Route::resource('business-type', BusinessTypeController::class);

                // Izin Usaha (DONE)
                Route::resource('business-permit',BusinessPermitController::class);


                // Jenis KUR (DONE)
                Route::resource('kur-type', KurTypeController::class);

                // Termin (DONE)
                Route::resource('termin', TerminController::class);


                // MEMBER
                // Data Member (DONE)
                Route::resource('member', MemberController::class);


                // CONTENT MANAJ SYSTEM
                // Kategori Berita (DONE)
                Route::resource('news-category',NewsCategoryController::class);

                // Berita (ALL DONE, kecuali FITUR UPDATE, CREATE)
                Route::resource('news', NewsController::class);

                // Profil dan Syarat KUR (ALL DONE, kecuali FITUR UPDATE, CREATE)
                Route::resource('requirement', RequirementController::class);

                // FaQ (ALL DONE, kecuali FITUR UPDATE, CREATE)
                Route::resource('faq',FaqController::class);

                // Testimoni (ALL DONE, kecuali FITUR UPDATE, CREATE)
                Route::resource('testimoni',TestimonialController::class);

            });

        // });

    // });
// });








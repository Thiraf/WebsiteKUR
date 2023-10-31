<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TestimonialControler;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Api\TerminController;
use App\Http\Controllers\Api\BankController;
use App\Http\Controllers\Api\KurTypeController;
use App\Http\Controllers\Api\CreditRequestController;
use App\Http\Controllers\Api\BusinessPermitController;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\NewsCategoryController;
use App\Http\Controllers\Api\RequirementController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\TestimonialController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\StatistikController;
use App\Http\Controllers\Api\BusinessTypeController;
use App\Http\Controllers\Api\FinancialInstitutionUmiController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// cuma buat ngecheck di postman
Route::post('regis', [RegisterController::class, 'create']);
Route::post('login', [LoginController::class, 'loginUser']);

// route login, kalo mau akses url tertentu dan gaada token langsung diarahkan ke sini (login). *Mungkin nanti bisa return view login di route web, ntar tp
Route::get('login', function () {
    return response()->json([
        'status' => false,
        'message' => "akses gaboleh krn belum login. routes/api"
    ],401);
})->name('login');



require_once 'api.php';

Route::resource('statistik', StatistikController::class);

// authorization
Route::name('api.')->group(function () {
    Route::get('financial-instituion-umi/list/search',[FinancialInstitutionUmiController::class, 'search'])->name('umi.search');

// Route::get('financial-instituion-umi/list/search',FinancialInstitutionUmiController::class)->name('api.umi.search');
// Route::namespace('Api')->middleware('auth')->prefix('api')->name('api.')->group(function () {
// Route::namespace('Api')->prefix('api')->name('api.')->group(function () {

    // Route::middleware('admin0123')->group(function () {
        // semua admin -------------

        // Dashboard
        // Modul Data

        // KUR
        // Pengajuan KUR
        Route::resource('credit-request', CreditRequestController::class);
        // Riwayat Pengajuan
        Route::get('credit-request/history', [CreditRequestController::class, 'history'])->name('credit-request.history');

        // Route::middleware('admin01')->group(function () {
            // hanya admin 0 1 (ojk dan bank) ------------

            // Master Data
            // Pengguna
            Route::resource('user',UserController::class);


            // Route::middleware('superadmin0')->group(function () {
                // hanya admin 0 (ojk) ------------

                // DADHBOARD
                // Data Visualisasi Statistik

                // MASTER DATA CRUD
                // Bank Penyalur KUR ()
                Route::resource('bank', BankController::class);
                Route::get('bank/list/search',[BankController::class, 'search'])->name('bank.search');
                // Jenis Usaha ()
                Route::resource('business-type', BusinessTypeController::class);
                // Izin Usaha
                Route::resource('business-permit',BusinessPermitController::class);
                // Jenis KUR
                Route::resource('kur-type',KurTypeController::class);
                // Termin ()
                Route::resource('termin', TerminController::class);


                // MEMBER
                // Data Member
                Route::resource('member', MemberController::class);
                Route::put('member/{id}/open-block',[MemberController::class, 'blockStore'])->name('member.block-store');

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

            // });

        // });

    // });
});







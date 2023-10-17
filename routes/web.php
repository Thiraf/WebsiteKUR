<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('login');
});

Route::get('/app', function () {
    return view('app');
});


Route::get('/testimoni', function () {
    return view('backend.pages.testimoni.index');
});

Route::get('/termin', function () {
    return view('backend.pages.termin.index');
});

Route::get('/business-type', function () {
    return view('backend.pages.business_type.index');
});
Auth::routes();

Route::middleware('auth')->prefix('manage')->name('manage.')->namespace('Backend')->group(function () {
    /**
     * Home
     */
    Route::resource('/', 'HomeController');

    Route::middleware(['admin'])->group(function () {
        /**
         * Bank
         */
        Route::resource('bank', 'BankController');

        /**
         * Financial Institution Umi
         */
        Route::resource('financial-institution-umi', 'FinancialInstitutionUmiController');

        /**
         * Termin
         */
        Route::resource('termin', 'TerminController');

        /**
         * Business Type
         */
        Route::resource('business-type', 'BusinessTypeController');

        /**
         * KUR Type
         */
        Route::resource('kur-type', 'KurTypeController');

        /**
         * Business Type
         */
        Route::resource('business-permit', 'BusinessPermitController');

        /**
         * Faq
         */
        Route::resource('faq', 'FaqController');

        /**
         * Testimonial
         */
        Route::resource('testimoni', 'TestimonialController');

        /**
         * Requirement
         */
        Route::resource('requirement', 'RequirementController');

        /**
         * News
         */
        Route::resource('news', 'NewsController');

        /**
         * News Category
         */
        Route::resource('news-category', 'NewsCategoryController');

        /**
         * Member
         */
        Route::resource('member', 'MemberController');
    });

    Route::middleware(['pusat'])->group(function () {

        /**
         * User
         */
        Route::resource('user', 'UserController');

    });

    /**
     * CreditRequest
     */
    Route::get('credit-request/export', 'CreditRequestController@exportExcel')->name('credit-request.export');
    Route::get('credit-request/history', 'CreditRequestController@history')->name('credit-request.history');
    Route::resource('credit-request', 'CreditRequestController');
    Route::get('credit-request/{id}/accept', 'CreditRequestController@accept')->name('credit-request.accept');
    Route::get('credit-request/{id}/reject', 'CreditRequestController@reject')->name('credit-request.reject');
    Route::get('credit-request/{id}/delete', 'CreditRequestController@destroy')->name('credit-request.delete');
    Route::get('credit-request/{id}/pending', 'CreditRequestController@pending')->name('credit-request.pending');
    Route::get('credit-request/{id}/process', 'CreditRequestController@process')->name('credit-request.process');
    Route::get('credit-request/{id}/redirect', 'CreditRequestController@redirect')->name('credit-request.redirect');
    Route::post('credit-request/{id}/accept', 'CreditRequestController@acceptStore')->name('credit-request.accept-store');
    Route::post('credit-request/{id}/reject', 'CreditRequestController@rejectStore')->name('credit-request.reject-store');
    Route::post('credit-request/{id}/pending', 'CreditRequestController@pendingStore')->name('credit-request.pending-store');
    Route::post('credit-request/{id}/process', 'CreditRequestController@processStore')->name('credit-request.process-store');
    Route::post('credit-request/{id}/redirect', 'CreditRequestController@redirectStore')->name('credit-request.redirect-store');
    Route::get('credit-request/{id}/confirm', 'CreditRequestController@confirm')->name('credit-request.confirm');

});
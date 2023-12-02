
<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\File;

use Illuminate\Http\Response;


Route::get('/storage/bank/{filename}', function ($filename)
{
    // Add folder path here instead of storing in the database.
    $path = storage_path('app/public/bank/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
})->name('storage.bank');


Route::get('/storage/user/{filename}', function ($filename)
{
    // Add folder path here instead of storing in the database.
    $path = storage_path('app/public/user/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
})->name('storage.user');



// -----------------

Route::get('/storage/page/{filename}', function ($filename)
{
    // Add folder path here instead of storing in the database.
    $path = storage_path('app/public/page/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
})->name('storage.page');



Route::get('/storage/request/{filename}', function ($filename)
{
    // Add folder path here instead of storing in the database.
    $path = storage_path('app/public/request/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
})->name('storage.request');



Route::get('/storage/financial-institution-umi/{filename}', function ($filename)
{
    // Add folder path here instead of storing in the database.
    $path = storage_path('app/public/financial-institution-umi/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
})->name('storage.financial-institution-umi');

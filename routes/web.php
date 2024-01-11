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

use App\Http\Controllers\UploadController;

Route::resource('upload', UploadController::class);
// GET /upload mapped to the index method
// GET /upload/create mapped to the create method
// POST /upload mapped to the store method
// GET /upload/{upload} mapped to the show method
// GET /upload/{upload}/edit mapped to the edit method
// PUT/PATCH /upload/{upload} mapped to the update method
// DELETE /upload/{upload} mapped to the destroy method

Route::get('/images/{path}', 'ImageController@show')->where('path', '.*');
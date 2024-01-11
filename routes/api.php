<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// GET /uploads mapped to the index method
// GET /uploads/create mapped to the create method
// POST /uploads mapped to the store method
// GET /uploads/{upload} mapped to the show method
// GET /uploads/{upload}/edit mapped to the edit method
// PUT/PATCH /uploads/{upload} mapped to the update method
// DELETE /uploads/{upload} mapped to the destroy method
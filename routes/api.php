<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NoteController;
use App\Http\Controllers\Api\ProfileController;

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



Route::middleware('auth:api')->group(function () {
    Route::patch('profile/{id}', [ProfileController::class, 'update']);
});

Route::group(['prefix' => 'users'], function () {
Route::get('/{userId}/notes/{id}', [NoteController::class, 'show']);
Route::patch('/{userId}/notes/{id}', [NoteController::class, 'update']);
Route::delete('/{userId}/notes/{id}', [NoteController::class, 'delete']);
Route::post('/{userId}/notes', [NoteController::class, 'create']);
Route::get('/{userId}/notes', [NoteController::class, 'index']);
  
});
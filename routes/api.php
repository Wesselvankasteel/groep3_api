<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'auth'], function() {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);
});

Route::middleware('auth', function() {
    Route::post('/update-user', [ProfileController::class, 'updateUser']);
    Route::get('/get-user-data', [ProfileController::class, 'getUserData']);
});

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() {
    Route::get('/', [ProfileController::class, 'show']);
    Route::put('/update', [ProfileController::class, 'update']);
});

// Route::group(['prefix' => 'user'], function() {
//     Route::get('/{id}', [ProfileController::class, 'show']);
//     Route::post('/{id}/update', [ProfileController::class, 'update']);
// });

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExpertController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/users/auth', AuthController::class);
});

Route::get('/expert', [ExpertController::class, 'GetExpert']);
Route::post('/expert', [ExpertController::class, 'CreateExpert']);
Route::put('/expert', [ExpertController::class, 'UpdateExpert']);
Route::get('/expert/{id}', [ExpertController::class, 'DetailExpert']);
Route::put('/expert/{id}', [ExpertController::class, 'UpdateExpert']);
Route::delete('/expert/{id}', [ExpertController::class, 'DeleteExpert']);
